<?php
mysql_connect("localhost","root","");
mysql_select_db("i1075913_ps3");

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
                        ps_category_lang,
                        ps_category_product,
                        ps_product_shop,
                        ps_product_lang
                    WHERE
                        ps_category_lang.name LIKE '%".$plataforma."%'
                        AND ps_category_lang.id_category = ps_category_product.id_category
                        AND ps_category_product.id_category = ps_product_shop.id_category_default
                        AND ps_product_shop.id_product = ps_product_lang.id_product
                        AND ps_product_lang.name LIKE '%".$titulo."%'
                    GROUP BY id
                    ORDER BY ps_product_lang.name");
$json=array();
 
while($student=mysql_fetch_array($query)){
    $json[]=array(
        'sku'=> $student["name"],
        'label'=> $student["name"]." - ".$student["id"],
        'price'=> $student["price"],
        'imagen'=> 'http://victoriaperez.com/261-home_default/zarcillos.jpg'
    );
}
 
echo json_encode($json);
 
?>