<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */
session_start();
require(dirname(__FILE__) . '/../config/config.inc.php');

if($_POST){
    $customer = array();
    $result = Db::getInstance()->GetRow("SELECT * FROM "._DB_PREFIX_ ."customer WHERE active = 1
    AND email = '".pSQL($_POST['login_email'])."'  AND passwd = '".Tools::encrypt($_POST['login_pass'])."' AND deleted = 0");

    if (!$result){
        echo false;
    }else{
        echo $result['id_customer'];
    }
}
?>