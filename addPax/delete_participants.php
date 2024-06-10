<html class="alltrainings1 smart-green center">
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
<h5 id="tight">Delete Participants Button is Disabled when no one is selected.</h5>
<h5 id="tight">Only Participants registered in the training can be selected for deletion.</h5>
<table width="650" align='center' border='0' bgcolor="">
<tr bgcolor="#CCC">
<td width="150" align="center"><b>Name</td>
<td width="120" align="center"><b>Designation</td>
<td width="90" align="center" style="background-color:#FF6666;"><b>Delete Participant</td>
<td width="60" align="center" style="background-color:#FF6666;"><b>View Trainings</td>
<style>
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.7); /* IE */
  -moz-transform: scale(1.7); /* FF */
  -webkit-transform: scale(1.7); /* Safari and Chrome */
  -o-transform: scale(1.7); /* Opera */
  padding: 10px;
}
</style>
<form method="post" action="delete_participants_exec.php">
<?php
include('../check.php');
$today = date('M j, Y');
$owner = $_SESSION['username'];
$tid2='';

//current training being paxed
$trid = $_GET['TR_ID'];
	$two="SELECT m.FR_MONTH,m.FR_DAY,m.TO_MONTH,m.TO_DAY,m.TO_YEAR FROM training_gi m WHERE TR_ID='$trid'";
		$two2=mysql_query($two);
		while($row3=mysql_fetch_array($two2)){
		$fr_month2=$row3['FR_MONTH'];
		$fr_day2=$row3['FR_DAY'];
		$to_month2=$row3['TO_MONTH'];
		$to_day2=$row3['TO_DAY'];
		$to_year2=$row3['TO_YEAR'];
}

$sql2 = " SELECT * FROM employees";
$rsql2 = mysql_query($sql2);
	while($row=mysql_fetch_array($rsql2)){
		$empid = $row['empid'];
		$ln = $row['lname'];
		$fn = $row['fname'];
		$mn = $row['mname'];
		$br = $row['designation'];	
		$salary_grade = $row['salary_grade'];
		$vl = $row['VL'];
		$sl = $row['SL'];
		$name = $ln.', '.$fn.' '.$mn;
		$empidd[]=$row['empid'];
		$sql3="SELECT * FROM training_gi where TR_ID = '$trid'";
		$rsql3 = mysql_query($sql3);
		while($row=mysql_fetch_array($rsql3)){
					$trainid = $row[0];
		}
		echo '<input type="hidden" value="'.$trainid.'" name="train">';
	

$sql200="SELECT * FROM training_pax WHERE empid='$empid' AND TR_ID = '$trid'";
$rsql200=mysql_query($sql200);
			echo '<tr style="background-color:white";" valign=top>';	
			echo '<td style="background-color:#D9F0FF; text-align:left; padding-top:3px; padding-left:3px;">'.$name.'</td>';
			echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$br.'</td>';
			//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$empid.'</td>';
	if(mysql_num_rows($rsql200)>=1){
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" ></td>';
		}else {
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" disabled></td>';
 		}
			echo'<input type="hidden" value="'.$empid.'" name="Data1">';
			echo '<td align="center" style="background-color:white; width:60px;" ><a style="width:60; height:24" href="view_trainings.php?train='.$trainid.'&empid='.$empid.'" "><img src="../images/view.png"/ BORDER=0 HEIGHT=24 WIDTH=44></a></td>';
		}

?>
</table>
<input name="submit" type="submit" value="Delete Participants" id="Add Participants" class="smart-green button buttonsize middle" disabled onClick="return confirm('Are you sure?')"></input>
</form>
<script>
EnableSubmit = function(val)
{
    var sbmt = document.getElementById("Add Participants");

    if (val.checked == true)
    {
        sbmt.disabled = false;

    }
    else
    {
        sbmt.disabled = true;
    }
}   
</script>


</html>