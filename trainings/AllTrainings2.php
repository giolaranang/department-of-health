<html class="alltrainings1">
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
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
$sql = " SELECT * FROM training_gi";
$rsql = mysql_query($sql);

	while($row=mysql_fetch_array($rsql))
	{
	$tid =  $row['TR_ID'];
	}
?>

<script language="javascript">
	function info(TR_ID){
		self.location='view.php?TR_ID='+TR_ID;
	}
function open_win(TR_ID)
{
self.location='../addPax/view_participants.php?TR_ID='+TR_ID;
}
</script>

<?php if($type=='hra'){?>
<script language="javascript">
	function info(TR_ID){
		self.location='view.php?TR_ID='+TR_ID;
	}
</script>
<?php }?>
<div id="color_code">
 <div id="Legend"><i>Color Code :&nbsp;</i></div>
 <div id="RD">RD/ARD</div>
 <div id="MSD">MSD</div>
 <div id="LHSD">LHSD</div>
 <div id="LRED">LRED</div>
</div>

<font style="font-size:12; font-weight:bold;">
<p align="left">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="adminframe" style="margin-left:60px;">
<select name="select" onchange="this.form.submit();" >
<option  value="">Display Options</option>
<option value="ALL">-ALL</option>
<option value="RD/ARD" style="background-color:#FFC2A6;">-RD/ARD</option>
<option value="MSD" style="background-color:#FFE375;">-MSD</option>
<option value="LHSD" style="background-color:#AFE9FF;">-LHSD</option>
<option value="LRED" style="background-color:#E0FF84;">-LRED</option>
</select>
</font>
</form>

<form action='submit_approved_training.php' method='post'>

<table width="870" align='center' border='0' style="margin-top:2px;">
<tr bgcolor="#DFEEE9">
<td width="20" align="center">Status</td>
<td width="250" align="center"><b>Title</td>
<td width="150" align="center"><b>Date Coverage</td>
<td width="130" align="center"><b>Venue</td>
<td width="50" align="center"><b>Pax</td>
<td width="100" align="center"><b>Final Remarks</td>
<td width="20" align="center"><b>Expand/Review</td>

<?php
$sql = " SELECT * FROM training_gi order by TR_DIV desc;";
$rsql = mysql_query($sql);

if (isset($_POST["select"])) {
    $sort_by = $_POST["select"];   
		
if($sort_by=="ALL"){
$sql = " SELECT * FROM training_gi order by TR_DIV desc;";
$rsql = mysql_query($sql);
}
if($sort_by=="RD/ARD"){
$sql = " SELECT * FROM training_gi where TR_DIV='RD/ARD'";
$rsql = mysql_query($sql);
}
if($sort_by=="MSD"){
$sql = " SELECT * FROM training_gi where TR_DIV='MSD'";
$rsql = mysql_query($sql);
}
if($sort_by=="LHSD"){
$sql = " SELECT * FROM training_gi where TR_DIV='LHSD'";
$rsql = mysql_query($sql);
}
if($sort_by=="LRED"){
$sql = " SELECT * FROM training_gi where TR_DIV='LRED'";
$rsql = mysql_query($sql);
}

	while($row=mysql_fetch_array($rsql)){
	$tid2 = $row['TR_ID'];
	$title = $row['TITLE'];
	$m1 = $row['FR_MONTH'];
	$d1 = $row['FR_DAY'];
	$m2 = $row['TO_MONTH'];
	$d2 = $row['TO_DAY'];
	$y2 = $row['TO_YEAR'];
	$venue = $row['VENUE'];
	$lock=$row['LOCKED'];

	$speaker = $row['R_SPEAKER'];
		$final_remarks = $row['final_remarks'];
			
			$stat ="fix stat";
			$notify = "fix notif coord";
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
				
				if($type == 'hra' && $stat == '1'){
				$color = 'EBF8A4';
				$new = '<td id="new_notif"><font color="red">NEW</font></td>';
				}else{
				$color = 'white';
				}
					if($stat == '0' ){
					$color = 'white';
					$new = '<td id="new_notif"></td>';
					}
		
				if($type == 'coordinator' && $notify == '1'){
				$color = 'FFFFFF';
				$new = '<td id="new_notif"><font color="red"></font></td>';
				}
					if($notify == '0' ){
					$color = 'white';
					$new = '<td id="new_notif"></td>';
					}
		
		
			$sql_sum = "SELECT COUNT(empid) FROM training_pax where TR_ID = '$tid2'";
				$result_sum = mysql_query($sql_sum);

				while($row = mysql_fetch_array($result_sum)){
					$sum = $row['COUNT(empid)'];
				}
				
					if($sum == 0){
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

$pax_list = '<form name="viewPax" action="ListOfPax.php" Method="get"><input class="submitindex" type="button" onclick="open_win('."'".$tid2."'".')" name="'.$tid2.'" value ="'.$total.'"></form>';
	
			echo '<tr style="background-color:'.$color.';" valign=top>';
		if($lock=="0"){
				$status="Approved";
				}else if ($lock=="2"){
				$status="Disapproved for further changes";
			}else if ($lock=="3"){
				$status="Waiting for changes";
			}else{
				$status="submitted for approval";
			}
			//echo $new;
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$status.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow"><font ';

			echo 'color=black style=""><i>'.$title.'</i></font></td>';
	
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$coverage.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$venue.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$pax_list.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$final_remarks.'</td>';
			
			echo '<form name="viewall" action="view.php" Method="get">';
			
			echo '<td align="center" id="shadow"><input class="submitindex" onclick="info('."'".$tid2."'".')" name="'.$tid2.'" style="background:url(../images/view.png); width:31; height:31" type="button"></form></td>';

}
	
	
}else{  
?>

<?php 
if($type == 'coordinator'){
}
?>

<?php

$sql = " SELECT * FROM training_gi ORDER by TR_DIV desc";
$rsql = mysql_query($sql);

	while($row=mysql_fetch_array($rsql)){
	$tid2 = $row['TR_ID'];
	$title = $row['TITLE'];
	$m1 = $row['FR_MONTH'];
	$d1 = $row['FR_DAY'];
	$m2 = $row['TO_MONTH'];
	$d2 = $row['TO_DAY'];
	$y2 = $row['TO_YEAR'];
	$venue = $row['VENUE'];
	$lock=$row['LOCKED'];

	$speaker = $row['R_SPEAKER'];
		$final_remarks = $row['final_remarks'];
			
			$stat ="fix stat";
			$notify = "fix notif coord";
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
				
				if($type == 'hra' && $stat == '1'){
				$color = 'EBF8A4';
				$new = '<td id="new_notif"><font color="red">NEW</font></td>';
				}else{
				$color = 'white';
				}
					if($stat == '0' ){
					$color = 'white';
					$new = '<td id="new_notif"></td>';
					}
		
				if($type == 'coordinator' && $notify == '1'){
				$color = 'FFFFFF';
				$new = '<td id="new_notif"><font color="red"></font></td>';
				}
					if($notify == '0' ){
					$color = 'white';
					$new = '<td id="new_notif"></td>';
					}
		


			$sql_sum = "SELECT COUNT(empid) FROM training_pax where TR_ID = '$tid2'";
				$result_sum = mysql_query($sql_sum);

				while($row = mysql_fetch_array($result_sum)){
					$sum = $row['COUNT(empid)'];
				}
				
					if($sum == 0){
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

	$pax_list = '<form name="viewPax" action="ListOfPax.php" Method="get"><input class="submitindex" type="button" onclick="open_win('."'".$tid2."'".')" name="'.$tid2.'" value ="'.$total.'"></form>';
	
			echo '<tr style="background-color:'.$color.';" valign=top>';
			if($lock=="0"){
				$status="Approved";
				}else if ($lock=="2"){
				$status="Disapproved for further changes";
			}else if ($lock=="3"){
				$status="Waiting for changes";
			}else{
				$status="submitted for approval";
			}
			//echo $new;
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$status.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow"><font ';

			echo 'color=black style=""><i>'.$title.'</i></font></td>';
	
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$coverage.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$venue.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$pax_list.'</td>';
			echo '<td style="background-color:'.$color_code.';" id="shadow">'.$final_remarks.'</td>';
			
			echo '<form name="viewall" action="view.php" Method="get">';
			
			echo '<td align="center" id="shadow"><input class="submitindex" onclick="info('."'".$tid2."'".')" name="'.$tid2.'" style="background:url(../images/view.png); width:31; height:31" type="button" id="aa"></form></td>';

}
?>

</table>
<?php
}
?>
</html>