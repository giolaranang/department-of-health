<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
<?php 
include('../check.php');
$empid=$_GET['empid'];
$trid=$_GET['train'];
$name1="SELECT e.lname,e.fname,e.mname FROM employees e where e.empid= '$empid'";
$name2=mysql_query($name1);
while($row=mysql_fetch_array($name2)){
	$ln1 = $row['lname'];
	$fn1 = $row['fname'];
	$mn1 = $row['mname'];
	$name1 = $ln1.', '.$fn1.' '.$mn1;
}
?>
<h5 align="center"><?php echo $name1; ?></h5>
<table width="650" align='center' border='0' bgcolor="">
<tr bgcolor="#CCC">
<td width="150" align="center"><b>Joined Trainings</td>
</tr>
<?php

$sql200="SELECT e.lname,e.fname,e.mname,e.designation,t.TITLE FROM employees e INNER JOIN training_pax p INNER JOIN training_gi t on p.empid=e.empid and p.TR_ID=t.TR_ID WHERE e.empid='$empid'";
$rsql200=mysql_query($sql200);
while($row=mysql_fetch_array($rsql200)){
	$ln = $row['lname'];
	$fn = $row['fname'];
	$mn = $row['mname'];
	$br = $row['designation'];
	$name = $ln.', '.$fn.' '.$mn;
	$train=$row['TITLE'];
	echo '<tr>';
	echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px; padding-left:3px;">'.$train.'</td>';
	echo '</tr>';
}
?>
