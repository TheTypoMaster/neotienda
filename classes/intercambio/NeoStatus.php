<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 28/05/2015
 * Time: 10:42 PM
 */

class NeoStatusCore extends ObjectModel
{
    /** @var string Name */
    public $name;

    /** @var string Template name if there is any e-mail to send */
    public $template;

    /** @var boolean Send an e-mail to customer ? */
    public $send_email;

    public $module_name;

    /** @var boolean Allow customer to view and download invoice when order is at this state */
    public $invoice;

    /** @var string Display state in the specified color */
    public $color;

    public $unremovable;

    /** @var boolean Log authorization */
    public $logable;

    /** @var boolean Delivery */
    public $delivery;

    /** @var boolean Hidden */
    public $hidden;

    /** @var boolean Shipped */
    public $shipped;

    /** @var boolean Paid */
    public $paid;

    /** @var boolean True if carrier has been deleted (staying in database as deleted) */
    public $deleted = 0;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'neo_status',
        'primary' => 'id_neo_status',
        'multilang' => true,
        'fields' => array(
            'send_email' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            //'module_name' =>array('type' => self::TYPE_STRING, 'validate' => 'isModuleName'),
            'invoice' => 	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'color' => 		array('type' => self::TYPE_STRING, 'validate' => 'isColor'),
            'logable' => 	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'shipped' => 	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'unremovable' =>array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'delivery' =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'hidden' =>		array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'paid' =>		array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'deleted' =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),

            // Lang fields
            'denominacion' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 64),
            //'template' => 	  array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isTplName', 'size' => 64),
        ),
    );

    protected $webserviceParameters = array(
        'fields' => array(
            'unremovable' => array(),
            'delivery' => array(),
            'hidden' => array(),
        ),
    );

    const FLAG_NO_HIDDEN	= 1;  /* 00001 */
    const FLAG_LOGABLE		= 2;  /* 00010 */
    const FLAG_DELIVERY		= 4;  /* 00100 */

    const FLAG_SHIPPED		= 8;  /* 01000 */
    const FLAG_PAID			= 16; /* 10000 */

    public function __construct($id = null){
        if($id){
            $cache_id = 'NeoStatus::'.$id;
            //if (!Cache::isStored($cache_id))
            //{
                $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                SELECT *
                FROM `'._DB_PREFIX_.'neo_status`
                WHERE `id_neo_status` = '.$id);
                Cache::store($cache_id, $result);
            //}
            return Cache::retrieve($cache_id);
        }else{
            $this->getNeoStatus();
        }
    }

    public function getNeoStatu($id){
        $cache_id = 'NeoStatus::'.$id;
        if (!Cache::isStored($cache_id))
        {
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                SELECT *
                FROM `'._DB_PREFIX_.'neo_status`
                WHERE `id_neo_status` = '.$id);
            Cache::store($cache_id, $result);
        }
        return Cache::retrieve($cache_id);
    }

    /**
     * Get all available order statuses
     *
     * @param integer $id_lang Language id for status name
     * @return array Order statuses
     */
    public static function getNeoStatus()
    {
        $cache_id = 'NeoStatus::getNeoStatus';
        //if (!Cache::isStored($cache_id))
        //{
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'neo_status`
			WHERE status = 1
			ORDER BY `id_neo_status` ASC');
            Cache::store($cache_id, $result);
        //}
        return Cache::retrieve($cache_id);
    }

    /**
     * Check if we can make a invoice when order is in this state
     *
     * @param integer $id_order_state State ID
     * @return boolean availability
     */
    public static function invoiceAvailable($id_order_state)
    {
        $result = false;
        if (Configuration::get('PS_INVOICE'))
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
			SELECT `invoice`
			FROM `'._DB_PREFIX_.'neo_status`
			WHERE `id_neo_status` = '.(int)$id_order_state);
        return (bool)$result;
    }

    public function isRemovable()
    {
        return !($this->unremovable);
    }
}