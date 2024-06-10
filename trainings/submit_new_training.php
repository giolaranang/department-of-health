<style>
#cover{
position:absolute;
background-color:#FFF;
height:500px;
width:900px;
color:red;
padding-top:50px;
padding-left:25px;
}
</style>
<?php

include ('../check.php');

$title2 = $_POST['title_act'];
//$TPax = '0';
$venue2 = $_POST['venue'];
$budget2 = $_POST['pBudget'];
$fsource2 = $_POST['fund_source'];

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
		$attached_file = basename($_FILES['attached_file']['name']);
		$path = "../uploadedDocs/";	
	
if($tm >= $fm){

		if (!empty($attached_file)) {
			
		$attached_db_path = $path.$attached_file;
		//for add ons:
		//$rationale='';
		//$objectives='';
		//$contents='';
		//$methodology='';
		//$schedule='';
		//$facilitator='';
		//$r_speaker='';
		//$supp_staff='';
		//$meal_snacks='';
		//$supplies='';
		//$tev='';
		//$honorarium='';
		//$gasoline='';
		//$author=$by;
		//$final_rem='';

		//$read_app = '1';
		//$notify_coord = '0';
		//$final_remarks='';

		//$random = rand();
		//$final_value = $random * 21.23813 + 6189.212;

		//$tempo_badge = $final_value;

		$locked = '1';
		
		//$eval = '';
		//$crs_reqs = '';
		//$for_app = '1';
		//$rfc_fr_app = '0';
		//$rfc_to_app = '0';
		

	if($_SESSION['type']=="coordinator"){
		
			$name = $_FILES['attached_file']['name'];
			$tmp_name = $_FILES['attached_file']['tmp_name'];
			$location = "../uploadedDocs/$name";
			$facilitator="not yet checked";
			$r_speaker=$_POST['speaker'];
			$schedule=$_POST['schedule'];
			$final_rem="Check ongoing..";
			move_uploaded_file($tmp_name,$location);

		$empty = '';
			
		$insert_new= "INSERT INTO training_gi(ATTACHMENT,TITLE,VENUE,FR_MONTH,FR_DAY,TO_MONTH,TO_DAY,TO_YEAR,FACILITATOR,R_SPEAKER,SCHEDULE,AUTHOR,TR_DIV,LOCKED,final_remarks,P_BUDGET,F_SOURCE)VALUES('$attached_db_path;','$title','$venue','$fm','$fd','$tm','$td','$ty','$facilitator','$r_speaker','$schedule','$author','$division','$locked','$final_rem','$budget2','$fsource2')";
		mysql_query($insert_new);
		 
		
		echo"<script>alert('Training Submitted! Waiting for Approval..');self.location='../notifications.php'</script>";
		}
			}else{
				echo '<div id="cover"><center><h3>Oops!Sorry,<br/>Please attach the necessary supporting documents<br/>so that we can proceed..</h3></center></div>';
				echo "<script>alert('ERROR : No File is Attached.');window.history.back();</script>";
			}
}else{
echo '<div id="cover"><center><h3>Oops!Sorry,<br/>Please Check Your Date Values..</h3></center></div>';
echo "<script>alert('ERROR : Dates not possible.');window.history.back()</script>";
}
?>
