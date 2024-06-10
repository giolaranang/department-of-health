<?php include('check.php');
$_SESSION['today'] = date('Y-m-j');
$conv2 = $_POST["curpwd"];
$salt = "aB1cD2eF3G";
$cur_password = md5($salt.$conv2);

$conv22 = $_SESSION["password"];
$salt = "aB1cD2eF3G";
$ses_password = md5($salt.$conv22);

$sql2="select * from employees where uname='".$_SESSION['username']."' and pword='".$cur_password."'";
$rsql2=mysql_query($sql2);
if ($ses_password == $cur_password){
	if($_POST['newpassword']==$_POST['connewpassword']){

$test = $_POST['newpassword'];
$salt = "aB1cD2eF3G";
$new_password = md5($salt.$test);
		
		$sql2="Update employees Set pword='".$new_password."' where uname='".$_SESSION['username']."'";
		mysql_query($sql2);
		$ses_password=$new_password;
		echo "<script language='javascript'>alert('Password Changed Successfully.');self.location='chpw.php';</script>";
	
	}else{

		echo "<script language='javascript'>alert('New Password did NOT match with the confirmation of New password.');self.location='chpw.php';</script>";
	}
}else{
	echo "<script language='javascript'>alert('Invalid Current Password');self.location='chpw.php';</script>";
}

?>