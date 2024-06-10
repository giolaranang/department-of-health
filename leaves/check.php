<link rel="icon" type="icon/ico" href="../images/favicon.ico" />
<?php
session_start();
include 'databaseConnection.php';
$_SESSION['today'] = date('Y-m-j');

//$conv2 = $_SESSION["password"];
//$salt = "aB1cD2eF3G";
//$password = md5($salt.$conv2);

//$sql2="select * from employees where uname='".$_SESSION["username"]."' and pword='".$password."'";
//$rsql2=mysql_query($sql2);


	//echo "<script language='javascript'>window.top.location.href='index.php';</script>";



?>
