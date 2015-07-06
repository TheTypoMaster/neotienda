<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 05/07/2015
 * Time: 05:33 PM
 */

class NeoHistoryCore extends ObjectModel
{
    /** @var integer Neo id */
    public $id_neo_exchange;

    /** @var integer Neo status id */
    public $id_neo_state;

    /** @var integer Employee id for this history entry */
    public $id_employee;

    /** @var string Object creation date */
    public $date_add;

    /** @var string Object last modification date */
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'neo_history',
        'primary' => 'id_neo_history',
        'fields' => array(
            'id_neo_exchange' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
            'id_neo_state' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
            'id_employee' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'date_add' => 		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    /**
     * @see  ObjectModel::$webserviceParameters
     */
    protected $webserviceParameters = array(
        'objectsNodeName' => 'order_histories',
        'fields' => array(
            'id_neo_state' => array('required' => true, 'xlink_resource'=> 'neo_status'),
            'id_neo_exchange' => array('xlink_resource' => 'neo_exchanges'),
        ),
        'objectMethods' => array(
            'add' => 'addWs',
        ),
    );

    /**
     * Sets the new state of the given order
     *
     * @param int $new_order_state
     * @param int/object $id_order
     * @param bool $use_existing_payment
     */
    public function changeIdNeoState($new_neo_state, $id_neo_exchange, $use_existing_payment = false)
    {
        if (!$new_neo_state || !$id_neo_exchange)
            return;

        if (!is_object($id_neo_exchange) && is_numeric($id_neo_exchange))
            $neo = new NeoExchanges((int)$id_neo_exchange);
        elseif (is_object($id_neo_exchange))
            $neo = $id_neo_exchange;
        else
            return;

        ShopUrl::cacheMainDomainForShop($neo->id_shop);

        $new_os = new NeoStatusCore((int)$new_neo_state, $neo->id_lang);
        $old_os = $neo->getCurrentOrderState();
        $is_validated = $this->isValidated();

        // executes hook
        if (in_array($new_os->id, array(Configuration::get('PS_OS_PAYMENT'), Configuration::get('PS_OS_WS_PAYMENT'))))
            Hook::exec('actionPaymentConfirmation', array('id_neo_exchange' => (int)$neo->id), null, false, true, false, $neo->id_shop);

        // executes hook
        Hook::exec('actionOrderStatusUpdate', array('newOrderStatus' => $new_os, 'id_neo_exchange' => (int)$neo->id), null, false, true, false, $neo->id_shop);

        if (Validate::isLoadedObject($neo) && ($new_os instanceof NeoStatusCore))
        {
            // An email is sent the first time a virtual item is validated
            $virtual_products = $neo->getVirtualProducts();
            if ($virtual_products && (!$old_os || !$old_os->logable) && $new_os && $new_os->logable)
            {
                $context = Context::getContext();
                $assign = array();
                foreach ($virtual_products as $key => $virtual_product)
                {
                    $id_product_download = ProductDownload::getIdFromIdProduct($virtual_product['product_id']);
                    $product_download = new ProductDownload($id_product_download);
                    // If this virtual item has an associated file, we'll provide the link to download the file in the email
                    if ($product_download->display_filename != '')
                    {
                        $assign[$key]['name'] = $product_download->display_filename;
                        $dl_link = $product_download->getTextLink(false, $virtual_product['download_hash'])
                            .'&id_neo_exchange='.(int)$neo->id;
                        $assign[$key]['link'] = $dl_link;
                        if (isset($virtual_product['download_deadline']) && $virtual_product['download_deadline'] != '0000-00-00 00:00:00')
                            $assign[$key]['deadline'] = Tools::displayDate($virtual_product['download_deadline']);
                        if ($product_download->nb_downloadable != 0)
                            $assign[$key]['downloadable'] = (int)$product_download->nb_downloadable;
                    }
                }

                $customer = new Customer((int)$neo->id_customer);

                $links = '<ul>';
                foreach ($assign as $product)
                {
                    $links .= '<li>';
                    $links .= '<a href="'.$product['link'].'">'.Tools::htmlentitiesUTF8($product['name']).'</a>';
                    if (isset($product['deadline']))
                        $links .= '&nbsp;'.Tools::htmlentitiesUTF8(Tools::displayError('expires on', false)).'&nbsp;'.$product['deadline'];
                    if (isset($product['downloadable']))
                        $links .= '&nbsp;'.Tools::htmlentitiesUTF8(sprintf(Tools::displayError('downloadable %d time(s)', false), (int)$product['downloadable']));
                    $links .= '</li>';
                }
                $links .= '</ul>';
                $data = array(
                    '{lastname}' => $customer->lastname,
                    '{firstname}' => $customer->firstname,
                    '{id_neo_exchange}' => (int)$neo->id,
                    '{order_name}' => $neo->getUniqReference(),
                    '{nbProducts}' => count($virtual_products),
                    '{virtualProducts}' => $links
                );
                // If there is at least one downloadable file
                if (!empty($assign))
                    Mail::Send((int)$neo->id_lang, 'download_product', Mail::l('The virtual product that you bought is available for download', $neo->id_lang), $data, $customer->email, $customer->firstname.' '.$customer->lastname,
                        null, null, null, null, _PS_MAIL_DIR_, false, (int)$neo->id_shop);
            }

            // @since 1.5.0 : gets the stock manager
            $manager = null;
            if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))
                $manager = StockManagerFactory::getManager();

            $errorOrCanceledStatuses = array(Configuration::get('PS_OS_ERROR'), Configuration::get('PS_OS_CANCELED'));

            // foreach products of the order
            if (Validate::isLoadedObject($old_os))
                foreach ($neo->getProductsDetail() as $product)
                {
                    // if becoming logable => adds sale
                    if ($new_os->logable && !$old_os->logable)
                    {
                        ProductSale::addProductSale($product['product_id'], $product['product_quantity']);
                        // @since 1.5.0 - Stock Management
                        if (!Pack::isPack($product['product_id']) &&
                            in_array($old_os->id, $errorOrCanceledStatuses) &&
                            !StockAvailable::dependsOnStock($product['id_product'], (int)$neo->id_shop))
                            StockAvailable::updateQuantity($product['product_id'], $product['product_attribute_id'], -(int)$product['product_quantity'], $neo->id_shop);
                    }
                    // if becoming unlogable => removes sale
                    elseif (!$new_os->logable && $old_os->logable)
                    {
                        ProductSale::removeProductSale($product['product_id'], $product['product_quantity']);

                        // @since 1.5.0 - Stock Management
                        if (!Pack::isPack($product['product_id']) &&
                            in_array($new_os->id, $errorOrCanceledStatuses) &&
                            !StockAvailable::dependsOnStock($product['id_product']))
                            StockAvailable::updateQuantity($product['product_id'], $product['product_attribute_id'], (int)$product['product_quantity'], $neo->id_shop);
                    }
                    // if waiting for payment => payment error/canceled
                    elseif (!$new_os->logable && !$old_os->logable &&
                        in_array($new_os->id, $errorOrCanceledStatuses) &&
                        !in_array($old_os->id, $errorOrCanceledStatuses) &&
                        !StockAvailable::dependsOnStock($product['id_product']))
                        StockAvailable::updateQuantity($product['product_id'], $product['product_attribute_id'], (int)$product['product_quantity'], $neo->id_shop);
                    // @since 1.5.0 : if the order is being shipped and this products uses the advanced stock management :
                    // decrements the physical stock using $id_warehouse
                    if ($new_os->shipped == 1 && $old_os->shipped == 0 &&
                        Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') &&
                        Warehouse::exists($product['id_warehouse']) &&
                        $manager != null &&
                        ((int)$product['advanced_stock_management'] == 1 || Pack::usesAdvancedStockManagement($product['product_id'])))
                    {
                        // gets the warehouse
                        $warehouse = new Warehouse($product['id_warehouse']);

                        // decrements the stock (if it's a pack, the StockManager does what is needed)
                        $manager->removeProduct(
                            $product['product_id'],
                            $product['product_attribute_id'],
                            $warehouse,
                            $product['product_quantity'],
                            Configuration::get('PS_STOCK_CUSTOMER_ORDER_REASON'),
                            true,
                            (int)$neo->id
                        );
                    }
                    // @since.1.5.0 : if the order was shipped, and is not anymore, we need to restock products
                    elseif ($new_os->shipped == 0 && $old_os->shipped == 1 &&
                        Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') &&
                        Warehouse::exists($product['id_warehouse']) &&
                        $manager != null &&
                        ((int)$product['advanced_stock_management'] == 1 || Pack::usesAdvancedStockManagement($product['product_id'])))
                    {
                        // if the product is a pack, we restock every products in the pack using the last negative stock mvts
                        if (Pack::isPack($product['product_id']))
                        {
                            $pack_products = Pack::getItems($product['product_id'], Configuration::get('PS_LANG_DEFAULT', null, null, $neo->id_shop));
                            foreach ($pack_products as $pack_product)
                            {
                                if ($pack_product->advanced_stock_management == 1)
                                {
                                    $mvts = StockMvt::getNegativeStockMvts($neo->id, $pack_product->id, 0, $pack_product->pack_quantity * $product['product_quantity']);
                                    foreach ($mvts as $mvt)
                                    {
                                        $manager->addProduct(
                                            $pack_product->id,
                                            0,
                                            new Warehouse($mvt['id_warehouse']),
                                            $mvt['physical_quantity'],
                                            null,
                                            $mvt['price_te'],
                                            true
                                        );
                                    }
                                    if (!StockAvailable::dependsOnStock($product['id_product']))
                                        StockAvailable::updateQuantity($pack_product->id, 0, (int)$pack_product->pack_quantity * $product['product_quantity'], $neo->id_shop);
                                }
                            }
                        }
                        // else, it's not a pack, re-stock using the last negative stock mvts
                        else
                        {
                            $mvts = StockMvt::getNegativeStockMvts($neo->id, $product['product_id'], $product['product_attribute_id'], $product['product_quantity']);
                            foreach ($mvts as $mvt)
                            {
                                $manager->addProduct(
                                    $product['product_id'],
                                    $product['product_attribute_id'],
                                    new Warehouse($mvt['id_warehouse']),
                                    $mvt['physical_quantity'],
                                    null,
                                    $mvt['price_te'],
                                    true
                                );
                            }
                        }
                    }
                }
        }

        $this->id_neo_state = (int)$new_neo_state;

        // changes invoice number of order ?
        if (!Validate::isLoadedObject($new_os) || !Validate::isLoadedObject($neo))
            die(Tools::displayError('Invalid new order status'));

        // the order is valid if and only if the invoice is available and the order is not cancelled
        $neo->current_state = $this->id_neo_state;
        $neo->valid = $new_os->logable;
        $neo->update();

        if ($new_os->invoice && !$neo->invoice_number)
            $neo->setInvoice($use_existing_payment);
        elseif ($new_os->delivery && !$neo->delivery_number)
            $neo->setDeliverySlip();

        // set orders as paid
        /*if ($new_os->paid == 1)
        {
            $invoices = $neo->getInvoicesCollection();
            if ($neo->total_paid != 0)
                $payment_method = Module::getInstanceByName($neo->module);

            foreach ($invoices as $invoice)
            {
                $rest_paid = $invoice->getRestPaid();
                if ($rest_paid > 0)
                {
                    $payment = new OrderPayment();
                    $payment->order_reference = $neo->reference;
                    $payment->id_currency = $neo->id_currency;
                    $payment->amount = $rest_paid;

                    if ($neo->total_paid != 0)
                        $payment->payment_method = $payment_method->displayName;
                    else
                        $payment->payment_method = null;

                    // Update total_paid_real value for backward compatibility reasons
                    if ($payment->id_currency == $neo->id_currency)
                        $neo->total_paid_real += $payment->amount;
                    else
                        $neo->total_paid_real += Tools::ps_round(Tools::convertPrice($payment->amount, $payment->id_currency, false), 2);
                    $neo->save();

                    $payment->conversion_rate = 1;
                    $payment->save();
                    Db::getInstance()->execute('
					INSERT INTO `'._DB_PREFIX_.'order_invoice_payment` (`id_order_invoice`, `id_order_payment`, `id_order`)
					VALUES('.(int)$invoice->id.', '.(int)$payment->id.', '.(int)$neo->id.')');
                }
            }
        }*/

        // updates delivery date even if it was already set by another state change
        if ($new_os->delivery)
            $neo->setDelivery();

        // executes hook
        Hook::exec('actionOrderStatusPostUpdate', array('newOrderStatus' => $new_os,'id_neo_exchange' => (int)$neo->id,), null, false, true, false, $neo->id_shop);

        ShopUrl::resetMainDomainCache();
    }

    /**
     * Returns the last order status
     * @param int $id_order
     * @return OrderState|bool
     * @deprecated 1.5.0.4
     * @see Order->current_state
     */
    public static function getLastOrderState($id_order)
    {
        Tools::displayAsDeprecated();
        $id_order_state = Db::getInstance()->getValue('
		SELECT `id_order_state`
		FROM `'._DB_PREFIX_.'order_history`
		WHERE `id_order` = '.(int)$id_order.'
		ORDER BY `date_add` DESC, `id_order_history` DESC');

        // returns false if there is no state
        if (!$id_order_state)
            return false;

        // else, returns an OrderState object
        return new OrderState($id_order_state, Configuration::get('PS_LANG_DEFAULT'));
    }

    /**
     * @param bool $autodate Optional
     * @param array $template_vars Optional
     * @param Context $context Optional
     * @return bool
     */
    public function addWithemail($autodate = true, $template_vars = false, Context $context = null)
    {
        if (!$context)
            $context = Context::getContext();
        $order = new Order($this->id_order);

        if (!$this->add($autodate))
            return false;

        $result = Db::getInstance()->getRow('
			SELECT osl.`template`, c.`lastname`, c.`firstname`, osl.`name` AS osname, c.`email`, os.`module_name`, os.`id_order_state`
			FROM `'._DB_PREFIX_.'order_history` oh
				LEFT JOIN `'._DB_PREFIX_.'orders` o ON oh.`id_order` = o.`id_order`
				LEFT JOIN `'._DB_PREFIX_.'customer` c ON o.`id_customer` = c.`id_customer`
				LEFT JOIN `'._DB_PREFIX_.'order_state` os ON oh.`id_order_state` = os.`id_order_state`
				LEFT JOIN `'._DB_PREFIX_.'order_state_lang` osl ON (os.`id_order_state` = osl.`id_order_state` AND osl.`id_lang` = o.`id_lang`)
			WHERE oh.`id_order_history` = '.(int)$this->id.' AND os.`send_email` = 1');
        if (isset($result['template']) && Validate::isEmail($result['email']))
        {
            ShopUrl::cacheMainDomainForShop($order->id_shop);

            $topic = $result['osname'];
            $data = array(
                '{lastname}' => $result['lastname'],
                '{firstname}' => $result['firstname'],
                '{id_order}' => (int)$this->id_order,
                '{order_name}' => $order->getUniqReference()
            );
            if ($template_vars)
                $data = array_merge($data, $template_vars);

            if ($result['module_name'])
            {
                $module = Module::getInstanceByName($result['module_name']);
                if (Validate::isLoadedObject($module) && isset($module->extra_mail_vars) && is_array($module->extra_mail_vars))
                    $data = array_merge($data, $module->extra_mail_vars);
            }

            $data['{total_paid}'] = Tools::displayPrice((float)$order->total_paid, new Currency((int)$order->id_currency), false);
            $data['{order_name}'] = $order->getUniqReference();

            if (Validate::isLoadedObject($order))
            {
                // Join PDF invoice if order status is "payment accepted"
                if ((int)$result['id_order_state'] === 2 && (int)Configuration::get('PS_INVOICE') && $order->invoice_number)
                {
                    $context = Context::getContext();
                    $pdf = new PDF($order->getInvoicesCollection(), PDF::TEMPLATE_INVOICE, $context->smarty);
                    $file_attachement['content'] = $pdf->render(false);
                    $file_attachement['name'] = Configuration::get('PS_INVOICE_PREFIX', (int)$order->id_lang, null, $order->id_shop).sprintf('%06d', $order->invoice_number).'.pdf';
                    $file_attachement['mime'] = 'application/pdf';
                }
                else
                    $file_attachement = null;

                Mail::Send((int)$order->id_lang, $result['template'], $topic, $data, $result['email'], $result['firstname'].' '.$result['lastname'],
                    null, null, $file_attachement, null, _PS_MAIL_DIR_, false, (int)$order->id_shop);
            }

            ShopUrl::resetMainDomainCache();
        }

        return true;
    }

    public function add($autodate = true, $null_values = false)
    {
        if (!parent::add($autodate))
            return false;

        $order = new Order((int)$this->id_order);
        // Update id_order_state attribute in Order
        $order->current_state = $this->id_order_state;
        $order->update();

        Hook::exec('actionOrderHistoryAddAfter', array('order_history' => $this), null, false, true, false, $order->id_shop);

        return true;
    }

    /**
     * @return int
     */
    public function isValidated()
    {
        return Db::getInstance()->getValue('
		SELECT COUNT(oh.`id_order_history`) AS nb
		FROM `'._DB_PREFIX_.'order_state` os
		LEFT JOIN `'._DB_PREFIX_.'order_history` oh ON (os.`id_order_state` = oh.`id_order_state`)
		WHERE oh.`id_order` = '.(int)$this->id_order.'
		AND os.`logable` = 1');
    }

    /**
     * Add method for webservice create resource Order History
     * If sendemail=1 GET parameter is present sends email to customer otherwise does not
     * @return bool
     */
    public function addWs()
    {
        $sendemail = (bool)Tools::getValue('sendemail', false);
        $this->changeIdOrderState($this->id_order_state, $this->id_order);

        if ($sendemail)
        {
            //Mail::Send requires link object on context and is not set when getting here
            $context = Context::getContext();
            if ($context->link == null)
            {
                $protocol_link = (Tools::usingSecureMode() && Configuration::get('PS_SSL_ENABLED')) ? 'https://' : 'http://';
                $protocol_content = (Tools::usingSecureMode() && Configuration::get('PS_SSL_ENABLED')) ? 'https://' : 'http://';
                $context->link = new Link($protocol_link, $protocol_content);
            }
            return $this->addWithemail();
        }
        else
            return $this->add();
    }
}
