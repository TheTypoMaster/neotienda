<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 05/07/2015
 * Time: 05:33 PM
 */

class NeoExchangesHistoryCore extends ObjectModel
{
    /** @var integer Neo Exchanges History id */
    public $id_neo_exchange_history;

    /** @var integer Employee id for this history entry */
    public $id_employee;

    /** @var integer Neo Exchange id */
    public $id_neo_exchange;

    /** @var integer Neo status id */
    public $id_neo_status;

    /** @var string Object creation date */
    public $date_add;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'neo_exchanges_history',
        'primary' => 'id_neo_exchange_history',
        'fields' => array(
            'id_neo_exchange' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
            'id_neo_status' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
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
            'id_neo_status' => array('required' => true, 'xlink_resource'=> 'neo_status'),
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
    public function changeIdNeoState($new_neo_state, $neo_exchange, $use_existing_payment = false)
    {
        if (!$new_neo_state || !$neo_exchange)
            return;

        if (!is_object($neo_exchange) && is_numeric($neo_exchange))
            $neo = new NeoExchanges((int)$neo_exchange);
        elseif (is_object($neo_exchange))
            $neo = $neo_exchange;
        else
            return;

        $new_os = new NeoStatusCore((int)$new_neo_state);
        $old_os = new NeoStatusCore((int)$neo->current_state);

        switch($new_neo_state){
            case 1:
                $neo->current_state = 1;
                break;
            case 2:
                $neo->current_state = 2;
                $customer = new CustomerCore($neo->id_customer);
                $buys  = new NeoItemsBuyCore(Tools::getValue('id_neo_exchange'));
                $sales = new NeoItemsSalesCore(Tools::getValue('id_neo_exchange'));

                $products  = AdminIntercambioController::getProducts($buys);
                $products2 = AdminIntercambioController::getProducts($sales);

                $product_list = "";
                foreach($products as $product){
                    $product_list .= $product['id_neo_item_buy'].'- <strong>'.$product['name'].'</strong> <i>'.number_format($product['price'], 2, ',', ' ').'</i> Bs.<br />';
                }

                $product_list2 = "";
                foreach($products2 as $product2){
                    $product_list2 .= $product2['id_neo_item_sale'].'- <strong>'.$product2['name'].'</strong> <i>'.number_format($product2['price'], 2, ',', ' ').'</i> Bs.<br />';
                }

                $configuration = Configuration::getMultiple(array('PS_LANG_DEFAULT', 'PS_SHOP_EMAIL', 'PS_SHOP_NAME'));
                $iso = Language::getIsoById((int)($neo->id_lang));
                $template = 'aprobado';

                $data = array(
                    '{lastname}' => $customer->lastname,
                    '{firstname}' => $customer->firstname,
                    '{order_name}' => $neo->reference,
                    '{nbProducts}' => count($products),
                    '{videoJuegos}' => $product_list,
                    '{videoJuegos2}' => count($products2)?'Usted tiene <strong>'.count($products2).'</strong> video juego(s) para hacerle llegar:<br>'.$product_list2.'<br>':'',
                );

                if (file_exists(_PS_ROOT_DIR_.'/mails/'.$iso.'/'.$template.'.html')){
                    Mail::Send(
                        (int)$neo->id_lang,
                        $template,
                        Mail::l('Su pedido en neotienda ha sido aprobado', $neo->id_lang),
                        $data,
                        $customer->email,
                        $customer->firstname.' '.$customer->lastname,
                        $configuration['PS_SHOP_EMAIL'],
                        $configuration['PS_SHOP_NAME'],
                        null,
                        null,
                        _PS_MAIL_DIR_,
                        false,
                        (int)$neo->id_shop);
                }
                break;
            case 3:
                $neo->current_state = 3;
                $customer = new CustomerCore($neo->id_customer);
                $buys  = new NeoItemsBuyCore(Tools::getValue('id_neo_exchange'));
                $sales = new NeoItemsSalesCore(Tools::getValue('id_neo_exchange'));

                $products  = AdminIntercambioController::getProducts($buys);
                $products2 = AdminIntercambioController::getProducts($sales);

                $product_list = "";
                foreach($products as $product){
                    $product_list .= $product['id_neo_item_buy'].'- <strong>'.$product['name'].'</strong> <i>'.number_format($product['price'], 2, ',', ' ').'</i> Bs.<br />';
                    $sql = "UPDATE "._DB_PREFIX_."stock_available SET quantity = quantity+1 WHERE id_product = '".$product['id_product']."'";
                    Db::getInstance()->execute($sql);
                }

                $product_list2 = "";
                foreach($products2 as $product2){
                    $product_list2 .= $product2['id_neo_item_sale'].'- <strong>'.$product2['name'].'</strong> <i>'.number_format($product2['price'], 2, ',', ' ').'</i> Bs.<br />';
                }

                $configuration = Configuration::getMultiple(array('PS_LANG_DEFAULT', 'PS_SHOP_EMAIL', 'PS_SHOP_NAME'));
                $iso = Language::getIsoById((int)($neo->id_lang));
                $template = 'cancelado';

                $data = array(
                    '{lastname}' => $customer->lastname,
                    '{firstname}' => $customer->firstname,
                    '{order_name}' => $neo->reference,
                    '{nbProducts}' => count($products),
                    '{videoJuegos}' => $product_list,
                    '{videoJuegos2}' => count($products2)?'Usted tiene <strong>'.count($products2).'</strong> video juego(s) para hacerle llegar:<br>'.$product_list2.'<br>':'',
                );

                if (file_exists(_PS_ROOT_DIR_.'/mails/'.$iso.'/'.$template.'.html')){
                    Mail::Send(
                        (int)$neo->id_lang,
                        $template,
                        Mail::l('Su pedido en neotienda ha sido candelado', $neo->id_lang),
                        $data,
                        $customer->email,
                        $customer->firstname.' '.$customer->lastname,
                        $configuration['PS_SHOP_EMAIL'],
                        $configuration['PS_SHOP_NAME'],
                        null,
                        null,
                        _PS_MAIL_DIR_,
                        false,
                        (int)$neo->id_shop);
                }
                break;
            case 4:
                $neo->current_state = 4;
                $customer = new CustomerCore($neo->id_customer);
                $buys  = new NeoItemsBuyCore(Tools::getValue('id_neo_exchange'));
                $sales = new NeoItemsSalesCore(Tools::getValue('id_neo_exchange'));

                $products  = AdminIntercambioController::getProducts($buys);
                $products2 = AdminIntercambioController::getProducts($sales);

                $product_list = "";
                foreach($products as $product){
                    $product_list .= $product['id_neo_item_buy'].'- <strong>'.$product['name'].'</strong> <i>'.number_format($product['price'], 2, ',', ' ').'</i> Bs.<br />';
                }

                $product_list2 = "";
                foreach($products2 as $product2){
                    $product_list2 .= $product2['id_neo_item_sale'].'- <strong>'.$product2['name'].'</strong> <i>'.number_format($product2['price'], 2, ',', ' ').'</i> Bs.<br />';
                }

                $configuration = Configuration::getMultiple(array('PS_LANG_DEFAULT', 'PS_SHOP_EMAIL', 'PS_SHOP_NAME'));
                $iso = Language::getIsoById((int)($neo->id_lang));
                $template = 'enviado';

                $data = array(
                    '{lastname}' => $customer->lastname,
                    '{firstname}' => $customer->firstname,
                    '{order_name}' => $neo->reference,
                    '{nbProducts}' => count($products),
                    '{videoJuegos}' => $product_list,
                    '{videoJuegos2}' => count($products2)?'Usted tiene <strong>'.count($products2).'</strong> video juego(s) para hacerle llegar:<br>'.$product_list2.'<br>':'',
                );

                if (file_exists(_PS_ROOT_DIR_.'/mails/'.$iso.'/'.$template.'.html')){
                    Mail::Send(
                        (int)$neo->id_lang,
                        $template,
                        Mail::l('Su pedido en neotienda ha sido enviado', $neo->id_lang),
                        $data,
                        $customer->email,
                        $customer->firstname.' '.$customer->lastname,
                        $configuration['PS_SHOP_EMAIL'],
                        $configuration['PS_SHOP_NAME'],
                        null,
                        null,
                        _PS_MAIL_DIR_,
                        false,
                        (int)$neo->id_shop);
                }
                break;
            case 5:
                $neo->current_state = 5;
                $customer = new CustomerCore($neo->id_customer);
                $buys  = new NeoItemsBuyCore(Tools::getValue('id_neo_exchange'));
                $sales = new NeoItemsSalesCore(Tools::getValue('id_neo_exchange'));

                $products  = AdminIntercambioController::getProducts($buys);
                $products2 = AdminIntercambioController::getProducts($sales);

                $product_list = "";
                foreach($products as $product){
                    $product_list .= $product['id_neo_item_buy'].'- <strong>'.$product['name'].'</strong> <i>'.number_format($product['price'], 2, ',', ' ').'</i> Bs.<br />';
                }

                $product_list2 = "";
                foreach($products2 as $product2){
                    $product_list2 .= $product2['id_neo_item_sale'].'- <strong>'.$product2['name'].'</strong> <i>'.number_format($product2['price'], 2, ',', ' ').'</i> Bs.<br />';
                }

                $configuration = Configuration::getMultiple(array('PS_LANG_DEFAULT', 'PS_SHOP_EMAIL', 'PS_SHOP_NAME'));
                $iso = Language::getIsoById((int)($neo->id_lang));
                $template = 'entregado';

                $data = array(
                    '{lastname}' => $customer->lastname,
                    '{firstname}' => $customer->firstname,
                    '{order_name}' => $neo->reference,
                    '{nbProducts}' => count($products),
                    '{videoJuegos}' => $product_list,
                    '{videoJuegos2}' => count($products2)?'Usted tiene <strong>'.count($products2).'</strong> video juego(s) para hacerle llegar:<br>'.$product_list2.'<br>':'',
                );

                if (file_exists(_PS_ROOT_DIR_.'/mails/'.$iso.'/'.$template.'.html')){
                    Mail::Send(
                        (int)$neo->id_lang,
                        $template,
                        Mail::l('Su pedido en neotienda ha sido entregado', $neo->id_lang),
                        $data,
                        $customer->email,
                        $customer->firstname.' '.$customer->lastname,
                        $configuration['PS_SHOP_EMAIL'],
                        $configuration['PS_SHOP_NAME'],
                        null,
                        null,
                        _PS_MAIL_DIR_,
                        false,
                        (int)$neo->id_shop);
                }
                break;
        }

        // changes invoice number of order ?
        if (!Validate::isLoadedObject($new_os) || !Validate::isLoadedObject($neo))
            die('Mns:'.Tools::displayError('Invalid new order status'));

        // the order is valid if and only if the invoice is available and the order is not cancelled
        $neo->valid = $new_os->logable;
        $neo->update();

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
