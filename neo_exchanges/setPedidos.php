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

$_POST['id_usuario'] = 1011;
$_POST['items_sale'] = array(1318, 20);
$_POST['items_buy'] = array(339, 100);

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

    $diferencia = $price2 - $price;
    if($diferencia >= 0){
        $favor = 0;
    }else{
        $favor = ($diferencia * -1);
        $diferencia = 0;
    }

    $idorder = $inter->setOrder(array(
            'id_customer' => $_POST['id_usuario'],
            'total_in_favor' => $favor,
            'total_dif' => $diferencia
        )
    );
    var_dump($idorder);
}
?>