<html class="registers">
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<title>
Registration Form
</title>
<body>
  <?php
  if (!isset($_POST['OK'])){
  ?>
  <form  method="post" class="smart-green" action="register.php">
      <h1>Registration Form 
        <span>Please fill all the texts in the fields.</span>
    </h1>
        <span>First Name:</span>
        <input id="name" type="text" value="" name="fname" placeholder="Firstname" maxlength="20" required autofocus/>
        <span>Middle Initial :</span>
        <input id="name" type="text" value="" name="mname" placeholder="Middle Initial" maxlength="5" required/>
        <span>Last Name:</span>
        <input id="name" type="text"  value="" name="lname" placeholder="Last Name" maxlength="20" required/>
  		<span>Click 'OK' to generate and see your username.	
        <input id='small' type="submit" class="button" name="OK" value="OK">
        <br> <span>Warning: Once Generated, Names Cannot be changed.
        <input id="name" type="text" name="usname" maxlength="30" placeholder="username" disabled/>
        <span>Password:</span>
        <input id="name" type="text" name="pword" placeholder="Generate Username First" disabled/>
        </form>
<?php
}else{

$fnd = $_POST['fname'];
$mndz = $_POST['mname'];
$lnamed = $_POST['lname'];
if(!empty($fnd) && !empty($mndz) && !empty($lnamed) ){
	$first = $fnd[0];
	$second = $mndz[0];

	$fnames = ucwords($first);
	$mnames = ucwords($second);

	$lnames = ucwords($lnamed);

	$val = $fnames.$mnames.$lnames;
}else{
		echo "<script>alert('Oops!Please check empty fields..');";
		echo "window.history.back()";
		echo "</script>";	
	}
	?>
	<form  method="post" value="save" class="smart-green" action="register_exec.php">
	    <h1>Registration Form 
        <span>Please fill all the texts in the fields.</span>
    </h1>   
        <span>First Name:</span>
        <input  type="text" placeholder=<?php echo $fnd; ?> disabled/>
        <input type="hidden" name="fname2" value=<?php echo $fnd; ?> />
        <span>Middle Initial :</span>
        <input  type="text" placeholder=<?php echo $mndz; ?>  disabled/>
        <input type="hidden" name="mname2" value=<?php echo $mndz; ?> />
        <span>Last Name:</span>
        <input  type="text" placeholder=<?php echo $lnamed; ?>  disabled/>
        <input type="hidden" name="lname2" value=<?php echo $lnamed; ?> />
  	  	<span>Username:</span>
        <input  type="text" placeholder=<?php echo $val;?> disabled/>
        <input type="hidden" name="usname2" value=<?php echo $val; ?> />
     	<span>You Can Now Enter Your Password:</span>
        <input  type="password" name="pword2" required autofocus/>
        <span>Designation :</span>
        <select name="selection2" required value="">
       		 	<option selected disabled>Select Position</option>
     			<option>Admin Officer</option>
				<option>Admin Assistant</option>
				<option>Admin Aide</option>
				<option>DMO</option>
				<option>HEPO</option>
        </select>
        <span>Level :</span>
   	<select name="level2" required value="">
				<option selected disabled>Select Level</option>
				<option>I</option>
				<option>II</option>
				<option>III</option>
				<option>IV</option>
				<option>V</option>
				<option>VI</option>
			</select>
   	Salary Grade : <select name="salary_grade2" value="">
				<option select disabled>Select Salary Grade</option>
	<?php
	for($i = 1; $i < 34; $i++){
		echo '<option  value='.$i.'>'.$i.'</option>';
	}
	?>
			</select>
    	<b>Number of Days Present : </b>
            <input name="num_days_present2" type="text" id="days_present"  maxlength="8" value="" required />
        <b>Days</b>
        <div align="right"><input type="submit" class="button" value="Submit for Approval"/> </div>
        </form>
	<?php
}
?>


</body>
</html>