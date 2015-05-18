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
			!Configuration::updateValue('MYMODULE_NAME', 'my friend')  )    
			return false;   

		return true;
	}
}