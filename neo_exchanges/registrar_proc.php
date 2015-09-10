<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 19/07/2015
 * Time: 10:15 PM
 */

session_start();
require(dirname(__FILE__) . '/../config/config.inc.php');

if (isset($_REQUEST['regist_nomb']) && isset($_REQUEST['regist_email']) && isset($_REQUEST['regist_pass'])) {
    $cookie = new Cookie('ps', '', 3600);
    $nombre   = $_REQUEST['regist_nomb'];
    $apellido = $_REQUEST['regist_apel'];
    $email    = $_REQUEST['regist_email'];
    $clave    = $_REQUEST['regist_pass'];
    //$token    = $_POST['regist_token'];

    if (!Db::getInstance()->getValue("SELECT count(id_customer) FROM "._DB_PREFIX_ ."customer WHERE email= '$email'")) {
        if(Db::getInstance()->Execute("INSERT INTO "._DB_PREFIX_ ."customer
        (id_gender, id_lang, firstname, lastname, email, passwd, last_passwd_gen, birthday, newsletter, ip_registration_newsletter, newsletter_date_add, optin, secure_key, note, active, is_guest, deleted, date_add, date_upd)
        VALUES
        (9,1,'$nombre','$apellido','$email','".md5(_COOKIE_KEY_.$clave)."',NOW(),NULL,0,NULL,NULL,0,'".md5(uniqid(rand(), true))."',NULL,1,0,0,NOW(),NOW())")){
            $id = Db::getInstance()->Insert_ID();
            Db::getInstance()->Execute("INSERT INTO "._DB_PREFIX_ ."customer_group (id_customer, id_group) VALUES ($id,3)");
            echo "Se registro satisfactoriamente.";
        }else{
            echo false;
        }
    }else{
        echo "Usuario repetido.";
    }
}
?>