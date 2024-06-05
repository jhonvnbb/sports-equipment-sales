<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "sports_equipment_sales";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>