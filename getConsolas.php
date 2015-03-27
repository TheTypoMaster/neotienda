<?php
mysql_connect("localhost","neoliam_tienda","HolaNeo123.");
mysql_select_db("neoliam_tienda");

$query=mysql_query("SELECT
						ps_category_lang.name
					FROM
						ps_category_lang,
						ps_category
					WHERE
						ps_category_lang.id_category = ps_category.id_category
						AND ps_category.id_parent IN (3, 57, 58)
					ORDER BY ps_category_lang.name");
$json=array();

echo '<option value="">Consolas</option>';

while($student=mysql_fetch_array($query)){
    echo '<option value="'.$student["name"].'">'.$student["name"].'</option>';
}

?>