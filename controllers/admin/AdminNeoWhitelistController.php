<?php

/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 10/09/2015
 * Time: 11:15 PM
 */
class AdminNeoWhitelistControllerCore extends AdminControllerCore
{
    protected $delete_mode;

    protected $_defaultOrderBy = 'date_add';
    protected $_defaultOrderWay = 'DESC';
    protected $can_add_whitelist = true;

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'neo_whitelist';
        $this->identifier = 'id_neo_whitelist';
        $this->className = 'NeoWhitelist';
        $this->lang = false;
        $this->deleted = false;
        $this->explicitSelect = true;

        $this->allow_export = true;

        $this->addRowAction('edit');
        $this->addRowAction('view');
        $this->addRowAction('delete');

        $this->context = Context::getContext();

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

        //if(isset($_GET['add']))
            //$this->setTemplate('controllers/whitelist/form.tpl');

        parent::__construct();

        // Check if we can add a customer
        if (Shop::isFeatureActive() && (Shop::getContext() == Shop::CONTEXT_ALL || Shop::getContext() == Shop::CONTEXT_GROUP))
            $this->can_add_whitelist = false;

        //if(isset($_GET['addneowhitelist']))
        //    $this->setTemplate('controllers/whitelist/_new_whitelist.tpl');
    }

    public function renderForm(){

        $module_instance = $this->module;
        $path = _MODULE_DIR_."mymodule";

        //define the field to display with the form helper
        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Gestion des descriptions d\'article')
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l("ID"),
                    'name' => 'id_attribute',
                    'size' => 40,
                    'required' => true,
                    'hint' => $this->l('You can set an attribute name, autocomplete wil do the thing')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l("Description")." :",
                    'name' => 'description',
                    'size' => 40,
                    'required' => true,
                    'hint' => $this->l('The text that will be added to the attribute description.')
                )
            )
        );

        //add the save button
        $this->fields_form['submit'] = array(
            'title' => $this->l('   Save   '),
            'class' => 'button'
        );

        if (!($MyModuleObject = $this->loadObject(true)))
            return;

        //populate the field with good values if we are in an edition
        foreach($this->fields_form["input"] as $inputfield){
            $this->fields_value[$inputfield["name"]] = $MyModuleObject->$inputfield["name"];
        }

        $this->context->smarty->assign(array(
            'neowhitelist_controller_url' => $this->context->link->getAdminLink('AdminNeoWhitelist'),//give the url for ajax query
        ));

        if (Tools::isSubmit('addneo_whitelist'))
        {
            $nn = 'entro';
        }

        $more = $this->module->display($path, 'view/view.tpl');

        return $more.parent::renderForm();
    }

    public function postProcess()
    {
        if (!$this->can_add_whitelist && $this->display == 'add')
            $this->redirect_after = $this->context->link->getAdminLink('AdminNeoWhitelist');

        parent::postProcess();
    }

    public function initContent()
    {
        if ($this->action == 'select_delete')
            $this->context->smarty->assign(array(
                'delete_form' => true,
                'url_delete' => htmlentities($_SERVER['REQUEST_URI']),
                'boxes' => $this->boxes,
            ));

        if (!$this->can_add_whitelist && !$this->display)
            $this->informations[] = $this->l('You have to select a shop if you want to create a whitelist.');

        parent::initContent();
    }

    public function initToolbar()
    {
        parent::initToolbar();
    }

    public function initToolbarTitle()
    {
        parent::initToolbarTitle();

        switch ($this->display)
        {
            case '':
            case 'list':
                $this->toolbar_title[] = $this->l('Administrar WhiteList');
                break;
            case 'view':
                if (($whitelist = $this->loadObject(true)) && Validate::isLoadedObject($whitelist))
                    $this->toolbar_title[] = sprintf('Information about Customer: %s', $whitelist->name);
                break;
            case 'add':
                $this->toolbar_title[] = $this->l('Creating a new Whitelist');
                break;
            case 'edit':
                //if (($whitelist = $this->loadObject(true)) && Validate::isLoadedObject($whitelist))
                    $this->toolbar_title[] = sprintf($this->l('Editing Customer: %s'), '');
                //else
                    //$this->toolbar_title[] = $this->l('Creating a new Whitelist');
                break;
        }
    }

    public function initPageHeaderToolbar()
    {
        if (empty($this->display) && $this->can_add_whitelist)
            $this->page_header_toolbar_btn['new_whitelist'] = array(
                'href' => self::$currentIndex.'&addneo_whitelist&token='.$this->token,
                'desc' => $this->l('Add new whitelist', null, null, false),
                'icon' => 'process-icon-new'
            );

        parent::initPageHeaderToolbar();
    }

    public function processDelete()
    {
        $this->_setDeletedMode();
        parent::processDelete();
    }

    protected function _setDeletedMode()
    {
        if ($this->delete_mode == 'real')
            $this->deleted = false;
        elseif ($this->delete_mode == 'deleted')
            $this->deleted = true;
        else
        {
            $this->errors[] = Tools::displayError('Unknown delete mode:').' '.$this->deleted;
            return;
        }
    }

    protected function processBulkDelete()
    {
        $this->_setDeletedMode();
        parent::processBulkDelete();
    }

    public function processAdd()
    {
        if (Tools::getValue('submitFormAjax'))
            $this->redirect_after = false;
        // Check that the new email is not already in use
        $customer_email = strval(Tools::getValue('email'));
        $customer = new Customer();
        if (Validate::isEmail($customer_email))
            $customer->getByEmail($customer_email);
        if ($customer->id)
        {
            $this->errors[] = Tools::displayError('An account already exists for this email address:').' '.$customer_email;
            $this->display = 'edit';
            return $customer;
        }
        elseif (trim(Tools::getValue('passwd')) == '')
        {
            $this->validateRules();
            $this->errors[] = Tools::displayError('Password can not be empty.');
            $this->display = 'edit';
        }
        elseif ($customer = parent::processAdd())
        {
            $this->context->smarty->assign('new_customer', $customer);
            return $customer;
        }
        return false;
    }

    public function processUpdate()
    {
        if (Validate::isLoadedObject($this->object))
        {
            $customer_email = strval(Tools::getValue('email'));

            // check if e-mail already used
            if ($customer_email != $this->object->email)
            {
                $customer = new Customer();
                if (Validate::isEmail($customer_email))
                    $customer->getByEmail($customer_email);
                if (($customer->id) && ($customer->id != (int)$this->object->id))
                    $this->errors[] = Tools::displayError('An account already exists for this email address:').' '.$customer_email;
            }

            return parent::processUpdate();
        }
        else
            $this->errors[] = Tools::displayError('An error occurred while loading the object.').'
				<b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
    }

    public function processSave()
    {
        return parent::processSave();
    }

    protected function afterDelete($object, $old_id)
    {
        return true;
    }
}