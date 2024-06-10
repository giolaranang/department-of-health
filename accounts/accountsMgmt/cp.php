
<?php include('../check.php'); include('../logs.php');$_SESSION['today'] = date('Y-m-j');
//querys the current user details
$sql="select * from user where username='".$_SESSION['username']."' and password='".$_POST["newpassword"]."'";
$rsql=mysql_query($sql);
//function to record change password attempt
__logs("change password attempt");
//checks the current password
if ($_SESSION['password']==$_POST['curpwd']){
	if($_POST['newpassword']==$_POST['connewpassword']){
		//updates the database
		$sql="Update user Set password='".$_POST['newpassword']."' where username='".$_SESSION['username']."'";
		mysql_query($sql);
		//function to record change password successful
		__logs("change password successful");
		$_SESSION['password']=$_POST['newpassword'];
		echo "<script language='javascript'>alert('Password Change Successful');self.location='chpw.php';</script>";
	
	}else{
		//function to record change password failed
		__logs("change password failed");
		echo "<script language='javascript'>alert('New Password and Confirm Password do not match');self.location='chpw.php';</script>";
	}
}else{
	echo "<script language='javascript'>alert('Invalid Current Password');self.location='chpw.php';</script>";
}

?>