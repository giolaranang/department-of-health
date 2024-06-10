<?php

include('../check.php');

while($row=mysql_fetch_array($rsql)){
		$lname =  $row['LN'];
		$fname =  $row['FN'];
		$mname =  $row['MN'];
			$complete =  $lname.', '.$fname.' '.$mname;
			$name = ucwords($complete);
			
		$type = $row['type'];
	}

$T_ID = $_GET['TR_ID'];

	$sql_tempo = " SELECT * FROM training_gi where TR_ID='$T_ID'";
	$rsql_tempo = mysql_query($sql_tempo);
		while($row=mysql_fetch_array($rsql_tempo)){
			$tempo = "fix tempo";
			}
			
	$update_pax = "UPDATE pax SET TR_ID='$T_ID' where TR_ID = '$tempo'";
	mysql_query($update_pax);
	
	$update_buttons = "UPDATE buttons SET TR_ID='$T_ID' where TR_ID = '$tempo'";
	mysql_query($update_buttons);
	
	$update_remarks = "UPDATE remarks SET TR_ID='$T_ID' where TR_ID = '$tempo'";
	mysql_query($update_remarks);
	
	$set = '0';
	$update_training = "UPDATE training_gi SET TEMPO_BADGE='$set' where TR_ID = '$T_ID'";
	mysql_query($update_training);

$sql2 = " SELECT * FROM training_gi where TR_ID='$T_ID'";
$rsql2 = mysql_query($sql2);

while($row=mysql_fetch_array($rsql2)){
	$title = $row['TITLE'];
	$venue = $row['VENUE'];
	$speaker = $row['R_SPEAKER'];
	$month1 = $row['FR_MONTH'];
	$day1 = $row['FR_DAY'];
	$month2 = $row['TO_MONTH'];
	$day2 = $row['TO_DAY'];
	$year2 = $row['TO_YEAR'];
	$content = "fix contents";
	$facilitator = $row['FACILITATOR'];
	$support = "fix sup staff";
	$budget = "fix prop budget";
	$meal = "fix meal snacks";
	$supp ="fix supplies";
	$tev = "fix tev";
	$hon = "fix honorarium";
	$gas = "fix gasoline";
	$fsource = "fix fund source";
	$eval = "fix evaluation";
	$crs_reqs = "fix reqs";
	
	$sched = $row['SCHEDULE'];
	$final_remark = "final_remarks";
	$tr_by = $row['AUTHOR'];
	
	$locked = $row['LOCKED'];
	$rfc_fr_app = "what is this";
	$rfc_to_app ="i dont know what this does";
	$for_app ="what IS THIS??";
	$att = $row['ATTACHMENT'];
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
	
if( $type == 'coordinator' && $_SESSION['username'] == $user){
$in_stat = 'disabled';
$in_stat2 = '';
include('trainingapproval3.php');
}
if($type == 'hra'){
$in_stat = 'enabled';
$out_stat='disabled';
$in_stat2 = '';
include('trainingapproval.php');
}
if($type == 'coordinator' && $_SESSION['username'] != $user){
$in_stat = 'disabled';
$in_stat2 = '';
include('trainingapproval3.php');
}
?>




