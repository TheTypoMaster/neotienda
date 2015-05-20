<?php
/**
 * Created by PhpStorm.
 * User: larismendi
 * Date: 18/03/2015
 * Time: 09:04 PM
 */
session_start();
require(dirname(__FILE__) . '/../config/config.inc.php');

$json=array();

if($_POST){
    $pais       = $_POST["pais"];
    $plataforma = $_POST["plataforma"];
    $store      = $_POST["store"];
    $tipo       = $_POST["tipo"];
    $titulo     = $_POST["titulo"];

    $sql = "SELECT
                ppl.id_product id,
                ppl.name,
                w.price
            FROM
                    "._DB_PREFIX_."category pc,
                    "._DB_PREFIX_."category_lang pcl2,
                    "._DB_PREFIX_."category_product pcp,
                    "._DB_PREFIX_."product_shop pps,
                    "._DB_PREFIX_."neo_whitelist w,
                    "._DB_PREFIX_."product_lang ppl
            WHERE
                    pc.id_parent IN (SELECT id_category FROM "._DB_PREFIX_."category_lang WHERE name LIKE '%".$plataforma."%')
                    AND pcl2.id_category = pc.id_category
                    AND pcl2.id_category = pcp.id_category
                    AND pcp.id_category = pps.id_category_default
                    AND pps.id_product = w.id_product
                    AND pps.id_product = ppl.id_product
                    AND ppl.name LIKE '%".$titulo."%'
            GROUP BY id
            ORDER BY ppl.name";
    if ($results = Db::getInstance()->ExecuteS($sql))
        foreach ($results as $row){
            $id_image = Product::getCover($row["id"]);
            $image_url='';
            if (sizeof($id_image) > 0) {
                $image = new Image($id_image['id_image']);
                // get image full URL
                $image_url = _PS_BASE_URL_._THEME_PROD_DIR_.$image->getExistingImgPath().".jpg";
            }
            $json[]=array(
                'id'=> $row["id"],
                'sku'=> $row["name"],
                'label'=> $row["name"],
                'price'=> round($row["price"]),
                'imagen'=> $image_url
            );
        }
}

echo json_encode($json);

?>