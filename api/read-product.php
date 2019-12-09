<?php
include "../config.php";    

$query = $mysqli->query("SELECT * FROM product ORDER BY id DESC");

$response = array();
$response["product"] = array();
while ($data = $query->fetch_array()) {
    $item['id'] = $data['id'];
    $item['product_name'] = $data['product_name'];
    $item['product_image'] = base_url("image/".$data['product_image']);
    $item['product_description'] = $data['product_description'];
    array_push($response["product"], $item);
}
echo json_encode($response);
?>