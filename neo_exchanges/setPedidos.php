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

if(isset($_REQUEST['id_usuario'])){
    $results  = array();
    $results2 = array();
    $price = 0;
    $price2 = 0;
    $inter1 = $inter2 = '';

    $inter = new Exchange();

    if(isset($_REQUEST['items_sale']))
    $results  = $inter->getItemSales($_REQUEST['items_sale']);

    if(isset($_REQUEST['items_buy']))
    $results2 = $inter->getItemBuys($_REQUEST['items_buy']);

    foreach($results as $result){
        $price += round($result['price']);
    }

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
                'id_customer' => $_REQUEST['id_usuario'],
                'total_in_favor' => $favor,
                'total_dif' => $dif
            )
        );
        $sales = $inter->setItemSales($id_order, $results);
        $buys = $inter->setItemBuys($id_order, $results2);

        if(is_array($sales)){
            foreach($sales as $sale){
                $inter1 .= $sale;
            }
        }
        if(is_array($buys)){
            foreach($buys as $buy){
                $inter2 .= $buy;
            }
        }

        $customer = new Customer((int)$_REQUEST['id_usuario']);

        $configuration = Configuration::getMultiple(array('PS_LANG_DEFAULT', 'PS_SHOP_EMAIL', 'PS_SHOP_NAME'));
        $id_lang = (int)$configuration['PS_LANG_DEFAULT'];
        $template = 'intercambio';
        $subject = 'Neotienda pedido de intercambio';//$this->l('New Account', $id_lang);
        $templateVars = array(
            '{firstname}' => $customer->firstname,
            '{lastname}' => $customer->lastname,
            '{customer_id}' => (int)$customer->id,
            '{inter1}' => $inter1,
            '{inter2}' => $inter2
        );
        $iso = Language::getIsoById((int)($id_lang));
        var_dump(array($id_lang,
            $template,
            $subject,
            $templateVars,
            $customer->email,
            $customer->firstname.' '.$customer->lastname,
            $configuration['PS_SHOP_EMAIL'],
            $configuration['PS_SHOP_NAME'],
            NULL,
            NULL,
            _PS_ROOT_DIR_.'/mails/'));
        if (file_exists(_PS_ROOT_DIR_.'/mails/'.$iso.'/'.$template.'.html')){
            $sol = Mail::Send(
                $id_lang,
                $template,
                $subject,
                $templateVars,
                $customer->email,
                $customer->firstname.' '.$customer->lastname,
                $configuration['PS_SHOP_EMAIL'],
                $configuration['PS_SHOP_NAME'],
                NULL,
                NULL,
                _PS_ROOT_DIR_.'/mails/'
            );
            echo 'fin='.$sol;
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
?>