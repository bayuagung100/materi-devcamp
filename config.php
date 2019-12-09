<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "devcamp";
 
$mysqli = new mysqli($servername, $username, $password, $database);

function base_url($var)
{
    $url = "http://localhost/devcamp/".$var;
    return $url;
}
?>