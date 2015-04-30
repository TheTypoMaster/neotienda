<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 06/04/15
 * Time: 10:52 PM
 */
session_start();
require(dirname(__FILE__) . '/../config/config.inc.php');

$pais=$_REQUEST["pais"];
$plataforma=$_REQUEST["plataforma"];
$store=$_REQUEST["store"];
$tipo=$_REQUEST["tipo"];
$titulo=$_REQUEST["titulo"];

$query=("SELECT
                            ps_product_lang.id_product id,
                            ps_product_lang.name,
                            ps_product_shop.price
                    FROM
                            ps_category,
                            ps_category_lang pcl2,
                            ps_category_product,
                            ps_product_shop,
                            ps_product_lang
                    WHERE
                            ps_category.id_parent IN (SELECT ps_category_lang.id_category FROM ps_category_lang WHERE ps_category_lang.name LIKE '%".$plataforma."%')
                            AND pcl2.id_category = ps_category.id_category
                            AND pcl2.name LIKE '%Nuevos%'
                            AND pcl2.id_category = ps_category_product.id_category
                            AND ps_category_product.id_category = ps_product_shop.id_category_default
                            AND ps_product_shop.id_product = ps_product_lang.id_product
                            AND ps_product_lang.name LIKE '%".$titulo."%'
                    GROUP BY id
                    ORDER BY ps_product_lang.name");
$json=array();

if ($results = Db::getInstance()->ExecuteS($sql))
    foreach ($results as $row){
        $json[]=array(
            'sku'=> $row["name"],
            'label'=> $row["name"]." - ".$row["id"],
            'price'=> $row["price"],
            'imagen'=> 'http://neotienda.com/261-home_default/zarcillos.jpg'
        );
    }

echo json_encode($json);

?>