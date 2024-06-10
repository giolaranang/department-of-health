<?php
include('check.php');
$owner = $_SESSION['username'];
while($row=mysql_fetch_array($rsql)){	
		$lname =  $row['LN'];
		$fname =  $row['FN'];
		$mname =  $row['MN'];
			$complete =  $lname.', '.$fname.' '.$mname;
			$name = ucwords($complete);
			
		$type = $row['type'];
		$div = $row['BRANCH'];
	}
	
?>
<script language="javascript">
	function info(TR_ID){
		self.location='trainings/view.php?TR_ID='+TR_ID;
	}
function open_win(TR_ID)
{
		self.location='addPax/view_participants.php?TR_ID='+TR_ID;
}
	function add_pax(TR_ID)
	{
		self.location='addPax/add_participants.php?TR_ID='+TR_ID;
	}
	function edit_training(TR_ID)
	{
		self.location='trainings/Edit_training.php?TR_ID='+TR_ID;
	}function delete_pax(TR_ID)
	{
		self.location='addPax/delete_participants.php?TR_ID='+TR_ID;
	}function delete_training(TR_ID){
		self.location='trainings/Delete_training.php?TR_ID='+TR_ID;
	}

</script>
<html class="notifications">
<head>
<link rel="stylesheet"  type="text/css" href="css/style.css"/>
</head>
<?php 
if($type == 'coordinator'){
?>
<div id="tableness">
<form action='submit_approved_training.php' method='post'>

<table width="890" align='center' border='0'>
<tr bgcolor="#DFEEE9">
<td width="20" align="center" id="new_notif"></td>
<td width="20" align="center">Status</td>
<td width="280" align="center"><b>Title</td>
<td width="130" align="center"><b>Date Coverage</td>
<td width="100" align="center"><b>Venue</td>
<td width="50" align="center"><b>Pax</td>
<td width="100" align="center"><b>Final Remarks</td>
<td width="20" align="center"><b>More</td>
<?php
echo '<td width="30" align="center"><b>Add Pax</td>';
echo '<td width="30" align="center"><b>Delete Pax</td>';
echo '<td width="30" align="center"><b>Edit Training</td>';
echo '<td width="30" align="center"><b>Delete Training</td>';
$sql = " SELECT * FROM training_gi where AUTHOR='$owner' ORDER by TR_ID desc";
$rsql = mysql_query($sql);

	while($row=mysql_fetch_array($rsql)){
	$tid2 = $row['TR_ID'];
	$title = $row['TITLE'];
	$m1 = $row['FR_MONTH'];
	$d1 = $row['FR_DAY'];
	$m2 = $row['TO_MONTH'];
	$d2 = $row['TO_DAY'];
	$y2 = $row['TO_YEAR'];
	$finalrem=$row['final_remarks'];
	$lock=$row['LOCKED'];
		
	
	$venue = $row['VENUE'];
	$speaker ="fix speaker";
		$final_remarks =$finalrem;
			
			$stat = "fix app";
			$notify ="fix notify";
			$rfc_fr = "fix rfc";
			$locked = $row['LOCKED'];
			
			$division_code = $row['TR_DIV'];	
			if($division_code == 'MSD'){
			$color_code="#FFE375";
			}
			if($division_code == 'RD/ARD'){
			$color_code="#FFC2A6";
			}
			if($division_code == 'LHSD'){
			$color_code="#A4E9FF";
			}
			if($division_code == 'LRED'){
			$color_code="#E0FF84";
			}
					
			if($locked=='1' && $notify == '1'){
				$color = 'FFFFFF';
				$new = '<td id="new_notif"><font color="red">OK</font></td>';
			}else{		
				if($type == 'coordinator' && $rfc_fr =='1'){
				$color = 'FFFFFF';
				$new = '<td id="new_notif"><font color="red">REV</font></td>';
				}else{
					$color = 'white';
					$new = '<td id="new_notif"></td>';
					}
			}
				if($lock=="0"){
				$status="Approved";
				}else if ($lock=="2"){
				$status="Disapproved for further changes";
			}else if ($lock=="3"){
				$status="Waiting for changes";
			}else{
				$status="submitted for approval";
			}

				$sql_sum = "SELECT COUNT(empid) FROM training_pax where TR_ID = '$tid2'";
				$result_sum = mysql_query($sql_sum);

				while($row = mysql_fetch_array($result_sum)){
					$sum = $row['COUNT(empid)'];
				}
				
					if($sum == ''){
					$total = '0';
					}else{
					$total = $sum;
					}
					
$sql_month = " SELECT * FROM calendar where MONTH_ID='$m1'";
$rsql_month = mysql_query($sql_month);
	while($row=mysql_fetch_array($rsql_month)){
		$month1=$row['MONTH_SHORT'];
	}
$sql_month2 = " SELECT * FROM calendar where MONTH_ID='$m2'";
$rsql_month2 = mysql_query($sql_month2);
	while($row=mysql_fetch_array($rsql_month2)){
		$month2=$row['MONTH_SHORT'];
	}

		$from = $month1.' '.$d1;
		$to = $month2.' '.$d2.', '.$y2;
		
		$coverage = $from.' - '.$to;

			$pax_list = '<form name="viewPax" action="addPax/view_participants.php" Method="get"><input class="submitindex" type="button" onclick="open_win('."'".$tid2."'".')" name="'.$tid2.'" value ="'.$total.'"></form>';
			echo '<tr style="background-color:'.$color.';" valign=top>';

			$delete_pax = '<form name="DeletePax" action="addPax/delete_participants.php" Method="get"><input type="button" onclick="open_win('."'".$tid2."'".')" name="'.$tid2.'" value ="'.$total.'"></form>';
			echo '<tr style="background-color:'.$color.';" valign=top>';
			
			echo $new;
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$status.'</td>';
			echo '<td style="background-color:'.$color_code.';"><font ';

			echo 'color=black style="height:20px;" >'.$title.'</i></font></td>';
	
			echo '<td style="background-color:'.$color_code.';">'.$coverage.'</td>';
			echo '<td style="background-color:'.$color_code.';">'.$venue.'</td>';
			echo '<td style="background-color:'.$color_code.';">'.$pax_list.'</td>';
			echo '<td style="background-color:'.$color_code.';">'.$final_remarks.'</td>';
			echo '<form name="viewall" action="view.php" Method="get">';
			echo '<td align="center" style="width:20px; "><input class="submitindex" onclick="info('."'".$tid2."'".')" name="'.$tid2.'" style="background:url(images/view.png); width:31; height:31" type="button"></form></td>';
			
				if($type == 'coordinator'){
				echo '<form name="add_Pax" action="addPax.php" Method="get">';
				echo '<td align="center" style="width:20px; height:20px;"><input class="submitindex" onclick="add_pax('."'".$tid2."'".')" name="'.$tid2.'" style="background:url(images/addPax2.png); width:30; height:30" type="button"></form></td>';

				echo '<form name="Delete_Pax" action="DeletePax.php" Method="get">';
				echo '<td align="center" style="width:20px; height:20px;"><input class="submitindex" onclick="delete_pax('."'".$tid2."'".')" name="'.$tid2.'" style="background:url(images/deletepax1.png); width:30; height:30" type="button"></form></td>';

				echo '<form name="Edit_Training" action="Edit_training.php" Method="get">';
				echo '<td align="center" style="width:20px; height:20px;"><input class="submitindex" onclick="edit_training('."'".$tid2."'".')" name="'.$tid2.'" style="background:url(images/settings2.png); width:50; height:36" type="button"></form></td>';

				echo '<form name="Delete_Training" action="Delete_training.php" Method="get">';
				echo '<td align="center" style="width:20px; height:20px;"><input class="submitindex" onclick="return confirm(\'Do you want to Delete this training?\'); delete_training('."'".$tid2."'".'); "name="'.$tid2.'" style="background:url(images/delete.jpg); width:50; height:36" type="button"></form></td>';

				}

	}
}

if($type == 'hra'){
?>
	<div id="tableness">
<form action='submit_approved_training.php' method='post'>

<table width="890" align='center' border='0'>
<tr bgcolor="#DFEEE9">
<td width="20" align="center" id="new_notif"></td>
<td width="20" align="center">Status</td>
<td width="280" align="center"><b>Title</td>
<td width="130" align="center"><b>Date Coverage</td>
<td width="100" align="center"><b>Venue</td>
<td width="50" align="center"><b>Pax</td>
<td width="100" align="center"><b>Final Remarks</td>
<td width="20" align="center"><b>Review</td>
<?php
$sql = " SELECT * FROM training_gi where LOCKED='1' or LOCKED='3' or LOCKED='2' ORDER by TR_ID desc";
$rsql = mysql_query($sql);

	while($row=mysql_fetch_array($rsql)){
	$tid2 = $row['TR_ID'];
	$title = $row['TITLE'];
	$m1 = $row['FR_MONTH'];
	$d1 = $row['FR_DAY'];
	$m2 = $row['TO_MONTH'];
	$d2 = $row['TO_DAY'];
	$y2 = $row['TO_YEAR'];
	$finalrem=$row['final_remarks'];
		
	
	$venue = $row['VENUE'];
	$lock=$row['LOCKED'];
	$speaker ="fix speaker";
		$final_remarks =$finalrem;
			
			$stat = "fix app";
			$notify ="fix notify";
			$rfc_fr = "fix rfc";
			$locked = $row['LOCKED'];
			
			$division_code = $row['TR_DIV'];	
			if($division_code == 'MSD'){
			$color_code="#FFE375";
			}
			if($division_code == 'RD/ARD'){
			$color_code="#FFC2A6";
			}
			if($division_code == 'LHSD'){
			$color_code="#A4E9FF";
			}
			if($division_code == 'LRED'){
			$color_code="#E0FF84";
			}
					
			if($locked=='1' && $notify == '1'){
				$color = 'FFFFFF';
				$new = '<td id="new_notif"><font color="red">OK</font></td>';
			}else{		
				if($type == 'coordinator' && $rfc_fr =='1'){
				$color = 'FFFFFF';
				$new = '<td id="new_notif"><font color="red">REV</font></td>';
				}else{
					$color = 'white';
					$new = '<td id="new_notif"></td>';
					}
			}
				if($lock=="0"){
				$status="Approved";
				}else if ($lock=="2"){
				$status="Disapproved for further changes";
			}else if ($lock=="3"){
				$status="Waiting for changes";
			}else{
				$status="submitted for approval";
			}

				$sql_sum = "SELECT COUNT(empid) FROM training_pax where TR_ID = '$tid2'";
				$result_sum = mysql_query($sql_sum);

				while($row = mysql_fetch_array($result_sum)){
					$sum = $row['COUNT(empid)'];
				}
				
					if($sum == ''){
					$total = '0';
					}else{
					$total = $sum;
					}
					
$sql_month = " SELECT * FROM calendar where MONTH_ID='$m1'";
$rsql_month = mysql_query($sql_month);
	while($row=mysql_fetch_array($rsql_month)){
		$month1=$row['MONTH_SHORT'];
	}
$sql_month2 = " SELECT * FROM calendar where MONTH_ID='$m2'";
$rsql_month2 = mysql_query($sql_month2);
	while($row=mysql_fetch_array($rsql_month2)){
		$month2=$row['MONTH_SHORT'];
	}

		$from = $month1.' '.$d1;
		$to = $month2.' '.$d2.', '.$y2;
		
		$coverage = $from.' - '.$to;

	$pax_list = '<form name="viewPax" action="addPax/view_participants.php" Method="get"><input class="submitindex" type="button" onclick="open_win('."'".$tid2."'".')" name="'.$tid2.'" value ="'.$total.'"></form>';
			echo '<tr style="background-color:'.$color.';" valign=top>';
			
			echo $new;
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$status.'</td>';
			echo '<td style="background-color:'.$color_code.';"><font ';

			echo 'color=black style="height:20px;" >'.$title.'</i></font></td>';
	
			echo '<td style="background-color:'.$color_code.';">'.$coverage.'</td>';
			echo '<td style="background-color:'.$color_code.';">'.$venue.'</td>';
			echo '<td style="background-color:'.$color_code.';">'.$pax_list.'</td>';
			echo '<td style="background-color:'.$color_code.';">'.$final_remarks.'</td>';
			echo '<form name="viewall" action="view.php" Method="get">';
			echo '<td align="center" style="width:20px; "><input class="submitindex" onclick="info('."'".$tid2."'".')" name="'.$tid2.'" style="background:url(images/view.png); width:31; height:31" type="button"></form></td>';
			


	}
}

?>

</table>
</div>
</html>