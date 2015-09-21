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

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'neo_whitelist';
        $this->identifier = 'id_neo_whitelist';
        $this->className = 'NeoWhitelist';
        $this->deleted = false;
        $this->explicitSelect = true;

        $this->allow_export = true;

        $this->addRowAction('edit');
        $this->addRowAction('view');
        $this->addRowAction('delete');
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'confirm' => $this->l('Delete selected items?'),
                'icon' => 'icon-trash'
            )
        );

        $this->context = Context::getContext();

        $this->default_form_language = $this->context->language->id;

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

    public function postProcess()
    {
        parent::postProcess();
    }

    public function initContent()
    {
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
                    $this->toolbar_title[] = sprintf('Informacion sobre Whitelist: %s', $whitelist->id);
                break;
            case 'add':
            case 'edit':
                if (($whitelist = $this->loadObject(true)) && Validate::isLoadedObject($whitelist))
                    $this->toolbar_title[] = sprintf($this->l('Editando Whitelist Id: %s'), $whitelist->id);
                else
                    $this->toolbar_title[] = $this->l('Creando un nuevo Whitelist');
                break;
        }
    }

    public function initPageHeaderToolbar()
    {
        if (empty($this->display))
            $this->page_header_toolbar_btn['new_whitelist'] = array(
                'href' => self::$currentIndex.'&addneo_whitelist&token='.$this->token,
                'desc' => $this->l('Add new whitelist', null, null, false),
                'icon' => 'process-icon-new'
            );

        parent::initPageHeaderToolbar();
    }

    public function initProcess()
    {
        parent::initProcess();
    }

    public function renderList()
    {
        if (Tools::isSubmit('submitBulkdelete'.$this->table) || Tools::isSubmit('delete'.$this->table))
            $this->tpl_list_vars = array(
                'delete_whitelist' => true,
                'REQUEST_URI' => $_SERVER['REQUEST_URI'],
                'POST' => $_POST
            );

        return parent::renderList();
    }

    public function renderForm(){

        if (!($obj = $this->loadObject(true)))
            return;

        //define the field to display with the form helper
        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Gestión de Whitelist')
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l("ID Producto"),
                    'name' => 'id_product',
                    'size' => 40,
                    'required' => true,
                    'hint' => $this->l('El valor de la columna Id del listado de productos.')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l("Precio")." :",
                    'name' => 'price',
                    'size' => 40,
                    'required' => true,
                    'hint' => $this->l('El precio para intercambio ej: 10000.00 (decimales con ".").')
                )
            )
        );

        //add the save button
        $this->fields_form['submit'] = array(
            'title' => $this->l('Save')
        );

        return parent::renderForm();
    }

    public function renderView()
    {
        if (!($whitelist = $this->loadObject()))
            return;

        $this->tpl_view_vars = array(
            'whitelist' => $whitelist,
        );

        return parent::renderView();
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
        // Check that the new email is not already in use
        $id_product = strval(Tools::getValue('id_product'));
        $whitelist = new NeoWhitelistCore();
        $whitelist->getByIdProduct($id_product);

        if(!$id_product || !is_numeric($id_product)){
            $this->errors[] = Tools::displayError('El Id del Producto debe ser numerico:').' '.$id_product;
        }
        elseif ($whitelist->id)
        {
            $this->errors[] = Tools::displayError('El producto ya existe:').' '.$id_product;
        }
        elseif (trim(Tools::getValue('price')) == '')
        {
            $this->errors[] = Tools::displayError('Precio no puede estar vacio.');
        }
        elseif ($whitelistAdd = parent::processAdd())
        {
            $this->context->smarty->assign('new_whitelist', $whitelistAdd);
            return $whitelistAdd;
        }
        return false;
    }

    public function processUpdate()
    {
        if (Validate::isLoadedObject($this->object))
        {
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