<html>
<form action="etd_compute.php" method="POST">
<?php 
<!--30 days in September, April, June and, November. All the rest have 31 except February which has 28 days clear and 29 in each leap year.-->

ETD:
<td bgcolor="#FFFFFF" style='height:50px; border:1px solid orange;'>

          <select name="month">
		   
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
		   
		   <select name="day">
		   <option value=''>-Day-</option>
	<?php
	for($i = 1; $i < 32; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
		   </select> 

	<select name="year">
	<option value=''>-Year-</option>
	<?php
	for($i = 1950; $i < 2031; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
	</select> 
<br/>
Half Day : 
<input type="radio" value="yes" name="half_day">Yes
<input type="radio" value="no" name="half_day" checked>No
<br/>

?>
<input type="text" name="days_present">
<input type="submit" value="Credit.">
</form>
</html>