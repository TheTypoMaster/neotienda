<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 28/04/2015
 * Time: 11:36 PM
 */

class Exchange {

    public function __construct(){

    }

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

    function setItemBuys($id_product, $id_order, $items){
        if(count($items)){
            foreach($items as $item) {
                $id_image = Product::getCover($id_product);
                $image_url='';
                if (sizeof($id_image) > 0) {
                    $image = new Image($id_image['id_image']);
                    // get image full URL
                    $image_url = _PS_BASE_URL_._THEME_PROD_DIR_.$image->getExistingImgPath().".jpg";
                }
                Db::getInstance()->insert('items_buys', array(
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

    function setOrder($fields){
        //if(!is_array($fields)){

        return Db::getInstance()->insert('orders', array(
            'id_customer' => (int)$fields['id_customer'],
            'total_in_favor'   => (int)$fields['total_in_favor'],
            'total_dif' => $fields['total_dif'],
            'created_at' => 'NOW()',
            'status' => 1
        ), $add_prefix = false);

        //$sql = "INSERT INTO orders (id_customer, total_in_favor, total_dif, created_at, status)
        //        VALUES ('".$fields['id_customer']."','".$fields['total_in_favor']."','".$fields['total_dif']."',now(),1)";
        //echo $sql;die;
        //return Db::getInstance()->executeS($sql);

        //}
        //return false;
    }
}