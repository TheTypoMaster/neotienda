<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 19/07/2015
 * Time: 10:15 PM
 */

session_start();
require(dirname(__FILE__) . '/../config/config.inc.php');

if (isset($_POST['form'])) {
    $cookie = new Cookie('ps', '', 3600);
    $nombre   = $_POST['regist-nomb'];
    $apellido = $_POST['regist-apel'];
    $email    = $_POST['regist-email'];
    $clave    = $_POST['regist-pass'];
    $token    = $_POST['regist-token'];

    if(Db::getInstance()->Execute("INSERT INTO "._DB_PREFIX_ ."customer
    (id_gender, id_lang, firstname, lastname, email, passwd, last_passwd_gen, birthday, newsletter, ip_registration_newsletter, newsletter_date_add, optin, secure_key, note, active, is_guest, deleted, date_add, date_upd)
    VALUES
    (9,1,'$nombre','$apellido','$email','".md5(_COOKIE_KEY_.$clave)."',NOW(),NULL,0,NULL,NULL,0,'$token',NULL,1,0,0,NOW(),NOW())")){
        $id = Db::getInstance()->Insert_ID();
        Db::getInstance()->Execute("INSERT INTO "._DB_PREFIX_ ."customer_group
        (id_customer, id_group)
        VALUES
        ($id,3)");
        echo $id;
    }else{
        echo false;
    }
}
?>