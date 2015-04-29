<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */
session_start();
require_once(dirname(__FILE__).'/config/config.inc.php');
require_once(dirname(__FILE__).'/neo_exchanges/Exchange.php');

if(isset($_POST['id_usuario'])){

    $inter = new Exchange();

    $resultados  = $inter->getItemSales($_POST['items_sale']);
    $resultados2 = $inter->getItemBuys($_POST['items_buy']);

    $price = 0;
    foreach($resultados as $resultado){
        $price += round($resultado['price']);
    }

    $price2 = 0;
    foreach($resultados2 as $resultado2){
        $price2 += round($resultado2['price']);
    }

    $favor = $price - $price2;
    if($favor >= 0){
        $diferencia = 0;
    }else{
        $favor = 0;
        $diferencia = ($favor * -1);
    }

    $idorder = $inter->setOrder(array(
            'id_customer' => $_POST['id_usuario'],
            'total_in_favor' => $favor,
            'total_dif' => $diferencia
        )
    );



}
?>