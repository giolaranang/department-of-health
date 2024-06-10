<?php
include('../check.php');
if($_SESSION['type']=="hrl"){

$con=mysql_connect("localhost","root","");
mysql_select_db("doh_leaves",$con);
$lastname=$_POST['lname'];
$firstname=$_POST['fname'];
$midname=$_POST['mname'];

	$first = $firstname[0];
	$second = $midname[0];

	$fname = ucwords($first);
	$mname = ucwords($second);

	$fname2 = ucwords($firstname);
	$mname2 = ucwords($midname);
	$lname = ucwords($lastname);
	$username = $fname.$mname.$lname;
	$vl='';
	$sl='';
$conv2 = 'abc123';
$salt = "aB1cD2eF3G";
$password = md5($salt.$conv2);

$des=$_POST['designation'];
$lev=$_POST['level'];
$salarygrade=$_POST['salary_grade'];
$numdayspres=$_POST['num_days_present'];

	$insert_employee="INSERT INTO employees(lname,fname,mname,uname,pword,designation,level,salary_grade,num_days_present,VL,SL)VALUES('$lastname','$firstname','$midname','$username','$password','$des','$lev','$salarygrade','$numdayspres','$vl','$sl')";
		mysql_query($insert_employee);		
		echo "<script>alert('Successfuly added new user.');";
		echo "window.top.location.href='../home.php';";
		echo "</script>";	

}else{
		echo "<script>alert('Restricted Area.');";
		echo "window.top.location.href='../home.php';";
		echo "</script>";	
}
?>