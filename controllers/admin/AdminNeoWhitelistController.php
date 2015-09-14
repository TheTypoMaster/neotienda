<?php

/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 10/09/2015
 * Time: 11:15 PM
 */
class AdminNeoWhitelistController extends AdminControllerCore
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'neo_whitelist';
        $this->identifier = 'id_neo_whitelist';
        $this->className = 'NeoWhitelist';

        $this->_select = '
		a.`id_neo_whitelist`,
		a.`price`,
		p.`price` AS `pprice`,
		pl.`name`';

        $this->_join = '
        LEFT JOIN `'._DB_PREFIX_.'product` p ON (p.`id_product` = a.`id_product`)
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.`id_product` = a.`id_product`)
        ';

        $this->_orderBy = 'id_neo_whitelist';
        $this->_orderWay = 'DESC';

        $this->fields_list = array(
            'id_neo_whitelist' => array(
                'title' => $this->l('ID'),
                'align' => 'text-center',
                'class' => 'fixed-width-xs'
            ),
            'name' => array(
                'title' => $this->l('Nombre'),
                'havingFilter' => true,
            ),
            'pprice' => array(
                'title' => $this->l('Precio Real')
            ),
            'price' => array(
                'title' => $this->l('Precio Intercambio')
            ),
        );

        parent::__construct();
    }

    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();

        if (empty($this->display))
            $this->page_header_toolbar_btn['new_order'] = array(
                'href' => self::$currentIndex.'&addorder&token='.$this->token,
                'desc' => $this->l('Add new order', null, null, false),
                'icon' => 'process-icon-new'
            );

        if ($this->display == 'add')
            unset($this->page_header_toolbar_btn['save']);

        if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP && isset($this->page_header_toolbar_btn['new_order'])
            && Shop::isFeatureActive())
            unset($this->page_header_toolbar_btn['new_order']);
    }

    public function add(){
        return $this->createTemplate('_new_product.tpl')->fetch();
        /*parent::initContent();
        $this->setTemplate(_PS_THEME_DIR_.'mypage.tpl');*/
    }

    public function renderForm()
    {
        parent::renderForm();
        unset($this->toolbar_btn['save']);
        /*$this->addJqueryPlugin(array('autocomplete', 'fancybox', 'typewatch'));

        $defaults_order_state = array('cheque' => (int)Configuration::get('PS_OS_CHEQUE'),
            'bankwire' => (int)Configuration::get('PS_OS_BANKWIRE'),
            'cashondelivery' => (int)Configuration::get('PS_OS_PREPARATION'),
            'other' => (int)Configuration::get('PS_OS_PAYMENT'));
        $payment_modules = array();
        foreach (PaymentModule::getInstalledPaymentModules() as $p_module)
            $payment_modules[] = Module::getInstanceById((int)$p_module['id_module']);

        $this->context->smarty->assign(array(
            'recyclable_pack' => (int)Configuration::get('PS_RECYCLABLE_PACK'),
            'gift_wrapping' => (int)Configuration::get('PS_GIFT_WRAPPING'),
            //'cart' => $cart,
            'currencies' => Currency::getCurrenciesByIdShop(Context::getContext()->shop->id),
            'langs' => Language::getLanguages(true, Context::getContext()->shop->id),
            'payment_modules' => $payment_modules,
            'order_states' => OrderState::getOrderStates((int)Context::getContext()->language->id),
            'defaults_order_state' => $defaults_order_state,
            'show_toolbar' => $this->show_toolbar,
            'toolbar_btn' => $this->toolbar_btn,
            'toolbar_scroll' => $this->toolbar_scroll,
            'title' => array($this->l('Orders'), $this->l('Create order'))
        ));*/
        $this->content .= $this->createTemplate('form.tpl')->fetch();
    }

}