<?php
include "../config.php";
$name = ucwords(addslashes($_POST['product_name']));
$image = addslashes($_FILES['product_image']['name']);
$desc = addslashes($_POST['product_description']);

if ($image) {
	$file_tmp = $_FILES['product_image']['tmp_name'];	
    if(move_uploaded_file($file_tmp, '../image/'.$image)){
        $query = $mysqli->query("INSERT INTO product
        (
            product_name,
            product_image,
            product_description
        )
        VALUES
        (
            '$name',
            '$image',
            '$desc'
        )
        ");
        if ($query) {
            $status = "200";
            $message = "Success Add Product ".$name;
        } else {
            $status = "404";
            $message = $mysqli->error;
        }
    }
    
}

$response = array();
$response['response'] = array();
$item['status']=$status;
$item['message']=$message;
array_push($response["response"], $item);
echo json_encode($response);
?>