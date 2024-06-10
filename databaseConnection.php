<?php
$servername="localhost";
$username="root";
$password="";
$database="doh_trainings";

$con=mysqli_connect($servername,$username,$password,$database);
if (!$con){
	echo ("<script>alert('database connection failed');</script>");
	die("connection failed".mysqli_connect_error());

}




?>