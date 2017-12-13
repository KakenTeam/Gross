<?php

$server_name     = "root";
$server_password = "";
$server_host     = "localhost";
$database = "thicuoiki";

$connect = mysqli_connect($server_host, $server_name, $server_password, $database)
 or die("Cannot connect to database :".mysqli_connect_error());

?>