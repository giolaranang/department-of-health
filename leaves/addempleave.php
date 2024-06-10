<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<!--form name="byName" action="test_laman.php" method="POST"-->
<form name="addempleave" action="addempleave_exec.php" method="POST">


        	<table border="0" align="left" style="border:1px solid black">
        	<tr>
	<td colspan="1" align="center" id="color2">
    <b>Please Fill in All Information</b>
	</td>
</tr>

    <td align="left">
        	<tr>
        	<td >
           <b> Office: </b>
            <input name="office" type="text" id="office" maxlength="30" value="" required autofocus/>
        </td>
        	</tr>
    <tr>
        <td >
           <b> First Name : </b>
            <input name="fname" type="text" id="fname" maxlength="30" value="" required/>
        </td>
    </tr>

    <tr>
        <td>
          <b>  Mid Name : </b>

            <input name="mname" type="text" id="fname"  maxlength="30" required/>
		</td>
    </tr>

    <tr>
        <td>
        	<b>Last Name : </b>
            <input name="lname" type="text" id="fname"  maxlength="30" required/>
        </td>
    </tr>
     <tr>
        <td>
        	<b>Date of Filing : </b>
            <input name="lname" type="text" id="date_of_filing"  maxlength="30" required/>
        </td>
    </tr>

	<tr>
        <td>
        	<b>Designation : </b>	
            <select name="designation"required id="positionn">    
				<option selected disabled>Select Position</option>
				<option>Admin Officer</option>
				<option>Admin Assistant</option>
				<option>Admin Aide</option>
				<option>DMO</option>
				<option>HEPO</option>
			</select>
			<select name="level" required id="levell">
				<option selected disabled>-Level-</option>
				<option>I</option>
				<option>II</option>
				<option>III</option>
				<option>IV</option>
				<option>V</option>
				<option>VI</option>
			</select>			
        </td>
    </tr>
	
		    <tr>
        <td>
        	<b>Salary (Monthly) : </b>
            <input name="salary" type="text" id="salary"  maxlength="100" value="" />
        </td>
    </tr>
</table>

<td align="right">
<table id="table2" border="0" style="border:1px solid black;"> 
<tr>
	<td colspan="1" align="center" id="color2">
    <b>Details of Application</b>
	</td>
</tr>
    <td align="center">
        	<table border="0" align="left">
        	<tr>
        <td valign="top" align="center">
			<b>Type of Leave : </b>
			<i>Vacation: <input name="Leave" type="radio" value="VL"  checked/> |&nbsp;
			Sick:<input name="Leave" type="radio" value="SL"><br/></i>
		</td>
    </tr>
   
<td colspan="1" align="center">
<hr/>
<!---<input type="hidden" value="<?php echo $tr_id;?>" name="important">---->
<input type="submit" value="Add Leave" style='margin-top:5px; margin-bottom:5px;'/>
</td>
</table>
</form>
</td>
</body>
</html>