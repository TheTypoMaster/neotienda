<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class NeoWhitelistCore extends ObjectModel
{
    public $id;

    public $id_product;

    public $price;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'neo_whitelist',
        'primary' => 'id_neo_whitelist',
        'fields' => array(
            'id_product' => 				array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'price' =>	                    array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'copy_post' => false),
            'date_add' => 					array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'copy_post' => false),
            'date_upd' => 					array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'copy_post' => false),
        ),
    );

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function add($autodate = true, $null_values = true)
    {
        $success = parent::add($autodate, $null_values);
        return $success;
    }

    public function update($nullValues = false)
    {
        return parent::update(true);
    }

    public function delete()
    {
        return parent::delete();
    }

    /**
     * Return customers list
     *
     * @return array Customers
     */
    public static function getNeoWhitelists()
    {
        $sql = 'SELECT `id_neo_whitelist`, `id_product`, `price`
				FROM `'._DB_PREFIX_.'neo_whitelist`
				WHERE 1
				ORDER BY `id_neo_whitelist` ASC';
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    public function getByIdProduct($idProduct){
        $sql = 'SELECT *
				FROM `'._DB_PREFIX_.'neo_whitelist`
				WHERE `id_product` = \''.pSQL($idProduct).'\'';

        $result = Db::getInstance()->getRow($sql);

        if (!$result)
            return false;
        $this->id = $result['id_neo_whitelist'];
        foreach ($result as $key => $value)
            if (array_key_exists($key, $this))
                $this->{$key} = $value;

        return $this;
    }
}
