<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */
session_start();
require(dirname(__FILE__) . '/../config/config.inc.php');

if(isset($_POST['opera']))
switch ($_POST['opera']) {
    case 'login':
        $customer = array();
        $result = Db::getInstance()->GetRow("SELECT * FROM "._DB_PREFIX_ ."customer WHERE active = 1
        AND email = '".pSQL($_POST['login_email'])."'  AND passwd = '".Tools::encrypt($_POST['login_pass'])."' AND deleted = 0");

        if (!$result){
            echo false;
        }else{
            echo $_COOKIE['login'] = $result['id_customer'];
        }
        break;
    case 'session':
        if($_COOKIE['login']){
            echo $_COOKIE['login'];
        }else{
            echo false;
        }
        break;
    /*case 2:
        echo "i es igual a 2";
        break;
    default:
        echo "i no es igual a 0, 1 ni 2";*/
}
?>