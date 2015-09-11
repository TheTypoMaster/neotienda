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
		p.`name`,
		p.`price` AS `pprice`';

        $this->_join = '
        LEFT JOIN `'._DB_PREFIX_.'product_lang` p ON (p.`id_product` = a.`id_product`)
        ';

        $this->_orderBy = 'id_neo_whitelist';
        $this->_orderWay = 'DESC';
    }



}