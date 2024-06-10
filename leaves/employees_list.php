<html class="emplist">
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
<?php
include('check2.php');
$today = date('M j, Y');
?>
<!---<div id = "add_month">
<form action="authenticate.php">
<input type="submit" value="Add 1 Month"/>
</form>
</div>---->

<form method=post name=f1 action=''>
<input type=hidden name=todo value=submit>


Select Month or Year: 
<select name=month value=''>Select Month</option>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>
Year (yyy)<select name=year>
<?php
for ($i = 2013; $i < 2090; $i++){

echo '<option value = '.$i.'>'.$i.'</option>';
}
?>
</select>


</td><td  align=left  >   

<input type=submit value=submit>
</form>
<marquee>

<table width="850" align='center' border='0' bgcolor="">

<tr bgcolor="#CCC">
<td width="200" align="center"><b>Name</td>
<td width="150" align="center"><b>Designation</td>
<td width="70" align="center" style="background-color:#FFA500;"><b>VL</td>
<td width="70" align="center" style="background-color:#FFA500;"><b>SL</td>
<td width="60" align="center" style="background-color:#FF6666;"><b>Add Leave</td>
<td width="" align="center" style="background-color:#FF6666;"><b>Report</td>
<script>
function add_leave(empid)
{
self.location='add_leave.php?empid='+empid;
}
function fwd_cred(empid)
{
self.location='fwd_cred.php?empid='+empid;
}
</script>
<?Php
$todo= "";
 if(isset($_POST['todo'])){

$tid2='';
$sql2 = " SELECT * FROM employees";
$rsql2 = mysql_query($sql2);

	while($row=mysql_fetch_array($rsql2)){
	
		$ln = $row['lname'];
		$fn = $row['fname'];
		$mn = $row['mname'];
		$br = $row['designation'];
			
		$salary_grade = $row['salary_grade'];
		$vl = $row['VL'];
		$sl = $row['SL'];
		$name = $ln.', '.$fn.' '.$mn;

			echo '<tr style="background-color:white";" valign=top>';	
			echo '<td style="background-color:#D9F0FF; text-align:left; padding-top:3px; padding-left:3px;">'.$name.'</td>';
			echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$br.'</td>';
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;">'.$vl.'</td>';
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;">'.$sl.'</td>';
			
		echo '<td align="center" style="background-color:white;" ><input onclick="add_leave('."'".$salary_grade."'".')" name="'.$salary_grade.'" style="background:url(../images/add_leave.png); width:35; height:24" type="button"></form></td>';
		
		echo '<td align="center" style="background-color:white; width:60px;" ><input onclick="fwd_cred('."'".$salary_grade."'".')" name="'.$salary_grade.'" style="background:url(../images/records2.jpg); width:60; height:24" type="button"></form></td>';
		
		//		echo '<td align="center" style="background-color:white;" ><input onclick="fwd_cred('."'".$emp_code."'".')" name="'.$emp_code.'" style="background:url(../images/leave_icon4.png); width:35; height:24" type="button"></form></td>';

		// insert qry for displaying participants by category
		
		}
}


?>
</table>