<?php
//include('check2.php');
$_SESSION['today'] = date('Y');
$current_year = $_SESSION['today'];
?>
<style>
td{
padding:5px;
}
#color{
background-color:#5BBDFF;
}
#fname{
width:310px;
margin-left:4px;
}
#lname{
width:310px;
margin-left:5px;
}
#mname{
width:310px;
margin-left:7px;
}
#assignment{
width:260px;
}
#designation{
width:150px;
}
#others{
width:200px;
}
#color{
background-color:#FFB164;
}
#vlC{
width:60px;
}
#slC{
width:60px;
}
</style>
<?php
//$tr_id = $_GET['indiv'];
?>
<center>
<!--form name="byName" action="test_laman.php" method="POST"-->
<form name="addEmployee" action="add_old_employee_exec.php" method="POST">
<table border="0" style="border:1px solid black;"> 
<tr>
	<td colspan="1" align="center" id="color">
    <b>OLD EMPLOYEE INFORMATION</b>
	</td>
</tr>



    <td align="center">
        	<table border="0" align="center">
    <tr>
        <td >
           <b> Last Name : </b>
            <input name="lname" type="text" id="lname" maxlength="30" />
        </td>
    </tr>

    <tr>
        <td>
          <b>  First Name : </b>

            <input name="fname" type="text" id="fname"  maxlength="30"/>
		</td>
    </tr>

    <tr>
        <td>
        	<b>Mid Name : </b>
            <input name="mname" type="text" id="mname"  maxlength="30" />
        </td>
    </tr>

	<tr>
        <td>
        	<b>Designation : </b>
            <select name="designation">
				<option>-Select Position-</option>
				<option>Admin Officer</option>
				<option>Admin Assistant</option>
				<option>Admin Aide</option>
				<option>DMO</option>
				<option>HEPO</option>
			</select>
			<select name="level">
				<option>-Level-</option>
				<option>I</option>
				<option>II</option>
				<option>III</option>
				<option>IV</option>
				<option>V</option>
				<option>VI</option>
			</select>
			&nbsp;&nbsp;
			SG : <select name="salary_grade">
				<option value="">-SG-</option>
	<?php
	for($i = 1; $i < 34; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
			</select>
			
        </td>
    </tr>
	
		    <tr>
        <td>
        	<b> Forward Leave Credits : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><i>VL : 
            <input name="Leave" type="text" id="vlC"  maxlength="7" value = "VL"/>&nbsp;&nbsp;&nbsp;&nbsp;
			SL : </i>
            <input name="Leave" type="text" id="slC"  maxlength="7" value = "SL"/>
        </td>
    </tr>

	<?php /*>
	
    </td>
    </tr>
<?php */?>	
<td colspan="1" align="center">
<hr/>
<!--<input type="hidden" value="<?php echo $tr_id;?>" name="important">-->
<input type="submit" value="Insert Employee Information"  onClick="return confirm('Please Check Data Before Adding Employee.')" style='margin-top:5px; margin-bottom:5px;'/>
</td>

</table>
</form>

<script type="text/javascript">
		window.onload=init;
		function init(){
		document.getElementById("lname").focus();
		}
		
        function checkbox(val){
            if(val)
        document.byName.text_others.setAttribute("disabled",val)
        else
        document.byName.text_others.removeAttribute("disabled",val)
		
        }
</script>

</center>