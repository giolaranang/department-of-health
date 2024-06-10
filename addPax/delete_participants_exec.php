<?php
include('../check.php');
$ar=array();
$train=$_POST['train'];
foreach($_POST['addme'] as $value)
{
	$ar[]=$value;
	$delete_pax = "DELETE from training_pax WHERE empid = '$value' AND TR_ID= '$train'";
		mysql_query($delete_pax);
}		
		echo "<script>alert('Successfuly deleted participant/s.');";
		echo "window.top.location.href='../home.php';";
		echo "</script>";

?>