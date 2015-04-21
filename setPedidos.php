<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */

function getByMd5($email, $passwd = NULL)
{
    $customer = array();
    $result = Db::getInstance()->GetRow("SELECT * FROM customer WHERE active = 1
    AND email = '".pSQL($email)."'  ".(isset($passwd) ? "AND passwd = '".pSQL(_COOKIE_KEY_.$passwd)."'" : "") .
        " AND deleted = 0");

    if (!$result)
        return false;
    $variato = $result['id_customer'];
    foreach ($result AS $key => $value)
        if (key_exists($key, $this))
            $customer[$variato]->{$key} = $value;

    return $customer;
}
//echo 'bien<br>';
//echo getByMd5('luisfelipe.arismendi@gmail.com', '123456');

?>