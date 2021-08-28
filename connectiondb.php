<?php
$host="localhost";
$user="root";
$pass="";
$db="urlshorten";

$con = mysqli_connect($host, $user, $pass, $db);

if(!$con){
	die("Connection failed:" .mysqli_connect_error());
}

mysqli_select_db($con,"urlshorten");
?>