<?php
include('../check.php');
$c_year = date('Y');
$n_year = $c_year + 3;

while($row=mysql_fetch_array($rsql))
	{
		$lname =  $row['LN'];
		$fname =  $row['FN'];
		$mname =  $row['MN'];
			$complete =  $lname.', '.$fname.' '.$mname;
			$name = ucwords($complete);
	}
	$title2 = $_POST['title_act'];
//$TPax = '0';
$venue2 = $_POST['venue'];
$budget2 = $_POST['pBudget'];
$fsource2 = $_POST['fund_source'];
$r_speaker=$_POST['speaker'];
$schedule=$_POST['schedule'];
	$title = ucwords($title2);
	$venue =  ucwords($venue2);
	$prop_budget =  ucwords($budget2);
	$fund_src =  ucwords($fsource2);
	
	$fm = $_POST['from_month'];
	$fd = $_POST['from_day'];
	$tm = $_POST['to_month'];
	$td = $_POST['to_day'];
	$ty = $_POST['to_year'];

		$to = $tm.' '.$td.', '.$ty;
		$by = $_SESSION["username"];

	$id=$_POST['TR_ID2'];
$sql = " SELECT * FROM training_gi WHERE TR_ID='$id'";
$rsql = mysql_query($sql);

	while($row=mysql_fetch_array($rsql))
	{
$facilitator=$row['FACILITATOR'];
$final_rem=$row['final_remarks'];

	}

			$name = $_FILES['attached_file']['name'];
			$tmp_name = $_FILES['attached_file']['tmp_name'];
			$location = "../uploadedDocs/$name";
	
			move_uploaded_file($tmp_name,$location);

		$attached_file = basename($_FILES['attached_file']['name']);
		$path = "../uploadedDocs/";	
		$empty = '';

if($tm >= $fm){
	$locked = '1';
	$sql2 = " SELECT * FROM users where username = '$by'";
		$rsql2 = mysql_query($sql2);

		while($row=mysql_fetch_array($rsql2)){
				$lname =  $row['LN'];
				$fname =  $row['FN'];
				$mname =  $row['MN'];
				$division =  $row['BRANCH'];
					$complete =  $lname.', '.$fname.' '.$mname;
					$name = ucwords($complete);
					$author=$by;
			}
	if (!empty($attached_file)) {
		$attached_db_path = $path.$attached_file;	
			$update22="UPDATE training_gi SET ATTACHMENT='$attached_db_path;', TITLE='$title', VENUE='$venue', FR_MONTH='$fm', FR_DAY='$fd', TO_MONTH='$tm', TO_DAY='$td', TO_YEAR='$ty', FACILITATOR='$facilitator', R_SPEAKER='$r_speaker', SCHEDULE='$schedule', AUTHOR='$author', TR_DIV='$division', LOCKED='$locked', final_remarks='$final_rem',P_BUDGET='$prop_budget',F_SOURCE='$fund_src'  where TR_ID = '$id'";
		mysql_query($update22);
		
		echo"<script>alert('Training Submitted! Waiting for Approval..');self.location='../notifications.php'</script>";
		}else{
				echo '<div id="cover"><center><h3>Oops!Sorry,<br/>Please attach the necessary supporting documents<br/>so that we can proceed..</h3></center></div>';
				echo "<script>alert('ERROR : No File is Attached.');window.history.back();</script>";
			}
}else{
echo '<div id="cover"><center><h3>Oops!Sorry,<br/>Please Check Your Date Values..</h3></center></div>';
echo "<script>alert('ERROR : Dates not possible.');window.history.back()</script>";
}
?>