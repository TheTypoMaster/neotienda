<?php
if (!defined('_PS_VERSION_'))
	exit;

class Intercambio extends Module{
	public function __construct()  {
	    $this->name = 'Intercambio';
	    $this->tab = 'administration';
	    $this->version = '1.0.0';
	    $this->author = 'Luis Arismendi';
	    $this->need_instance = 0;
	    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	    $this->bootstrap = true;

	    parent::__construct();   

	    $this->displayName = $this->l('Intercambio');
	    $this->description = $this->l('Opcion de intercambio de juegos por juegos del stock o dinero.');
	    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

	    if (!Configuration::get('MYMODULE_NAME'))
	    	$this->warning = $this->l('No name provided');
	}

	public function install(){  
		if (Shop::isFeatureActive())    
			Shop::setContext(Shop::CONTEXT_ALL);   

		if (!parent::install() ||    
			!$this->registerHook('leftColumn') ||    
			!$this->registerHook('header') ||    
			!Configuration::updateValue('MYMODULE_NAME', 'my friend')  ||
            !$this->installModuleTab('Intercambio', array(1=>'Ordenes de intercambio'), 0))
			return false;   

		return true;
	}

    public function uninstall()
    {
        if (!parent::uninstall()
            || !$this->uninstallModuleTab('Intercambio', array(1=>'Ordenes de intercambio'), 0))
            return false;
        return true;
    }

    private function installModuleTab($tabClass, $tabName, $idTabParent)

    {
        $tab = new Tab();

        $tab->name = $tabName;

        $tab->class_name = $tabClass;

        $tab->module = $this->name;

        $tab->id_parent = $idTabParent;

        if(!$tab->save())

            return false;

        return true;

    }

    private function uninstallModuleTab($tabClass)

    {
        $idTab = Tab::getIdFromClassName($tabClass);

        if($idTab != 0)

        {

            $tab = new Tab($idTab);

            $tab->delete();

            return true;

        }

        return false;

    }
}