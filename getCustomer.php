<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */
session_start();
require(dirname(__FILE__).'/config/config.inc.php');

function getByMd5($email, $passwd = NULL)
{
    $customer = array();
    $result = Db::getInstance()->GetRow("SELECT * FROM "._DB_PREFIX_ ."customer WHERE active = 1
    AND email = '".pSQL($email)."'  ".(isset($passwd) ? "AND passwd = '".Tools::encrypt($passwd)."'" : "") .
        " AND deleted = 0");

    if (!$result)
        return false;
    else
        return $result;
}
$email = 'luisfelipe.arismendi@gmail.com';
$passwd = '123456';

var_dump(getByMd5($email, $passwd));

?>