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

if($_POST['start']){
    $sql = "SELECT
            cl.name
        FROM
            "._DB_PREFIX_."category_lang cl,
            "._DB_PREFIX_."category c
        WHERE
            cl.id_category = c.id_category
            AND c.id_parent IN (3, 57, 58)
        ORDER BY cl.name";

    echo '<option value="">Plataformas</option>';

    if ($results = Db::getInstance()->ExecuteS($sql))
        foreach ($results as $row){
            echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
        }
}

?>