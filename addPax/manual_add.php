<html >
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
  <form  method="post" class="smart-green" action="manual_add.php">
	  <?php
$tra=$_POST['DDD'];
	echo'<input type="hidden" value="'.$tra.'" name="DDDF">';
  ?>
      <h1>Register New Employee
        <span>Please fill all the texts in the fields.</span>
    </h1>
        <span>First Name:</span>
        <input id="name" type="text" value="" name="fname" placeholder="Firstname" maxlength="20" required autofocus/>
        <span>Middle Initial :</span>
        <input id="name" type="text" value="" name="mname" placeholder="Middle Initial" maxlength="5" required/>
        <span>Last Name:</span>
        <input id="name" type="text"  value="" name="lname" placeholder="Last Name" maxlength="20" required/>
  		<span>Click 'OK' to generate and see employee username.	
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
	  <?php
$traa=$_POST['DDDF'];
	echo'<input type="hidden" value="'.$traa.'" name="TR_ID">';
  ?>
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
     	<span>default Employee Password is 'abc123'</span>
        <input  type="password" name="pword2" value="abc123"required disabled>
        </input>
        <span>Designation :</span>
        <input type="text" name="selection2" required placeholder="Designation here" autofocus>
       		 	
        <span>Level(place 0 if none) :</span>
    <input type="text" name="level2" required  placeholder="Level here">

   	Salary Grade (place 0 if none) : <input type="text" name="salary_grade2" placeholder="salary grade here" required>
				
    	<b>Number of Days Present (place 0 if none) : </b>
            <input name="num_days_present2" type="text" id="days_present" placeholder="Days here" maxlength="8" value="" required />
        <b>Days</b>
        <div align="right"><input type="submit" class="button" value="Add to training (account will also be submitted for approval)"/> </div>
        </form>
	<?php
}
?>


</body>
</html>