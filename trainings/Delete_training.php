<?php
include('../check.php');
$T_ID = $_GET['TR_ID'];
$delete_tr="DELETE from training_gi WHERE TR_ID='$T_ID'";
mysql_query($delete_tr);
echo "<script>alert('Successfuly deleted Training.');";
		echo "window.top.location.href='../home.php';";
		echo "</script>";
?>