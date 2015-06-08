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
        $results = array();
        if(is_array($items))
        foreach($items as $item) {
            $results[] = Db::getInstance()->GetRow("
                        SELECT
                            ppl.id_product id,
                            ppl.name,
                            w.price
                        FROM
                            "._DB_PREFIX_."product_lang ppl,
                            "._DB_PREFIX_."product_shop pps,
                            "._DB_PREFIX_."neo_whitelist w
                        WHERE
                            pps.id_product = ppl.id_product
                            AND w.id_product = pps.id_product
                            AND ppl.id_product = '".$item."'
                        ");
        }
        return $results;
    }

    function getItemBuys($items){
        $results = array();
        if(is_array($items))
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

    function setItemSales($id_order, $items){
        if(count($items)){
            $sales = array();
            foreach($items as $item) {
                $id_image = Product::getCover($item['id']);
                $image_url='';
                if (sizeof($id_image) > 0) {
                    $image = new Image($id_image['id_image']);
                    // get image full URL
                    $image_url = _PS_BASE_URL_._THEME_PROD_DIR_.$image->getExistingImgPath().".jpg";
                }
                $sql = "INSERT INTO "._DB_PREFIX_."neo_items_sales (id_product, id_neo_exchange, name, price, image, created_at, status)
                    VALUES ('".$item['id']."','".$id_order."','".pSQL($item['name'])."','".$item['price']."','".$image_url."',now(),1)";
                Db::getInstance()->executeS($sql);
                $sales[] = '<div style="vertical-align:top"><img style="float:left;margin-right:10px;border:1px solid rgb(204,204,204);height:79px" alt="'.$item['name'].'" src="'.$image_url.'"/> '.$item['name'].'<br><br>'.$item['price'].'</div>';
            }
            return $sales;
        }else{
            return false;
        }
    }

    function setItemBuys($id_order, $items){
        if(count($items)){
            $buys = array();
            foreach($items as $item) {
                $id_image = Product::getCover($item['id']);
                $image_url='';
                if (sizeof($id_image) > 0) {
                    $image = new Image($id_image['id_image']);
                    // get image full URL
                    $image_url = _PS_BASE_URL_._THEME_PROD_DIR_.$image->getExistingImgPath().".jpg";
                }
                $sql = "INSERT INTO "._DB_PREFIX_."neo_items_buys (id_product, id_neo_exchange, name, price, image, created_at, status)
                    VALUES ('".$item['id']."','".$id_order."','".pSQL($item['name'])."','".$item['price']."','".$image_url."',now(),1)";
                Db::getInstance()->executeS($sql);
                $buys[] = '<div style="vertical-align:top"><img style="float:left;margin-right:10px;border:1px solid rgb(204,204,204);height:79px" alt="'.$item['name'].'" src="'.$image_url.'"/> '.$item['name'].'<br><br>'.$item['price'].'</div>';
            }
            return $buys;
        }else{
            return false;
        }
    }

    function setExchange($fields){
        if(isset($fields['id_customer'])){
            $sql = "INSERT INTO "._DB_PREFIX_."neo_exchanges (id_customer, forma_pago, total_in_favor, total_dif, date_add, id_neo_status)
                    VALUES ('".$fields['id_customer']."','".$fields['forma_pago']."','".$fields['total_in_favor']."','".$fields['total_dif']."',now(),1)";
            Db::getInstance()->executeS($sql);
            return Db::getInstance()->Insert_ID();
        }
        return false;
    }

    function setReferencia($referencia, $id){
        if($referencia){
            $sql = "UPDATE "._DB_PREFIX_."neo_exchanges SET reference = '".$referencia."' WHERE id_neo_exchange = '".$id."'";
            return Db::getInstance()->execute($sql);
        }
        return false;
    }
}