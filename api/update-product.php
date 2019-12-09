<?php
include "../config.php";
$id = $_POST['id'];
$name = ucwords(addslashes($_POST['product_name']));
$image = addslashes($_FILES['product_image']['name']);
$desc = addslashes($_POST['product_description']);

if ($image) {
	$file_tmp = $_FILES['product_image']['tmp_name'];	
    if(move_uploaded_file($file_tmp, '../image/'.$image)){
        $cekquery = $mysqli->query("SELECT * FROM product WHERE id='$id' ");
        $ceking = $cekquery->num_rows;
        if ($ceking > 0) {
            $query = $mysqli->query("UPDATE product SET
                product_name = '$name',
                product_image = '$image',
                product_description = '$desc'

                WHERE id = '$id'
            ");
            if ($query) {
                $status = "200";
                $message = "Success Edit Product to ".$name;
            } else {
                $status = "404";
                $message = $mysqli->error;
            }
        } else {
            $status = "404";
            $message = "Failed to Edit Product karena product ga ada";
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