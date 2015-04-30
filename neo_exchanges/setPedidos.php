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
                'total_dif' => $diferencia
            )
        );
        $inter->setItemSales($id_order, $results);
        $inter->setItemBuys($id_order, $results2);
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
?>