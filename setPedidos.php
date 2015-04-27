<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 21/04/2015
 * Time: 11:38 AM
 */
session_start();
require(dirname(__FILE__).'/config/config.inc.php');

function getItemSales($items){
    foreach($items as $item) {
        $results[] = Db::getInstance()->GetRow("
                        SELECT
                            ppl.id_product id,
                            ppl.name,
                            w.price
                        FROM
                            "._DB_PREFIX_."product_lang ppl,
                            "._DB_PREFIX_."product_shop pps,
                            whitelist w
                        WHERE
                            pps.id_product = ppl.id_product
                            AND w.id_product = pps.id_product
                            AND ppl.id_product = '".$item."'
                        ");
    }

    return $results;
}

function getItemBuys($items){
    foreach($items as $item) {
        $results[] = Db::getInstance()->GetRow("
                        SELECT
                            ppl.id_product id,
                            ppl.name,
                            pps.price
                        FROM
                            "._DB_PREFIX_."product_lang ppl,
                            "._DB_PREFIX_."product_shop pps
                        WHERE
                            pps.id_product = ppl.id_product
                            AND ppl.id_product = '".$item."'
                        ");
    }

    return $results;
}

function setItemSales($id_product, $id_order, $items){
    if(count($items)){
        foreach($items as $item) {
            $id_image = Product::getCover($id_product);
            $image_url='';
            if (sizeof($id_image) > 0) {
                $image = new Image($id_image['id_image']);
                // get image full URL
                $image_url = _PS_BASE_URL_._THEME_PROD_DIR_.$image->getExistingImgPath().".jpg";
            }
            Db::getInstance()->insert('items_sales', array(
                'id_product' => (int)$id_product,
                'id_order'   => (int)$id_order,
                'name' => pSQL($item['name']),
                'price' => $item['price'],
                'image' => $image_url,
                'status' => 1
            ));
        }
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

$items_sale = array(1318, 20, 1322, 1318);
$items_buy = array(270, 339, 67);
$items_string = '';

$resultados  = getItemSales($items_sale);
$resultados2 = getItemBuys($items_buy);

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

var_dump($resultados);


die;
?>