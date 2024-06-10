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
<html class="alltrainings1 smart-green center">
<head>
<link rel="stylesheet"  type="text/css" href="css/style.css"/>
</head>
<div id="tableness">
<table width="643" align="center" border='0'>
<tr bgcolor="#DFEEE9">
<h5 id="tight">Confirm Employees Button is Disabled when no on is selected</h5>
<td width="280" align="center"><b>Employee Name</td>
<td width="130" align="center"><b>Employee UserName</td>
<td width="100" align="center"><b>Designation</td>
<td width="50" align="center"><b>Level</td>
<td width="100" align="center"><b>Salary Grade</td>
<td width="20" align="center"><b>Days Present</td>
<td width="20" align="center"><b>Confirm Employee/s</td>
<style>
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.7); /* IE */
  -moz-transform: scale(1.7); /* FF */
  -webkit-transform: scale(1.7); /* Safari and Chrome */
  -o-transform: scale(1.7); /* Opera */
  padding: 10px;
}
</style>
<form method="post" action="confirm_employees.php">
<?php
$today = date('M j, Y');
$owner = $_SESSION['username'];
$tid2='';

$sql232 = " SELECT * FROM employees WHERE confirmed='0'";
$rsql232 = mysql_query($sql232);

while($row=mysql_fetch_array($rsql232)){
		$empid = $row['empid'];
		$username = $row['uname'];
		$ln = $row['lname'];
		$fn = $row['fname'];
		$mn = $row['mname'];
		$br = $row['designation'];
		$level = $row['level'];
			
		$salary_grade = $row['salary_grade'];
		$da_pres = $row['num_days_present'];
		$name = $ln.', '.$fn.' '.$mn;

		echo '<tr style="background-color:white";" valign=top>';	
		echo '<td style="background-color:#D9F0FF; text-align:left; padding-top:3px; padding-left:3px;">'.$name.'</td>';
		echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$username.'</td>';
		echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$br.'</td>';
		echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$level.'</td>';
		echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$salary_grade.'</td>';
		echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$da_pres.'</td>';
		echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="confirm[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)"></td>';
	}
?>
</table>
<input name="submit" type="submit" value="Confirm Employee/s" id="Approve" class="smart-green button buttonsize middle" disabled  onClick="return confirm('Confirm Approvals?')"></input>
<hr>
<input name="submit" type="submit" value="Reject and Delete Employee/s" id="Denies" class="smart-green button buttonsize middle" disabled onClick="return confirm('Confirm Deletions?')"></input>
<script>
EnableSubmit = function(val)
{
    var sbmt = document.getElementById("Approve");
    var sbmtd = document.getElementById("Denies");

    if (val.checked == true)
    {
        sbmt.disabled = false;
        sbmtd.disabled = false;

    }
    else
    {
        sbmt.disabled = true;
        sbmtd.disabled = true;
    }
}   
</script>

</form>