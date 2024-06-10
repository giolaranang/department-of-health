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
<form action='submit_new_training.php' method='post' enctype="multipart/form-data"> 

<table width="750" align='center' border='0'>
<tr id="head_title">
<td width="200" align="center"><b>Training Design</td>
<td width="500" align="center"><b>Description</td>

<tr>
<td height="60"><b>Title Of Activity</td>
<td bgcolor="#FFFFFF"><textarea name="title_act" id='title' style='height:60px; border:1px solid orange; 'required></textarea></td>
</tr>

<tr>
<td><b>Venue</td>
<td bgcolor="#FFFFFF"><textarea name="venue" style='height:30px; border:1px solid orange;'required></textarea></td>
</tr>

<tr>

<td><b>Date</td>
<td bgcolor="#FFFFFF" style='height:50px; border:1px solid orange;'>
<b>From :</b>
          <select name="from_month" required>
		   
		   <option value=''>-Month-</option>
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
		   <option value=''>-Day-</option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
	<?php //============================================= TO DATE ===============================?>

<b><br/><div id ="date">To :</b>
		<select name="to_month" required>
		   
		   <option value=''>-Month-</option>
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
		   
		   <select name="to_day" required>
		   <option value=''>-Day-</option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 
		  
		   <select name="to_year" required>
		   <option value=''>-Year-</option>
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
<td bgcolor="#FFFFFF"><textarea name="pBudget" style='height:30px; border:1px solid orange;' required></textarea></td>
</tr>

<tr>
<td><b>Fund Source<br/><font style="font-size:12px;">( include WFP )</font></td>
<td bgcolor="#FFFFFF"><textarea name="fund_source" style='height:40px;  border:1px solid orange;' required></textarea></td>
</tr>
<tr>
<td><b>Speaker<br/></td>
<td bgcolor="#FFFFFF"><textarea name="speaker" style='height:40px;  border:1px solid orange;' required></textarea></td>
</tr>
<tr>
<td><b>Schedule(Time)<br/><font style="font-size:12px;">( include WFP )</font></td>
<td bgcolor="#FFFFFF"><textarea name="schedule" style='height:40px;  border:1px solid orange;' required></textarea></td>
</tr>

<tr>
<td bgcolor="00CCFF"><b>File Attachments</td>
<td bgcolor="88E8FF" style="border:1px solid orange; text-align:left; border:1px solid orange;" id="upload_files">
<input class="submitindex" type="file" name="attached_file" id="file" style="width:545px;">
</tr>


</table>

<input class="submitindex" type="submit" id='Sbutton' value="Submit for Approval" onClick="return confirm('Please make sure fields are correct and files are attached then press OK to proceed..')">

</form>
</html>