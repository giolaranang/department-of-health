<?php
include('../check.php');
$id=$_POST['train'];
$title_remark=$_POST['title_remarks'];
$venue_remark=$_POST['venue_remarks'];
$date_remark=$_POST['date_remarks'];
$final_remark=$_POST['final_remarks'];
$budget_remark=$_POST['budget_remarks'];
$fund_remark=$_POST['funds_remarks'];
$speaker_remark=$_POST['speaker_remarks'];
$sked_remark=$_POST['sked_remarks'];

	$cheek="SELECT * from remarks where TR_ID='$id'";
	$rcheek=mysql_query($cheek);
if(!empty($_POST['radio'])){
if($_POST['radio']=="approve"){

if(mysql_num_rows($rcheek)==0){	
			$approve="INSERT INTO remarks(TR_ID,title_remark,venue_remark,date_remark,budget_remark,fundsource_remark,speaker_remark,sched_remark)VALUES('$id','$title_remark','$venue_remark','$date_remark',$budget_remark,$fund_remark,$speaker_remark,$sked_remark)";
		}else if (mysql_num_rows($rcheek)>=1){
			$approve = "UPDATE remarks SET title_remark='$title_remark' , venue_remark='$venue_remark' ,date_remark=
 			'$date_remark',budget_remark='$budget_remark',fundsource_remark='$fund_remark',speaker_remark='$speaker_remark',sched_remark='$sked_remark' where TR_ID = '$id'";	
		}
		mysql_query($approve);

	$approve2 = "UPDATE training_gi SET final_remarks='$final_remark', LOCKED='0' where TR_ID = '$id'";	
	mysql_query($approve2);

		echo "<script>alert('Training Approved!');";
		echo "window.top.location.href='../index.php';";
		echo "</script>";	

}else if ($_POST['radio']=="disapprove"){
if(mysql_num_rows($rcheek)==0){	
	$disapprove="INSERT INTO remarks(TR_ID,title_remark,venue_remark,date_remark,budget_remark,fundsource_remark,speaker_remark,sched_remark)VALUES('$id','$title_remark','$venue_remark','$date_remark',$budget_remark,$fund_remark,$speaker_remark,$sked_remark)";
	}else if (mysql_num_rows($rcheek)>=1){
		$disapprove = "UPDATE remarks SET title_remark='$title_remark' , venue_remark='$venue_remark' ,date_remark=
 			'$date_remark',budget_remark='$budget_remark',fundsource_remark='$fund_remark',speaker_remark='$speaker_remark',sched_remark='$sked_remark' where TR_ID = '$id'";		
	}
		mysql_query($disapprove);

		$disapprove2 = "UPDATE training_gi SET final_remarks='$final_remark', LOCKED='2' where TR_ID = '$id'";	
	mysql_query($disapprove2);

		echo "<script>alert('Training Disapproved and Waiting for Deletion or further changes!');";
		echo "window.top.location.href='../index.php';";
		echo "</script>";	
}else if ($_POST['radio']=="Changes"){
	if(mysql_num_rows($rcheek)==0){
	$change="INSERT INTO remarks(TR_ID,title_remark,venue_remark,date_remark,budget_remark,fundsource_remark,speaker_remark,sched_remark)VALUES('$id','$title_remark','$venue_remark','$date_remark',$budget_remark,$fund_remark,$speaker_remark,$sked_remark)";
}else if (mysql_num_rows($rcheek)>=1){
	$change = "UPDATE remarks SET title_remark='$title_remark' , venue_remark='$venue_remark' ,date_remark=
 			'$date_remark',budget_remark='$budget_remark',fundsource_remark='$fund_remark',speaker_remark='$speaker_remark',sched_remark='$sked_remark' where TR_ID = '$id'";		
	}
		mysql_query($change);

		$change2 = "UPDATE training_gi SET final_remarks='$final_remark', LOCKED='3' where TR_ID = '$id'";	
	mysql_query($change2);

		echo "<script>alert('Coordinator Notified for Further Changes!');";
		echo "window.top.location.href='../index.php';";
		echo "</script>";
}
}else{
		echo "<script>alert('You have not chosen an action, going back to home..');";
		echo "window.top.location.href='../index.php';";
		echo "</script>";
}

?>