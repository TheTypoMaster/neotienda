<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */
session_start();
require(dirname(__FILE__) . '/config/config.inc.php');

switch ($_REQUEST['opera']) {
    case 'login':
        $int = 60;
        $result = Db::getInstance()->GetRow("SELECT * FROM "._DB_PREFIX_ ."customer WHERE active = 1
        AND email = '".pSQL($_REQUEST['login_email'])."'  AND passwd = '".Tools::encrypt($_REQUEST['login_pass'])."' AND deleted = 0");

        if (!$result){
            echo false;
        }else{
            if($_REQUEST['login_recordar']){
                $int = 30*60*60;
            }
            $_SESSION["time"] = time()+$int;
            echo $_SESSION['login'] = $result['id_customer'];
        }
        break;
    case 'session':
        if(isset($_SESSION['login']) && $_SESSION['login'] && $_SESSION["time"] > time()){
            echo $_SESSION['login'];
        }else{
            echo false;
        }
        break;
    /*
    default:
        echo "i no es igual a 0, 1 ni 2";*/
}
?>