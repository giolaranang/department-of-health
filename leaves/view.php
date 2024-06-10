<?php
include('check.php');
$T_ID = $_GET['TR_ID'];
$s = "SELECT * FROM training_gi where TR_ID='$T_ID'";
$rsql122 = mysql_query($s);
while($rowt=mysql_fetch_array($rsql122)){
	$tr_by=$rowt['AUTHOR'];
	}
	
$sql2 = " SELECT * FROM users where username = '$tr_by'";
$rsql2 = mysql_query($sql2);

while($row=mysql_fetch_array($rsql2)){
	
		$user = $row['username'];
		$lname =  $row['LN'];
		$fname =  $row['FN'];
		$mname =  $row['MN'];
			$complete =  $lname.', '.$fname.' '.$mname;
			$name3 = ucwords($complete);
	}
	
	if($tr_by == ''){
	$name3 = '';
	$user = '';
	}else{
	$name3 = ucwords($complete);
	}
	
$in_stat = 'disabled';
$in_stat2 = '';
include('trainingapproval3.php');
?>




