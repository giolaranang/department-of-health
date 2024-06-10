<?php
include('../check.php');

$verify = $_GET['ResultPass'];
$salt = "aB1cD2eF3G";
$compare_password = md5($salt.$verify);

$conv2 = $_SESSION["password"];
$salt = "aB1cD2eF3G";
$actual_password = md5($salt.$conv2);

//echo $compare_password.'-Compare <br>';
//echo $actual_password.'-Actual <br>';

if($actual_password!=$compare_password){
echo "<script>alert('Authentication Failed!!Logging Out Account..');";
//echo "window.top.location.href='../logout.php';";
echo "location.href='employees_list.php';";
echo "</script>";
}else{
echo "<script>alert('Successfully Added One Month.');";
echo "location.href='employees_list.php';";
echo "</script>";
}
?>