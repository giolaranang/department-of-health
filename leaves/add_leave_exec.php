<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("DOH_leaves",$con);
$empid = $_POST['empid'];
$sql2 = " SELECT * from employees where salary_grade='$empid'";
$rsql2 = mysql_query($sql2);
while($row=mysql_fetch_array($rsql2)){
	
		$oldvl = $row['VL'];
		$oldsl = $row['SL'];
	
}
$count = 0.0416;
$choice = $_POST['Leave'];
$newvl = $_POST['days_applied'];
$newsl = $_POST['days_applied'];

	if ($choice == "VL") {  
	$multiplier = ($newvl * $count);
	$added2=round($multiplier+$oldvl,2);
	$update_leave_type = "UPDATE employees SET VL='$added2' where salary_grade= '$empid'";	
	mysql_query($update_leave_type);
	
		echo "<script>alert('Updated Account Leaves!');";
		echo "window.top.location.href='../home.php'".session_id().";";
		echo "</script>";
	}
	else if ($choice="SL"){
$multiplier = ($newsl * $count);
$added1=($multiplier+$oldsl);
	$update_leave_type = "UPDATE employees SET SL='$added1' where salary_grade= '$empid'";	
	mysql_query($update_leave_type);
	
		echo "<script>alert('Updated Account Leaves!');";
		echo "window.top.location.href='../home.php'".session_id().";";
		echo "</script>";
	}
?>