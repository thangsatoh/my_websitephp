<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'loginphp';

$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("cannot access database");
mysqli_query($conn,"SET NAMES 'UTF8'");



