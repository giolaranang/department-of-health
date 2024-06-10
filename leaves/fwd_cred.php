<?php
include('check2.php');
$current_year = date('Y');
?>
<style>
td{
padding:5px;
}
#color{
background-image:url(../images/tdbg.png);
background-repeat:repeat-x;
}
#number_of_days{
width:50px;
}
#retire{
background-color:#FF9F9F;
width:210px;
height:20px;
padding:7px;
}
</style>
<?php
$emp_id = $_GET['empid'];

$sql2 = " SELECT * FROM employees where empid = '$emp_id'";
$rsql2 = mysql_query($sql2);

	while($row=mysql_fetch_array($rsql2)){
	
		$ln = $row['gi_lname'];
		$fn = $row['gi_fname'];
		$mn = $row['gi_mname'];

		$name =  $fn.' '.$mn.' '.$ln;
}

?>
<center>
<!--form name="byName" action="test_laman.php" method="POST"-->
<form name="addLeave" action="add_leave_exec.php" method="POST">
<table border="0" style="border:1px solid black;" id="color"> 
<tr>
	<td colspan="2" align="center" >
	<font color="#9F5000" style="font-size:13;"><b>Forward Credits</b></font><br/>
   <font color="black" style="font-style:italic;"><b>~<u><?php echo 'name' ?></u>~</b></font>
	</td>
</tr>

    <td align="center" colspan="2"><hr>
        	<table border="0" align="center">
    <tr>
        <td valign="top" align="center">
			<b>VL : </b><br>
			<input name="Leave" type="text" id="number_of_days"  maxlength="6"/>
		</td>
		<td valign="top" align="center">
			<b>SL : </b><br>
			<input name="Leave" type="text" id="number_of_days"  maxlength="6"/>
		</td>
    </tr>
	
<tr>
	<input type="hidden" value="<?php echo $emp_id;?>" name="empid">

	<!-- by Category -->
	
<td colspan="2" align="center">
<input type="hidden" value="<?php echo 'tr_id'?>" name="important">
<input type="submit" value="Forward Credits"  onClick="return confirm('Proceed with Changes Now?.')" style='margin-top:5px; margin-bottom:5px;'/>
</td>
</tr>
</table>
</form>

<script type="text/javascript">
		window.onload=init;
		function init(){
		document.getElementById("number_of_days").focus();
		}
</script>

</center>
