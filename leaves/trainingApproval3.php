<!DOCTYPE html PUBLIC>
<html class="admin">
<head>
<link rel="SHORTCUT ICON" type="image/x-icon" href="images/url.bmp" />
<link rel="stylesheet"  type="text/css" href="css/style.css"/>
</head>
<?php 


$sql2_details = " SELECT * FROM training_gi where TR_ID='$T_ID'";
$rsql2_det = mysql_query($sql2_details);

while($row=mysql_fetch_array($rsql2_det)){
$title = $row['TITLE'];
$venue = $row['VENUE'];
$m1 = $row['FR_MONTH'];
$day1 = $row['FR_DAY'];
$m2 = $row['TO_MONTH'];
$day2 = $row['TO_DAY'];
$year2 = $row['TO_YEAR'];
$final_remark = $row['final_remarks'];
$f_source=$row['F_SOURCE'];
$p_budget=$row['P_BUDGET'];
$schedule=$row['SCHEDULE'];
$speaker=$row['R_SPEAKER'];
$file=['ATTACHMENT'];
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

$sql2 = " SELECT * FROM remarks where TR_ID='$T_ID'";
$rsql2 = mysql_query($sql2);
$title_rem = '';
$rat_rem = '';
$date_rem = '';
$ven_rem = '';
$budg_rem ='';
$funds_rem = '';
$speaker_rem = '';
$sked_rem = '';
while($row=mysql_fetch_array($rsql2)){

$title_rem = $row['title_remark'];
$ven_rem = $row['venue_remark'];
$date_rem = $row['date_remark'];
$budg_rem = $row['budget_remark'];
$funds_rem = $row ['fundsource_remark'];
$speaker_rem = $row ['speaker_remark'];
$sked_rem = $row ['sched_remark'];
}
//ito ung mga idadagdag pag me time.
//$rat_rem = $row['RATIONALE_REM'];
//$obj_rem = $row['OBJ_REM'];
//$cont_rem = $row['CONTENT_REM'];
//$meth_rem = $row['METH_REM'];
/*$pax_rem = $row['PAX_REM'];
$fcl_rem = $row['FCL_REM'];
$rs_rem = $row['RS_REM'];
$ss_rem = $row['SS_REM'];
$budget_rem = $row['BUDGET_REM'];
$meal_rem = $row['MEALS_REM'];
$supply_rem = $row['SUPPLY_REM'];
$tev_rem = $row['TEV_REM'];
$hon_rem = $row['HON_REM'];
$gas_rem = $row['GAS_REM'];
$fund_rem = $row['FSOURCE_REM'];
$eval_rem = $row['EVAL_REM'];
$crs_rem = $row['CRS_REM'];
$sched_rem = $row['SCHED_REM'];
}
*/
?>
<style>
body{
font-family:arial;
}
td{
text-align:center;
}
#Sbutton{
float:right;
margin-top:20px;
margin-bottom:20px;
margin-right:60px;
}
textarea{
	resize: none;
    background:#FFF;
    border:1px solid #000;
    color:#000;
	font-family:arial;
}

</style>
<script language="javascript">
	function info(TR_ID){
		self.location='approve.php?TR_ID='+TR_ID;	
	}	
</script>

<form action='test2.php' method='post'>
<table width="750" align='center' border='0' style="border:1px solid black;">
<tr bgcolor="#DFEEE9">
<td width="200" align="center"><b>Parts of Training Design</td>
<td width="240" align="center"><b>Description</td>
<td width="200" align="center"><b>Remarks</td>

<tr bgcolor="pink">
<td height="100"><b>Title Of HRD Activity</td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="title_act" id='title' style='height:100px; width:240px; border:none;'<?php echo $in_stat;?>><?php echo $title; ?></textarea></td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="title_remarks" id='title_remarks' style='height:100px; width:300px; border:none;'<?php echo $in_stat;?>><?php echo $title_rem;?></textarea></td>
</tr>

<tr bgcolor="pink">
<td><b>Venue</td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="venue_place" style='height:50px; width:240px; border:none;' <?php echo $in_stat;?>> <?php echo $venue; ?></textarea></td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="venue_remarks" id='venue_remarks' style='height:50px; width:300px; border:none;' <?php echo $in_stat;?>><?php echo $ven_rem;?></textarea></td>
</tr>

<tr bgcolor="pink">
<td><b>Date</td>
<td bgcolor="#FFFFFF" style="text-align:center;" >
<font size="2"><b>From :</b></font>
          <select name="from_month" <?php echo $in_stat;?> style="color:black;">
		   
		   <option value='<?php echo $month1; ?>'><?php echo $month1; ?></option>
		   <option value='JAN'>JAN</option>
		   <option value='FEB'>FEB</option>
		   <option value='MAR'>MAR</option>
		   <option value='APR'>APR</option>
		   <option value='MAY'>MAY</option>
		   <option value='JUN'>JUN</option>
		   <option value='JUL'>JUL</option>
		   <option value='AUG'>AUG</option>
		   <option value='SEP'>SEP</option>
		   <option value='OCT'>OCT</option>
		   <option value='NOV'>NOV</option>
		   <option value='DEC'>DEC</option>
		   </select>   
		   
		   <select name="from_day" <?php echo $in_stat;?> style="color:black;margin-right:66px;">
		   <option value='<?php echo $day1; ?>'><?php echo $day1; ?></option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
<br>
<font size="2"><b>&nbsp;&nbsp;&nbsp;To :</b></font>
          <select name="to_month" <?php echo $in_stat;?> style="color:black;">
		   
		   <option value='<?php echo $month2; ?>'><?php echo $month2; ?></option>
		   <option value='JAN'>JAN</option>
		   <option value='FEB'>FEB</option>
		   <option value='MAR'>MAR</option>
		   <option value='APR'>APR</option>
		   <option value='MAY'>MAY</option>
		   <option value='JUN'>JUN</option>
		   <option value='JUL'>JUL</option>
		   <option value='AUG'>AUG</option>
		   <option value='SEP'>SEP</option>
		   <option value='OCT'>OCT</option>
		   <option value='NOV'>NOV</option>
		   <option value='DEC'>DEC</option>
		   </select>   
		   
		   
		   <select name="to_day" <?php echo $in_stat;?> style="color:black;">
		   <option value='<?php echo $day2; ?>'><?php echo $day2; ?></option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
		  
		   <select name="to_year" <?php echo $in_stat;?> style="color:black;">
		   <option value='<?php echo $year2; ?>'><?php echo $year2; ?></option>
	<?php
	for($i = 2013; $i < 2031; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select>
		   
</td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="date_remarks" id='date_remarks' style='height:50px; width:315px; border:1px solid white;' <?php echo $in_stat;?>><?php echo $date_rem;?></textarea></td>
</tr>

<tr bgcolor="pink">
<td><b>Proposed Budget</td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="venue_place" style='height:50px; width:240px; border:none;' <?php echo $in_stat;?>> <?php echo $p_budget; ?></textarea></td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="budget_remarks" id='venue_remarks' style='height:50px; width:300px; border:none;' <?php echo $in_stat;?>><?php echo $budg_rem;?></textarea></td>
</tr>

<tr bgcolor="pink">
<td><b>Fund Source</td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="venue_place" style='height:50px; width:240px; border:none;' <?php echo $in_stat;?>> <?php echo $f_source; ?></textarea></td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="funds_remarks" id='funds_remarks' style='height:50px; width:300px; border:none;' <?php echo $in_stat;?>><?php echo $funds_rem;?></textarea></td>
</tr>


<tr bgcolor="pink">
<td><b>Main Speaker</td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="venue_place" style='height:50px; width:240px; border:none;' <?php echo $in_stat;?>> <?php echo $speaker; ?></textarea></td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="speaker_remarks" id='speaker_remarks' style='height:50px; width:300px; border:none;' <?php echo $in_stat;?>><?php echo $speaker_rem;?></textarea></td>
</tr>


<tr bgcolor="pink">
<td><b>Schedule</td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="venue_place" style='height:50px; width:240px; border:none;' <?php echo $in_stat;?>> <?php echo $schedule; ?></textarea></td>
<td bgcolor="#FFFFFF" style='border:1px solid orange;'><textarea name="sked_remarks" id='sked_remarks' style='height:50px; width:300px; border:none;' <?php echo $in_stat;?>><?php echo $sked_rem;?></textarea></td>
</tr>

<tr bgcolor="pink">
<td ><b>Final Remarks</td>
<td bgcolor="#FFFFFF" colspan="4"><textarea name="final_remarks" id='final_remarks' style='height:55px; width:560px; border:1px solid orange;'<?php echo $in_stat; echo $in_stat2;?>><?php echo $final_remark; ?></textarea></td>
</tr>
<?php 
echo '<tr bgcolor="pink">';
echo '<td ><b>Download File</td>';
echo '<td bgcolor="#FFFFFF">';
echo "<style='background-color:white;'><a style='width:60; height:24' href=\"../trainings/download.php?idss=".$T_ID."\"OnClick=\"return confirm('Do you want to download the attached file from this training?')\"><img src='../images/download.png'/ BORDER=0 HEIGHT=40 WIDTH=44></a></td>";
echo '</tr>';
?>

<tr bgcolor="pink">
<td ><b>Prepared By :</td>
<td bgcolor="#FFFFFF" colspan="4"><textarea name="owner" id='owner' style='height:30px; width:560px; border:1px solid orange;' disabled/><?php echo $name3; ?></textarea></td>
</tr>
</table>
<input type='hidden' value='<?php echo $T_ID; ?>' name='important'>
</form>
