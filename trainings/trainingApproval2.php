<?php 
$con=mysql_connect("localhost","root","");
mysql_select_db("DOH_trainings",$con);
date_default_timezone_set('Hongkong');
$_SESSION['today'] = date('Y-m-j');

$conv2 = $_SESSION["password"];
$salt = "aB1cD2eF3G";
$password = md5($salt.$conv2);

$sql="select * from users where username='".$_SESSION["username"]."' and password='".$password."'";
$rsql=mysql_query($sql);

if (mysql_num_rows($rsql)<1){
	echo "<script language='javascript'>window.top.location.href='index.php';</script>";
}
if($type == 'coordinator'){
$notify = '0';
		$update="UPDATE training_gi SET NOTIFY_COORD='$notify' where TR_ID = '$T_ID'";
		mysql_query($update);
}
if($type == 'hra'){
$read = '0';
		$update="UPDATE training_gi SET READ_APP='$read' where TR_ID = '$T_ID'";
		mysql_query($update);
}

				$sql_sum = "SELECT SUM(PAX_SUM) FROM pax where TR_ID = '$T_ID'"; 
				$result_sum = mysql_query($sql_sum);

				while($row = mysql_fetch_array($result_sum)){
					$sum2 = $row["SUM(PAX_SUM)"];
				}
				
				if($sum2 == ''){
				$sum='0';
				}else{
				$sum = $sum2;
				}
?>
<?php
$sql2 = " SELECT * FROM buttons where TR_ID='$T_ID'";
$rsql2 = mysql_query($sql2);

while($row=mysql_fetch_array($rsql2)){
$tb = $row['TITLE_YN'];
$rb = $row['RATIONALE_YN'];
$ob = $row['OBJ_YN'];
$cb = $row['CONTENT_YN'];
$mb = $row['METH_YN'];
$vb = $row['VENUE_YN'];
$db = $row['DATE_YN'];
$pb = $row['PAX_YN'];
$fb = $row['FCL_YN'];
$rsb = $row['RS_YN'];
$ssb = $row['SS_YN'];
$bb = $row['BUDGET_YN'];
$msb = $row['MEALS_YN'];
$su_b = $row['SUPPLY_YN'];
$tvb = $row['TEV_YN'];
$hnb = $row['HON_YN'];
$gasb = $row['GAS_YN'];
$fsrcb = $row['FSOURCE_YN'];
$evlb = $row['EVAL_YN'];
$crsb = $row['CRS_YN'];
$schedb = $row['SCHED_YN'];
}
$sql3 = " SELECT * FROM remarks where TR_ID='$T_ID'";
$rsql3 = mysql_query($sql3);

$title_rem = $rsql3['TITLE_REM'];
$rat_rem = "";
$obj_rem = "";
$cont_rem = "";
$meth_rem = "";
$ven_rem = $rsql3['VENUE_REM'];
$date_rem = $rsql3['DATE_REM'];
$pax_rem = $rsql3['PAX_REM'];
$fcl_rem = $rsql3['FCL_REM'];
$sched_rem = $rsql3['SCHED_REM'];
$crs_rem = $rsql3['CRS_REM'];
$fcl_rem = $rsql3['FCL_REM'];
$rs_rem = $rsql3['RS_REM'];
$ss_rem = $rsql3['SS_REM'];
$budget_rem = $rsql3['BUDGET_REM'];
$meal_rem = $rsql3['MEALS_REM'];
$supply_rem = $rsql3['SUPPLY_REM'];
$tev_rem = $rsql3['TEV_REM'];
$hon_rem = $rsql3['HON_REM'];
$gas_rem = $rsql3['GAS_REM'];
$fund_rem = $rsql3['FSOURCE_REM'];
$eval_rem = $rsql3['EVAL_REM'];


while($row=mysql_fetch_array($rsql3)){
$title_rem = $row['TITLE_REM'];
$rat_rem = $row['RATIONALE_REM'];
$obj_rem = $row['OBJ_REM'];
$cont_rem = $row['CONTENT_REM'];
$meth_rem = $row['METH_REM'];
$ven_rem = $row['VENUE_REM'];
$date_rem = $row['DATE_REM'];
$pax_rem = $row['PAX_REM'];
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
$color = "A6E1A6";
?>
<style>
body{
font-family:arial;
}
td{
text-align:center;
border:1px solid #A4E9FF;
}
#Sbutton{
float:right;
margin-top:20px;
margin-bottom:20px;
margin-right:85px;
background-color:#B6E7E7;
}
#lock{
float:right;
margin-top:20px;
margin-bottom:20px;
margin-right:50px;
color:red;
font-weight:bold;
}

textarea{
resize: none;
font-family:arial;
color:#000;
}
table{
border:1px solid black;
}
textarea:disabled{
background-color:#FFF;
border:1px dashed #CCC;
}
input[disabled]{
  /* Your CSS Styles */
  background-color:#FFF !important; 
  color:#000 !important;
}

#pindot{
    padding:3px;
    margin-left:20px;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 2px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 2px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 2px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#000;
    border:1px solid #888;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
	width:50px;
}
#attachment{
margin-left:80px;
color:red;
height:25px;
width:350px;
background-color:pink;
padding:6px;
}
#attachment2{
margin-left:85px;
color:red;
height:25px;
width:800px;
background-color:#FFF;
padding:6px;
}
</style>
<script language="javascript">
	function info(TR_ID){
		self.location='approve.php?TR_ID='+TR_ID;	
	}	
</script>

<form action="print.php" method="POST" target="_new" style="margin-left:60px;">
<input type='hidden' value='<?php echo $T_ID; ?>' name='important'>
<input type='hidden' value='<?php echo $name3; ?>' name='important2'>
<input type="submit" value = "Print" id="pindot">
</form>

<form action='for_approval.php' method='post'>

<table width="750" align='center' border='0'>
<tr bgcolor="pink">
<td width="200" align="center"><b>Parts of Training Design</td>
<td width="230" align="center"><b>Description</td>
<td width="50" align="center"><b>Yes</td>
<td width="50" align="center"><b>No</td>
<td width="200" align="center"><b>Remarks</td>

<tr bgcolor="#DFEEE9">
<td height="100"><b>Title Of HRD Activity</td>
<td bgcolor="#FFFFFF"><textarea name="title_act" id='title' style='height:100px; width:240px;'<?php echo $in_stat3;?>><?php echo $title; ?></textarea></td>
<?php if($tb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="tbutton" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="tbutton" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="tbutton" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="tbutton" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="title_remarks" id='title_remarks' style='height:100px; width:200px;'<?php echo $in_stat2;?>><?php echo $title_rem;?></textarea></td>
</tr>

<?php if( $type == 'coordinator'){

echo '
<tr bgcolor="#DFEEE9">
<td><b>Rationale</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched File
</td>';
if($rb=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="rat" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="rat" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="rat" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="rat" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo'
<td bgcolor="#FFFFFF"><textarea name="rationale_remarks" id="rationale_remarks" style="height:40px; width:200px;"'.$in_stat2.'>'.$rat_rem.'</textarea></td>
</tr>';

echo '
<tr bgcolor="#DFEEE9">
<td><b>Objectives</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched File
</td>';
if($ob=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="obj" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="obj" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="obj" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="obj" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo '<td bgcolor="#FFFFFF"><textarea name="obj_remarks" id="obj_remarks" style="height:40px; width:200px;" '.$in_stat2.'>'.$obj_rem.'</textarea></td>
</tr>';

echo'
<tr bgcolor="#DFEEE9">
<td><b>Contents</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched File
</td>';
if($cb=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="contents" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="contents" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="contents" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="contents" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo '
<td bgcolor="#FFFFFF"><textarea name="cont_remarks" id="cont_remarks" style="height:40px; width:200px;"'.$in_stat2.'>'.$cont_rem.'</textarea></td>
</tr>';

echo'
<tr bgcolor="#DFEEE9">
<td><b>Methodology</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched Files
</td>';

if($mb=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="meth" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="meth" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="meth" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="meth" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo '
<td bgcolor="#FFFFFF"><textarea name="meth_remarks" id="meth_remarks" style="height:40px; width:200px;" '.$in_stat2.'>'.$meth_rem.'</textarea></td>
</tr>
';
}
?>

<?php if( $type == 'hra'){
echo '
<tr bgcolor="#DFEEE9">
<td><b>Rationale</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched File
</td>';
if($rb=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="rat" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="rat" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="rat" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="rat" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}

$rat_rem = isset($_REQUEST['RATIONALE_REM']) ? $_REQUEST['RATIONALE_REM'] : null;
echo'
<td bgcolor="#FFFFFF"><textarea name="rationale_remarks" id="rationale_remarks" style="height:40px; width:200px;"'.$in_stat2.'>'.$rat_rem.'</textarea></td>
</tr>';

echo '
<tr bgcolor="#DFEEE9">
<td><b>Objectives</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched File
</td>';
if($ob=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="obj" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="obj" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="obj" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="obj" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo '<td bgcolor="#FFFFFF"><textarea name="obj_remarks" id="obj_remarks" style="height:40px; width:200px;" '.$in_stat2.'>'.$obj_rem.'</textarea></td>
</tr>';

echo'
<tr bgcolor="#DFEEE9">
<td><b>Contents</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched File
</td>';
if($cb=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="contents" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="contents" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="contents" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="contents" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo '
<td bgcolor="#FFFFFF"><textarea name="cont_remarks" id="cont_remarks" style="height:40px; width:200px;"'.$in_stat2.'>'.$cont_rem.'</textarea></td>
</tr>';

echo'
<tr bgcolor="#DFEEE9">
<td><b>Methodology</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched Files
</td>';

if($mb=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="meth" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="meth" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="meth" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="meth" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo '
<td bgcolor="#FFFFFF"><textarea name="meth_remarks" id="meth_remarks" style="height:40px; width:200px;" '.$in_stat2.'>'.$meth_rem.'</textarea></td>
</tr>
';
}
?>

<tr bgcolor="#DFEEE9">
<td><b>Venue</td>
<td bgcolor="#FFFFFF"><textarea name="venue_place" style='height:50px; width:240px;' <?php echo $in_stat3;?>><?php echo $venue; ?></textarea></td>
<?php if($vb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="venue" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="venue" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="venue" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="venue" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="venue_remarks" id='venue_remarks' style='height:50px; width:200px;' <?php echo $in_stat2;?>><?php echo $ven_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Date</td>
<td bgcolor="#FFFFFF" style="text-align:center;">
<font size="2"><b>From :</b></font>
          <select name="from_month" style="color:black;" disabled/>
		   
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
		   
		   <select name="from_day" style="color:black; margin-right:65px;" disabled/>
		   <option value='<?php echo $day1; ?>'><?php echo $day1; ?></option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
<br>
<font size="2"><b>&nbsp;&nbsp;&nbsp;To :</b></font>
          <select name="to_month" style="color:black;" disabled/>
		   
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
		   
		   
		   <select name="to_day" style="color:black;" disabled/>
		   <option value='<?php echo $day2; ?>'><?php echo $day2; ?></option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
		  
		   <select name="to_year" style="color:black;" disabled/>
		   <option value='<?php echo $year2; ?>'><?php echo $year2; ?></option>
	<?php
	for($i = 2013; $i < 2031; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select>
		   
</td>
<?php if($db=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="date" type="radio" id="status" value="yes" <?php echo $in_stat3; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="date" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="date" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="date" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="date_remarks" id='date_remarks' style='height:50px; width:200px;' <?php echo $in_stat2;?>><?php echo $date_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Category of Participants</td>
<td bgcolor="#FFFFFF">
Total Participants : <input type="text" name="TotalPax" style="width:50px;" maxlength="4"<?php echo $in_stat3;?> value="<?php echo $sum; ?>" disabled/><br/>		
</td>
<?php if($pb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="part" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="part" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="part" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="part" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="part_remarks" id='part_remarks' style='height:60px; width:200px;'<?php echo $in_stat2;?>><?php echo $pax_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Facilitators</td>
<td bgcolor="#FFFFFF"><textarea name="facilitators" style='height:40px; width:240px;' <?php echo $in_stat3;?> ><?php echo $facilitator; ?></textarea></td>
<?php if($fb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="fac" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="fac" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="fac" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="fac" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="fac_remarks" id='fac_remarks' style='height:40px; width:200px;'<?php echo $in_stat2;?>><?php echo $fcl_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Resource Speaker</td>
<td bgcolor="#FFFFFF"><textarea name="speaker" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $speaker; ?></textarea></td>
<?php if($rsb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="rs" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="rs" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="rs" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="rs" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="resource_remarks" id='fac_remarks' style='height:40px; width:200px;'<?php echo $in_stat2;?>><?php echo $rs_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Support Staff</td>
<td bgcolor="#FFFFFF"><textarea name="staff" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $support; ?></textarea></td>
<?php if($ssb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="ss" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="ss" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="ss" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="ss" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="ss_remarks" id='ss_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $ss_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Proposed Budget</td>
<td bgcolor="#FFFFFF"><textarea name="pBudget" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $budget; ?></textarea></td>
<?php if($bb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="budget" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="budget" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="budget" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="budget" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="budget_remarks" id='budget_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $budget_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Meals / Snacks</td>
<td bgcolor="#FFFFFF"><textarea name="snacks" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $meal; ?></textarea></td>
<?php if($msb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="meal" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="meal" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="meal" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="meal" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="meal_remarks" id='meals_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $meal_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Supplies / Materials</td>
<td bgcolor="#FFFFFF"><textarea name="supplies" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $supp; ?></textarea></td>
<?php if($su_b=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="supp" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="supp" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="supp" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="supp" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="supply_remarks" id='supplies_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $supply_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>TEV</td>
<td bgcolor="#FFFFFF"><textarea name="tev_desc" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $tev; ?></textarea></td>
<?php if($tvb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="tev" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="tev" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="tev" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="tev" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="tev_remarks" id='TEV_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $tev_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Honorarium</td>
<td bgcolor="#FFFFFF"><textarea name="honorarium" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $hon; ?></textarea></td>
<?php if($hnb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="hon" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="hon" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="hon" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="hon" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="hon_remarks" id='hon_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $hon_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Gasoline</td>
<td bgcolor="#FFFFFF"><textarea name="gasoline" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $gas; ?></textarea></td>
<?php if($gasb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="gas" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="gas" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="gas" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="gas" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="gas_remarks" id='gas_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $gas_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Fund Source</td>
<td bgcolor="#FFFFFF"><textarea name="fund_source" style='height:40px; width:240px;'<?php echo $in_stat3;?>><?php echo $fsource; ?></textarea></td>
<?php if($fsrcb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="fund" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="fund" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="fund" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="fund" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="fSource_remarks" id='fSource_remarks' style='height:40px; width:200px;' <?php echo $in_stat2;?>><?php echo $fund_rem;?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Level of Evaluation</td>
<td bgcolor="#FFFFFF"><textarea name="eval" style="height:40px; width:240px;" <?php echo $in_stat3;?>><?php echo $eval; ?></textarea></td>
<?php if($evlb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="lvl" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="lvl" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="lvl" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="lvl" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="lvl_remarks" id="lvl_remarks" style="height:40px; width:200px;" <?php echo $in_stat2;?> ><?php echo $eval_rem; ?></textarea></td>
</tr>

<tr bgcolor="#DFEEE9">
<td><b>Course Requirements/<br/>Expected Results</td>
<td bgcolor="#FFFFFF"><textarea name="results" style="height:40px; width:240px;" <?php echo $in_stat3;?>><?php echo $crs_reqs; ?></textarea></td>
<?php if($crsb=='yes'){?>
<td bgcolor="#<?php echo $color;?>"><input name="reqs" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> checked /></td>
<td bgcolor="#FFFFFF"><input name="reqs" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?>/></td>
<?php }else{?>
<td bgcolor="#FFFFFF"><input name="reqs" type="radio" id="status" value="yes" <?php echo $in_stat; echo $in_stat2; ?> /></td>
<td bgcolor="#FF9393"><input name="reqs" type="radio" id="status" value="no" <?php echo $in_stat; echo $in_stat2;?> checked /></td>
<?php }?>
<td bgcolor="#FFFFFF"><textarea name="reqs_remarks" id="reqs_remarks" style="height:40px; width:200px;" <?php echo $in_stat2; ?>><?php echo $crs_rem; ?></textarea></td>
</tr>
<?php
if( $type == 'coordinator'){
echo '
<tr bgcolor="#DFEEE9">
<td><b>Shedule of Activities</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched Files
</td>';

if($schedb == 'yes'){
echo '
<td bgcolor="#'.$color.'"><input name="sched" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="sched" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="sched" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="sched" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}
echo '
<td bgcolor="#FFFFFF"><textarea name="sched_remarks" id="sched_remarks" style="height:40px; width:200px;"'.$in_stat2.'>'.$sched_rem.'</textarea></td>
</tr>
';
		?>
<tr bgcolor="#DFEEE9">
<td ><b>Final Remarks</td>
<td bgcolor="#FFFFFF" colspan="4"><textarea name="final_remarks" id='final_remarks' style='height:55px; width:560px;'<?php echo $in_stat; echo $in_stat2;?>><?php echo $final_remark; ?></textarea></td>	

<?php
}
?>

<?php if( $type == 'hra'){
echo '
<tr bgcolor="#DFEEE9">
<td><b>Shedule of Activities</td>
<td bgcolor="ffffff" style="width:240px; text-align:center;">
View Attatched File
</td>';
if($schedb=='yes'){
echo '
<td bgcolor="#'.$color.'"><input name="sched" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.' checked /></td>
<td bgcolor="#FFFFFF"><input name="sched" type="radio" id="status" value="no"'.$in_stat.$in_stat2.'/></td>
';
}else{
echo '
<td bgcolor="#FFFFFF"><input name="sched" type="radio" id="status" value="yes" '.$in_stat.$in_stat2.'/></td>
<td bgcolor="#FF9393"><input name="sched" type="radio" id="status" value="no"'.$in_stat.$in_stat2.' checked /></td>
';
}

echo'
<td bgcolor="#FFFFFF"><textarea name="sched_remarks" id="sched_remarks" style="height:40px; width:200px;"'.$in_stat2.'>'.$sched_rem.'</textarea></td>
</tr>';

?>

<tr bgcolor="#DFEEE9">
<td ><b>Final Remarks</td>
<td bgcolor="#FFFFFF" colspan="4"><textarea name="final_remarks" id='final_remarks' style='height:55px; width:560px;'<?php echo $in_stat2;?>><?php echo $final_remark; ?></textarea></td>
<tr bgcolor="#DFEEE9">
<td ><b>Training By :</td>
<td bgcolor="#FFFFFF" colspan="4"><textarea name="owner" id='owner' style='height:30px; width:560px;' disabled/><?php echo $name3; ?></textarea></td>
</tr>

<?php 
}
?>

</table>
<?php

if($type=='hra' && $locked =='1'){
echo '<input type="submit" id="Sbutton" value="Notify Originator" onClick="return confirm("Please make sure fields are correct before we proceed..ü")">';
echo '<div id="lock"><font color="green">Approve: <input type="checkbox" name="lock" value="approve" checked></font></div>';
}else{
echo '<input type="submit" id="Sbutton" value="Notify Originator" onClick="return confirm("Please make sure fields are correct before we proceed..ü")">';
echo '<div id="lock"><font color="green">Approve: <input type="checkbox" name="lock" value="approve"></font></div>';
}

?>
<input type='hidden' value='<?php echo $T_ID; ?>' name='important'>
<input type='hidden' value='<?php echo $name3; ?>' name='important2'>
</form>

<?php
if( $type == 'hra'){

$old_att = trim($att,";");
$new_att = $old_att;

echo '<form action="../'.$new_att.'"">';
echo '<div id="attachment">
<tr bgcolor="#DFEEE9">
<td bgcolor="00CCFF"><b>Supporting Documents : </td>
<td bgcolor="88E8FF" style="width:240px; text-align:center;" colspan="4">
<input type="submit" value="Download Attachement">
</td>
</tr></div>';

echo "<input type='hidden' value='".$T_ID."' name='important'>";
echo '</form>';
}

if($locked !='1'){
	if($type == 'coordinator' && $rfc_fr_app == '1' ){
	echo '<div id="attachment2">';
	echo '<form action ="for_approval.php" method="POST" enctype="multipart/form-data">';
	echo '<b>File Attachments : <input type="file" name="attached_file" id="file" style="width:300px; border:1px solid orange; text-align:left;">';
	echo '<input type="submit" id="Sbutton" value="Submit Revised Training" style="float:right;">';
	echo "<input type='hidden' value='".$T_ID."' name='important'>";
	echo "<input type='hidden' value='".$name3."' name='important2'>";
	echo '</form>';
	echo '</div>';
	}
	if($type == 'coordinator' && $rfc_to_app == '1' ){
	echo '<div id="attachment2">';
	echo '<b>STATUS : Waiting for Approval..</b>';
	echo '</div>';
	}
}else{
	if($type == 'coordinator' && $rfc_fr_app == '0'){
	echo '<form action ="rfc_to.php" method="POST">';
	echo "<input type='hidden' value='".$T_ID."' name='important'>";
	echo "<input type='hidden' value='".$name3."' name='important2'>";	
	echo '<input type="submit" id="Sbutton" value="Request For Changes">';
	echo '</form>';
	}

}
echo '<br>';
echo '<br>';
?>