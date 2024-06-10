<?php 
include('../check.php');

$c_year = date('Y');
$n_year = $c_year + 3;

while($row=mysql_fetch_array($rsql))
	{
		$lname =  $row['LN'];
		$fname =  $row['FN'];
		$mname =  $row['MN'];
			$complete =  $lname.', '.$fname.' '.$mname;
			$name = ucwords($complete);
	}
?>
<html class="addtraining">
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
<form action='submit_new_training_update.php' method='post' enctype="multipart/form-data"> 

<table width="750" align='center' border='0'>
<tr id="head_title">
<td width="200" align="center"><b>Training Design</td>
<td width="500" align="center"><b>Description</td>
<?php
$id=$_GET['TR_ID'];
$sql = " SELECT * FROM training_gi WHERE TR_ID='$id'";
$rsql = mysql_query($sql);

	while($row=mysql_fetch_array($rsql))
	{
	$title =  $row['TITLE'];
	$venue = $row['VENUE'];
	$froMO = $row['FR_MONTH'];
	$toMO  =  $row['TO_MONTH'];
	$froDAY=$row['FR_DAY'];
	$toDAY =$row['TO_DAY'];
	$toYEAR=$row['TO_YEAR'];
	$f_source=$row['F_SOURCE'];
	$p_budget=$row['P_BUDGET'];
	$schedule=$row['SCHEDULE'];
	$speaker=$row['R_SPEAKER'];

	}

	$sql_month = " SELECT * FROM calendar where MONTH_ID='$froMO'";
$rsql_month = mysql_query($sql_month);
	while($row=mysql_fetch_array($rsql_month)){
		$month1=$row['MONTH_SHORT'];
	}
$sql_month2 = " SELECT * FROM calendar where MONTH_ID='$toMO'";
$rsql_month2 = mysql_query($sql_month2);
	while($row=mysql_fetch_array($rsql_month2)){
		$month2=$row['MONTH_SHORT'];
	}
?>
<input type='hidden' value='<?php echo $id; ?>' name='TR_ID2'></input>
<tr>
<td height="60"><b>Title Of Activity</td>
<td bgcolor="#FFFFFF"><textarea name="title_act" id='title' style='height:60px; border:1px solid orange; '><?php echo $title; ?></textarea></td>
</tr>

<tr>
<td><b>Venue</td>
<td bgcolor="#FFFFFF"><textarea name="venue" style='height:30px; border:1px solid orange;'><?php echo $venue; ?></textarea></td>
</tr>

<tr>

<td><b>Date</td>
<td bgcolor="#FFFFFF" style='height:50px; border:1px solid orange;'>
<b>From :</b>
          <select name="from_month" value="$froMO">
		 <?php 
switch ($month1) {
    case 'JAN':
        $va='1';
        break;
    case 'FEB':
        $va='2';
        break;
    case 'MAR':
        $va='3';
        break;
    case 'APR':
        $va='4';
        break;
    case 'MAY':
        $va='5';
        break;
    case 'JUN':
        $va='6';
        break;
    case 'JUL':
        $va='7';
        break;
    case 'AUG':
        $va='8';
        break;
    case 'SEP':
        $va='9';
        break;
    case 'OCT':
        $va='10';
        break;
    case 'NOV':
        $va='11';
        break;
    case 'DEC':
        $va='12';
        break;
}
		 ?>  
		   <option value=<?php echo $va; ?>><?php echo $month1; ?></option>
		   <option value='1'>JAN</option>
		   <option value='2'>FEB</option>
		   <option value='3'>MAR</option>
		   <option value='4'>APR</option>
		   <option value='5'>MAY</option>
		   <option value='6'>JUN</option>
		   <option value='7'>JUL</option>
		   <option value='8'>AUG</option>
		   <option value='9'>SEP</option>
		   <option value='10'>OCT</option>
		   <option value='11'>NOV</option>
		   <option value='12'>DEC</option>
		   </select>   
		   
		   <select name="from_day" style="margin-right:74px;">
		   <option value=<?php echo $froDAY;?>><?php echo $froDAY; ?></option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
	<?php //============================================= TO DATE ===============================?>

<b><br/><div id ="date">To :</b>
		<select name="to_month">
	 <?php 
switch ($month2) {
    case 'JAN':
        $va2='1';
        break;
    case 'FEB':
        $va2='2';
        break;
    case 'MAR':
        $va2='3';
        break;
    case 'APR':
        $va2='4';
        break;
    case 'MAY':
        $va2='5';
        break;
    case 'JUN':
        $va2='6';
        break;
    case 'JUL':
        $va2='7';
        break;
    case 'AUG':
        $va2='8';
        break;
    case 'SEP':
        $va2='9';
        break;
    case 'OCT':
        $va2='10';
        break;
    case 'NOV':
        $va2='11';
        break;
    case 'DEC':
        $va2='12';
        break;
}	 
?>  
		   <option value=<?php echo $va2; ?>><?php echo $month2; ?></option>
		   <option value='1'>JAN</option>
		   <option value='2'>FEB</option>
		   <option value='3'>MAR</option>
		   <option value='4'>APR</option>
		   <option value='5'>MAY</option>
		   <option value='6'>JUN</option>
		   <option value='7'>JUL</option>
		   <option value='8'>AUG</option>
		   <option value='9'>SEP</option>
		   <option value='10'>OCT</option>
		   <option value='11'>NOV</option>
		   <option value='12'>DEC</option>
		   
		</select>   
		   
		   <select name="to_day">
		   <option value=<?php echo $toDAY;?>><?php echo $toDAY; ?></option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
		  
		   <select name="to_year">
		   <option value=<?php echo $toYEAR;?>><?php echo $toYEAR; ?></option>
	<?php
	for($i = $c_year; $i < $n_year; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 	
 </div>
</td>
</tr>
<tr>

<td><b>Proposed Budget</td>
<td bgcolor="#FFFFFF"><textarea name="pBudget" style='height:30px; border:1px solid orange;'><?php echo $p_budget;?></textarea></td>
</tr>

<tr>
<td><b>Fund Source<br/><font style="font-size:12px;">( include WFP )</font></td>
<td bgcolor="#FFFFFF"><textarea name="fund_source" style='height:40px;  border:1px solid orange;'><?php echo $f_source;?></textarea></td>
</tr>

<tr>
<td><b>Speaker<br/>
<td bgcolor="#FFFFFF"><textarea name="speaker" style='height:40px;  border:1px solid orange;'><?php echo $speaker;?></textarea></td>
</tr>

<tr>
<td><b>Schedule<br/>
<td bgcolor="#FFFFFF"><textarea name="schedule" style='height:40px;  border:1px solid orange;'><?php echo $schedule;?></textarea></td>
</tr>

<tr>
<td bgcolor="00CCFF"><b>File Attachments</td>
<td bgcolor="88E8FF" style="border:1px solid orange; text-align:left; border:1px solid orange;" id="upload_files">
<input type="file" name="attached_file" id="file" style="width:545px;">
</tr>


</table>

<input class="submitindex" type="submit" id='Sbutton' value="Save Changes and Resubmit for Approval" onClick="return confirm('Please make sure fields are correct and files are attached then press OK to proceed..')">

</form>
</html>