<?php
include "../config.php";

$id = $_POST['id'];

$query = $mysqli->query("SELECT * FROM product WHERE id='$id' ");

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