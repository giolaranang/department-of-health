<html>
<?php
include('check2.php');
?>
<style>
table{
border:1px solid black;
}
tr{
background-color:#5BBDFF;
}
</style>
<table width="850" align='center' border='0'>
<tr bgcolor="#CCC">
<td width="250" align="center" style="background-color:#FFA500;"><b>Name</td>
<td width="200" align="center"><b>Designation</td>
<td width="200" align="center"><b>Effectivity of Resignation</td>
<td width="120" align="center"><b>Benefits</td>

<?php
$today = date('F j, Y');
$sql2 = " SELECT * FROM general_info";
$rsql2 = mysql_query($sql2);

	while($row=mysql_fetch_array($rsql2)){
	
		$ln = $row['gi_lname'];
		$fn = $row['gi_fname'];
		$mn = $row['gi_mname'];
			$br = $row['gi_designation'];

			$emp_code="123";
			
		$name = $ln.', '.$fn.' '.$mn;

			echo '<tr style="background-color:white";" valign=top>';	
			echo '<td style="background-color:#FFEDCA; text-align:left; padding-top:3px; padding-left:3px;">'.$name.'</td>';
			echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px; ">'.$br.'</td>';
			echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px; ">'.$today.'</td>';
		echo '<td align="center" ><input onclick="add_leave('."'".$emp_code."'".')" name="'.$emp_code.'" style="background:url(../images/records.jpg); width:104; height:24" type="button"></form></td>';

		// insert qry for displaying participants by category
		
		}
?>
</table>
</html>