<?php

$con=mysql_connect("localhost","root","");
mysql_select_db("DOH_trainings",$con);
$fname=$_POST['fname2'];
$mname=$_POST['mname2']; 
$lname=$_POST['lname2'];
$username=$_POST['usname2'];
$password1=$_POST['pword2'];
$salt="aB1cD2eF3G";
$password = md5($salt.$password1);
$designation=$_POST['selection2'];
$level=$_POST['level2'];
$salary_grade=$_POST['salary_grade2'];
$days_present=$_POST['num_days_present2'];
$vl='0';
$sl='0';
	$insert_user="INSERT INTO employees(fname,mname,lname,uname,pword,designation,level,salary_grade,num_days_present,vl,sl)VALUES('$fname','$mname','$lname','$username','$password','$designation','$level','$salary_grade','$days_present','$vl','$sl')";
		mysql_query($insert_user);		
		
		echo "<script>alert('Successfully Submitted For Approval!');";
		echo "window.top.location.href='../home.php';";
		echo "</script>";	
?>