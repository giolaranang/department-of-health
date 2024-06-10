<link rel="icon" type="icon/ico" href="images/favicon.ico" />
<?php
session_start();
include 'databaseConnection.php';
date_default_timezone_set('Hongkong');
$_SESSION['today'] = date('Y-m-j');

	echo "<script language='javascript'>window.top.location.href='index.php';</script>";

?>
