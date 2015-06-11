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
    $results  = array();
    $results2 = array();
    $price = 0;
    $price2 = 0;
    $inter1 = $inter2 = $forma_pago = '';
    $inter = new Exchange();

    if(isset($_POST['items_sale']))
        $results  = $inter->getItemSales($_POST['items_sale']);

    if(isset($_POST['items_buy']))
        $results2 = $inter->getItemBuys($_POST['items_buy']);

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
        $id_exchange = $inter->setExchange(array(
                'id_customer' => $_POST['id_usuario'],
                'forma_pago' => $_POST['forma_pago'],
                'total_in_favor' => $favor,
                'total_dif' => $dif
            )
        );
        $reference = date('Ym').sprintf('%03d', $id_exchange);
        $inter->setReferencia($reference, $id_exchange);
        $sales = $inter->setItemSales($id_exchange, $results);
        $buys = $inter->setItemBuys($id_exchange, $results2);

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

        $customer = new Customer((int)$_POST['id_usuario']);
        $configuration = Configuration::getMultiple(array('PS_LANG_DEFAULT', 'PS_SHOP_EMAIL', 'PS_SHOP_NAME'));
        $id_lang = (int)$configuration['PS_LANG_DEFAULT'];
        $template = 'intercambio';
        $subject = 'Neotienda pedido de intercambio';//$this->l('New Account', $id_lang);
        $templateVars = array(
            '{firstname}' => $customer->firstname,
            '{lastname}' => $customer->lastname,
            '{customer_id}' => (int)$customer->id,
            '{inter1}' => $inter1,
            '{inter2}' => $inter2?'Estos son los juegos que quiere:<br>'.$inter2:'',
            '{price}'  => 'Valor de tus Juegos: '.$price,
            '{favor}'  => 'Saldo a favor: '.$favor,
            '{price2}' => $price2?'Total de los juegos a intercambiar: '.$price2:'',
            '{dif}'    => $dif?'Diferencia a pagar: '.$dif:''
        );
        $iso = Language::getIsoById((int)($id_lang));
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
        }
        echo true;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}else{
    echo 'Empty Information';
}
?>