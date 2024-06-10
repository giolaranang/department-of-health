<?php

$con=mysql_connect("localhost","root","");
mysql_select_db("doh_leaves",$con);
$lastname=$_POST['lname'];
$firstname=$_POST['fname'];
$midname=$_POST['mname'];
$des=$_POST['designation'];
$lev=$_POST['level'];
$salarygrade=$_POST['salary_grade'];
$VL =$_POST['Leave'];
$SL =$_POST['Leave'];


	$insert_employee="INSERT INTO employees(lname,fname,mname,designation,level,salary_grade,VL,SL)VALUES('$lastname','$firstname','$midname','$des','$lev','$salarygrade','$VL','$SL')";
		mysql_query($insert_employee);		
		echo "<script>alert('Successfuly added new user.');";
		echo "window.top.location.href='../home.php';";
		echo "</script>";	
?>