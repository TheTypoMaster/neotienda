<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */
session_start();
require_once(dirname(__FILE__) . '/../config/config.inc.php');
require_once(dirname(__FILE__) . '/../neo_exchanges/Exchange.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['id_usuario'])){

    $inter = new Exchange();

    $results  = $inter->getItemSales($_POST['items_sale']);
    $results2 = $inter->getItemBuys($_POST['items_buy']);

    $price = 0;
    foreach($results as $result){
        $price += round($result['price']);
    }

    $price2 = 0;
    foreach($results2 as $result2){
        $price2 += round($result2['price']);
    }

    $dif = $price2 - $price;
    if($dif >= 0){
        $favor = 0;
    }else{
        $favor = ($dif * -1);
        $dif = 0;
    }

    try {
        $id_order = $inter->setOrder(array(
                'id_customer' => $_POST['id_usuario'],
                'total_in_favor' => $favor,
                'total_dif' => $dif
            )
        );
        $sales = $inter->setItemSales($id_order, $results);
        $buys = $inter->setItemBuys($id_order, $results2);

        $customer = new Customer((int)$_POST['id_usuario']);

        $configuration = Configuration::getMultiple(array('PS_LANG_DEFAULT', 'PS_SHOP_EMAIL', 'PS_SHOP_NAME'));
        $id_lang = (int)$configuration['PS_LANG_DEFAULT'];
        $template = 'intercambio';
        $subject = 'Neotienda pedido de intercambio';//$this->l('New Account', $id_lang);
        $templateVars = array(
            '{firstname}' => $customer->firstname,
            '{lastname}' => $customer->lastname,
            '{customer_id}' => (int)$customer->id,
            '{inter1}' => $sales,
            '{inter2}' => $buys
        );
        $iso = Language::getIsoById((int)($id_lang));
        if (file_exists(dirname(__FILE__).'/mails/'.$iso.'/'.$template.'.txt') AND file_exists(dirname(__FILE__).'/mails/'.$iso.'/'.$template.'.html'))
            Mail::Send($id_lang, $template, $subject, $templateVars, $customer->email,$customer->firstname.' '.$customer->lastname, $configuration['PS_SHOP_EMAIL'], $configuration['PS_SHOP_NAME'], NULL, NULL, dirname(__FILE__).'/mails/');

        /*$id_land = 'es';
        $template_name = 'intercambio';
        $title = 'Titulo';
        $templateVars['{lastname}'] = $customer->lastname;
        $templateVars['{firstname}'] = $customer->firstname;
        $from = 'neotiendas@gmail.com';
        $fromName = 'Neotienda pedido de intercambio';
        $fileAttachment = null;
        $send = Mail::Send(
            $id_land,
            $template_name,
            $title,
            $templateVars,
            $customer->email,
            $customer->firstname.' '.$customer->lastname,
            $from,
            $fromName,
            $fileAttachment,
            NULL,
            _PS_MAIL_DIR_
        );*/
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
?>