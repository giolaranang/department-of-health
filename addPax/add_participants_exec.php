<?php
include('../check.php');
$ar=array();
$train=$_POST['train'];
foreach($_POST['addme'] as $value)
{
	$ar[]=$value;
	$insert_user="INSERT INTO training_pax(TR_ID,empid)VALUES('$train','$value')";
		mysql_query($insert_user);
}		
		echo "<script>alert('Successfuly added participant/s.');";
		echo "window.top.location.href='../home.php';";
		echo "</script>";

?>