<?php
include "../config.php";

$id = $_POST['id'];

$cekquery = $mysqli->query("SELECT * FROM product WHERE id='$id' ");
$ceking = $cekquery->num_rows;
if ($ceking > 0) {
    $query = $mysqli->query("DELETE FROM product WHERE id='$id' ");
    if ($query) {
        $status = "200";
        $message = "Success Delete Product";
    } else {
        $status = "404";
        $message = $mysqli->error;
    }
} else {
    $status = "404";
    $message = "Failed to Delete Product karena product tidak ada";
}

$response = array();
$response['response'] = array();
$item['status']=$status;
$item['message']=$message;
array_push($response["response"], $item);
echo json_encode($response);
?>