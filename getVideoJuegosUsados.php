<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 18/03/2015
 * Time: 09:04 PM
 */

mysql_connect("localhost","neoliam_tienda","HolaNeo123.");
mysql_select_db("neoliam_tienda");

$pais=$_REQUEST["pais"];
$plataforma=$_REQUEST["plataforma"];
$store=$_REQUEST["store"];
$tipo=$_REQUEST["tipo"];
$titulo=$_REQUEST["titulo"];

$query=mysql_query("SELECT
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
                            AND pcl2.name LIKE '%Usados%'
                            AND pcl2.id_category = ps_category_product.id_category
                            AND ps_category_product.id_category = ps_product_shop.id_category_default
                            AND ps_product_shop.id_product = ps_product_lang.id_product
                            AND ps_product_lang.name LIKE '%".$titulo."%'
                    GROUP BY id
                    ORDER BY ps_product_lang.name");
$json=array();

while($student=mysql_fetch_array($query)){
    $json[]=array(
        'id'=> $student["id"],
        'sku'=> $student["name"],
        'label'=> $student["name"]/*." - ".$student["id"]*/,
        'price'=> round($student["price"]),
        'imagen'=> 'http://victoriaperez.com/261-home_default/zarcillos.jpg'
    );
}

echo json_encode($json);

?>