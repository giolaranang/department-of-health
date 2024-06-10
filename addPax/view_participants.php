<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
<?php 
include('../check.php');
$trid=$_GET['TR_ID'];
?>
<table width="650" align='center' border='0' bgcolor="">
<tr bgcolor="#CCC">
<td width="150" align="center"><b>List Of Participants</td>
</tr>
<?php
$sql2020="SELECT e.lname,e.fname,e.mname,e.designation,t.TITLE FROM employees e INNER JOIN training_pax p INNER JOIN training_gi t on p.empid=e.empid and p.TR_ID=t.TR_ID WHERE p.TR_ID='$trid'";
$rsql2020=mysql_query($sql2020);
while($row=mysql_fetch_array($rsql2020)){
	$ln = $row['lname'];
	$fn = $row['fname'];
	$mn = $row['mname'];
	$br = $row['designation'];
	$name = $ln.', '.$fn.' '.$mn;
	$train=$row['TITLE'];
	echo '<tr>';
	echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px; padding-left:3px;">'.$name.'</td>';
	echo '</tr>';
}
?>
