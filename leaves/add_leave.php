<html class="addleave">
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
<?php
include('check2.php');
$current_year = date('Y');
?>
<?php
$emp_id = $_GET['empid'];

$sql2 = " SELECT * FROM employees where empid = '$emp_id'";
$rsql2 = mysql_query($sql2);

	while($row=mysql_fetch_array($rsql2)){
	
		$lname = $row['lname'];
		$fname = $row['fname'];
		$mname = $row['mname'];
		$designation = $row['designation'];
		$level = $row['level'];
		$salary_grade = $row['salary_grade'];
		$num_days_present = $row['num_days_present'];
		$VL = $row['VL'];
		$SL = $row['SL'];


		$name =  $fname.' '.$mname.' '.$lastname;
}

?>


<center>
<!--form name="byName" action="test_laman.php" method="POST"-->
<form name="addLeave" action="add_leave_exec.php" method="POST">
<table border="0" style="border:1px solid black;" id="color"> 
<tr>
	<td colspan="1" align="center" >
	<font color="#9F5000" style="font-size:13;"><b>APPLICATION for LEAVE</b></font><br/>
<font color="black" style="font-style:italic;"><b>~<u><?php echo $emp_id;?></u>~</b></font>
	</td>
</tr>

    <td align="center">
        	<table border="0" align="center">
    <tr>
        <td valign="top" align="center">
        
			<b>Number of Days: </b><br>
			<input name="days_applied" step="any"  type="number"  id="number_of_days"  maxlength="6"/> 

			<font style="font-size:13;"><i>(Input Formats : <font style="color:green;"> 1 , 3 , 8.5 , 10.5</i></font>)<hr/>
		</td>
    </tr>
	
	<tr>
        <td valign="top" align="center">
			<b>Type of Leave : </b>
			<i>VL:<input name="Leave" type="radio" value="VL"  checked/> |&nbsp;
			SL:<input name="Leave" type="radio" value="SL"><br/></i>
		</td>
    </tr>
<?php /*?>	
		<tr>
        <td valign="top" align="center">
		
			<b>With Pay : </b>
			<i>Yes:<input name="wPay" type="radio" value="VL"  checked/> |&nbsp;
			No:<input name="wPay" type="radio" value="SL"><br/></i>
		</td>
    </tr>
<?php */?>	

	
<tr>

	<!-- by Category -->
	
<td colspan="2" align="center">
	<input type="hidden" value="<?php echo $emp_id;?>" name="empid">

<!----<input type="hidden" value="<?php echo $tr_id;?>" name="important">------>
<input type="submit" value="Apply Changes"  onClick="return confirm('Proceed with Changes Now?.')" style='margin-top:5px; margin-bottom:5px;'/>
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
	</html>