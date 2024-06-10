<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://DOH-CAR/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include 'databaseConnection.php';
date_default_timezone_set('Hongkong');
if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
	$_SESSION['today'] = date('Y-m-j');

$conv2 = $_SESSION["password"];
$salt = "aB1cD2eF3G";
$password = md5($salt.$conv2);
	
	$sql="select * from users where username='".$_SESSION["username"]."' and password='".$password."'";
	$rsql=mysql_query($sql);

	$sql2="select * from employees where uname='".$_SESSION["username"]."' and pword='".$password."'";
	$rsql2=mysql_query($sql2);
	
	if (mysql_num_rows($rsql)>0){
		$row=mysql_fetch_array($rsql);
		if($row["status"]==0){
		echo "<script language='javascript'>alert('Sorry, this Account is Currently Disabled. Please contact your System Administrator for Assistance.');self.location='index.php';</script>";
		}else{
		echo "<script language='javascript'>window.top.location.href='home.php';</script>";
	}
	}else if (mysql_num_rows($rsql2)>0){
		$row2=mysql_fetch_array($rsql2);
		if($row2["confirmed"]==0){
		echo "<script language='javascript'>alert('Sorry, this Account is not yet confirmed. Please contact your System Administrator for Assistance.');self.location='index.php';</script>";
		}else{
		echo "<script language='javascript'>self.location='home2.php?".session_id()."';</script>" ;
		}
		


	}
}


?>
<html xmlns="http://DOH-CAR/2013/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CHD-CAR:Admin Aide V v1.0</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="SHORTCUT ICON" type="image/x-icon" href="images/url.bmp" />
<script>
		window.onload=init;
		function init(){
		document.getElementById("username").focus();
		}
</script>
<body class="indexbg">
</head>

<!--<body background="images/body_back.png">-->
<table class="table1" align="center" style="  border-radius: 10px;" >
	<tr>
		<td align="right" valign="middle">
                    <hr width=500 style="visibility:hidden"/>
                            <form id="form1" name="form1" method="post" action="validate.php?">
                            <table class="table2" align="right" >
                              <tr><td align="center" colspan="2">DOH-CAR</td></tr>
                              <tr>
                              	<td colspan="2">	
                              	<div id='time' align="center">		                       
                                    <?php
                        				echo date('F j, Y');
                        			?>                        
                                </div>
								</td>
                              </tr>
                              <tr>
                                <td colspan="2">Username:
                                  <label for="username"></label>
                                  <input name="username" type="text" id="username" maxlength="16" />
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">Password:
                                  <label for="password"></label>
                                  <input name="password" align="right" type="password" id="password" maxlength="16" />
                                </td>
                              </tr>
                              <tr>
                              <td align="left"> <a href="register/register.php" class="register"/>Click to register</a></td>
                                <td colspan="1" align="center"><input name="submit" class="submitindex" type="submit" value="Log-in" /></td>
                              </tr>
                            </table>
    	                        </form>
    	                         
		</td>
    </tr>
</table>
</body>
</html>