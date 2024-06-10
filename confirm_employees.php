<?php
include('check.php');
$con=$_POST['submit'];
$ars=array();
if($con=="Confirm Employee/s"){
foreach($_POST['confirm'] as $value)
{
	$ars[]=$value;
	$updates="UPDATE employees SET confirmed='1' WHERE empid='$value'";
		mysql_query($updates);
		echo "<script>alert('Successfuly approved Employees.');";
		echo "window.top.location.href='home.php';";
		echo "</script>";
}		
}else if ($con=="Reject and Delete Employee/s"){
foreach($_POST['confirm'] as $value)
{
	$ars[]=$value;
	$updates = "DELETE FROM employees WHERE empid = '$value'";
		mysql_query($updates);

	$updates2 = "DELETE FROM training_pax WHERE empid = '$value'";
		mysql_query($updates2);
		echo "<script>alert('Successfuly Rejected Employees and Removed them from Trainings.');";
		echo "window.top.location.href='home.php';";
		echo "</script>";
}	
}
	

	
		
?>