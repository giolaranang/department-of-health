<html class="alltrainings1 smart-green center">
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css"/>
</head>
<h5 id="tight">Add Participants Button is Disabled when no one is selected.</h5>
<h5 id="tight">Participants already added will have their check buttons disabled.</h5>
<h5 id="tight">Participants already in a training at the given dates have their check buttons disabled.</h5>
<table width="650" align='center' border='0' bgcolor="">
<tr bgcolor="#CCC">
<td width="150" align="center"><b>Name</td>
<td width="120" align="center"><b>Designation</td>
<td width="90" align="center" style="background-color:#FF6666;"><b>Add as Participant</td>
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
<form method="post" action="add_participants_exec.php">
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

					
;		}
		echo '<input type="hidden" value="'.$trainid.'" name="train">';
	

$sql200="SELECT * FROM training_pax WHERE empid='$empid' AND TR_ID = '$trid'";
$rsql200=mysql_query($sql200);


			echo '<tr style="background-color:white";" valign=top>';	
			echo '<td style="background-color:#D9F0FF; text-align:left; padding-top:3px; padding-left:3px;">'.$name.'</td>';
			echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$br.'</td>';
			//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$empid.'</td>';
	if(mysql_num_rows($rsql200)>0){
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" disabled></td>';
		}else {
			//echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" //name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)"></td>';
		$count=0;
		$county=0;
		$train_array=null;
		$checkyear=0;
			$employee_training="SELECT f.TR_ID FROM training_gi f INNER JOIN training_pax t INNER JOIN employees e ON e.empid=t.empid AND f.TR_ID=t.TR_ID where  e.empid='$empid'";
			
			$trainings=mysql_query($employee_training);

			while($t_row=mysql_fetch_array($trainings)){
				$train_array[$count]=$t_row['TR_ID'];
				$count++;
			}
			for ($i = 0; $i < count($train_array); $i++){
 		 //echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$train_array[$i].'</td>';
 		 $half="SELECT g.FR_MONTH,g.FR_DAY,g.TO_MONTH,g.TO_DAY,g.TO_YEAR FROM training_gi g INNER JOIN training_pax t INNER JOIN 		employees e ON e.empid=t.empid AND g.TR_ID=t.TR_ID where g.TR_ID in($train_array[$i])";
 		 $half1=mysql_query($half);
 		 while($row31=mysql_fetch_array($half1)){
 		 	$fmonth_array[0]=$row31['FR_MONTH'];
 		 	$tmonth_array[0]=$row31['TO_MONTH'];
 		 	$fday_array[0]=$row31['FR_DAY'];
 		 	$tday_array[0]=$row31['TO_DAY'];
 		 	$year_array[0]=$row31['TO_YEAR'];
 		 }
 		 for ($m = 0; $m < count($year_array); $m++){
 		//$fr_month2
		//$fr_day2
		//$to_month2
		//$to_day2
		//$to_year2
		//($fr_day<=$to_day2 || $to_day>=$fr_day2)
 		 	//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$fmonth_array[$m].'</td>';
 		 	//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$tmonth_array[$m].'</td>';
 		 	//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$fday_array[$m].'</td>';
 		 	//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$tday_array[$m].'</td>';
 		 	//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$year_array[$m].'</td>';
 		 }
 		if(in_array($to_year2,$year_array)){
 			if ((in_array($fr_month2,$fmonth_array)) || (in_array($to_month2,$tmonth_array))){
 				if((in_array($fr_day2,$fday_array)) || (in_array($to_day2,$tday_array))){
 					$checkyear=1;
 				}else{
 					 for ($m = 0; $m < count($tday_array); $m++){
					for ($m = 0; $m < count($fday_array); $m++){
						if($fr_day2<$tday_array[$m] && $to_day2>$fday_array[$m]){
 					 		$checkyear=1;
 					 	}else{
 					 		$checkyear=0;
 					 	}
}

 					 }


 				}
 			}else{
 for ($m = 0; $m < count($tmonth_array); $m++){
					for ($m = 0; $m < count($fmonth_array); $m++){
 if($fr_month2<$tmonth_array[$m] && $to_month2>$fmonth_array[$m]){
 	 	$checkyear=1;
 }else{
 	$checkyear=0;
 }
}
}
 }




}else{
		$checkyear=0;
}	
/*
	if($fr_month=$fr_month2 || $to_month=$to_month2 ){
		if($fr_day=$fr_day2 || $to_day=$to_day2){
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" disabled></td>';
		}else if($fr_day<=$to_day2 || $to_day>=$fr_day2){
		echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" disabled></td>';
		}else{
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)"></td>';
		}
	}

*/
 		}
 		if ($checkyear==1)
 		 {
 		 	echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" disabled></td>';
 		 }else if ($checkyear==0)
 		 {
 		 		echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" ></td>';
 		 }	
 		}
 		 
		//	while($row2=mysql_fetch_array($one2)){
		//	$tridd[]=$row2['TR_ID'];
		//	$bb=array();
		//	$bb=array_unique($tridd);
		//	foreach ($bb as $aa){
//
//			echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$aa.'</td>';	
//			}
				
//if (empty($tridd)){
//	echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" //name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)"></td>';
//}else{
			/*foreach($tridd as $tayid){
					$half="SELECT g.FR_MONTH,g.FR_DAY,g.TO_MONTH,g.TO_DAY,g.TO_YEAR FROM training_gi g INNER JOIN training_pax t INNER JOIN employees e ON e.empid=t.empid AND g.TR_ID=t.TR_ID where g.TR_ID='$tayid'";
					$half1=mysql_query($half);
					while($row31=mysql_fetch_array($half1)){
						$fr_month4[]=$row31['FR_MONTH'];
						$fr_day4[]=$row31['FR_DAY'];
						$to_month4[]=$row31['TO_MONTH'];
						$to_day4[]=$row31['TO_DAY'];
						$to_year4[]=$row31['TO_YEAR'];
						//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.$to_year4.'</td>';
					}
			}*/
//		}
//}
				

	
	
	//echo '<td style="background-color:#D9F0FF; text-align:center; padding-top:3px;">'.implode(',',$aa).'</td>';
/*
//if employee has no trainings
if(empty($idss)){
		echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)"></td>';
}else{
	//previous trainings of employees who has trainings
	$half="SELECT g.FR_MONTH,g.FR_DAY,g.TO_MONTH,g.TO_DAY,g.TO_YEAR FROM training_gi g INNER JOIN training_pax t INNER JOIN employees e ON e.empid=t.empid AND g.TR_ID=t.TR_ID where g.TR_ID=(SELECT f.TR_ID FROM training_gi f INNER JOIN training_pax t INNER JOIN employees e ON e.empid=t.empid AND f.TR_ID=t.TR_ID where  e.empid='$empid')";
		$half1=mysql_query($half);
		while($row2=mysql_fetch_array($half1)){
		$fr_month=$row2['FR_MONTH'];
		$fr_day=$row2['FR_DAY'];
		$to_month=$row2['TO_MONTH'];
		$to_day=$row2['TO_DAY'];
		$to_year=$row2['TO_YEAR'];
}

//algorithm
 if($to_year=$to_year2){
	if($fr_month=$fr_month2 || $to_month=$to_month2 ){
		if($fr_day=$fr_day2 || $to_day=$to_day2){
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" disabled></td>';
		}else if($fr_day<=$to_day2 || $to_day>=$fr_day2){
		echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)" disabled></td>';
		}else{
			echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)"></td>';
		}
	}

}else{
		echo '<td style="background-color:#FFEDCA; text-align:center; border:1px solid #CCCCCC;"><input type="checkbox" name="addme[]" value="'.$empid.'" class="center fit" onClick="EnableSubmit(this)"></td>';
}	
	



}
	
//end of algorithm	
*/
		
			echo'<input type="hidden" value="'.$empid.'" name="Data1">';
			echo '<td align="center" style="background-color:white; width:60px;" ><a style="width:60; height:24" href="view_trainings.php?train='.$trainid.'&empid='.$empid.'" "><img src="../images/view.png"/ BORDER=0 HEIGHT=24 WIDTH=44></a></td>';
		}

?>
</table>
<input name="submit" type="submit" value="Add Participants" id="Add Participants" class="smart-green button buttonsize middle" disabled onClick="return confirm('Are you sure?')" ></input>
</form>
<hr>
<form method="post" action="manual_add.php">
<?php
$trid = $_GET['TR_ID'];
echo'<input type="hidden" value="'.$trid.'" name="DDD">';
?>
<input name="submit" type="submit" value="Add Participants Manually" id="Add Participants Manually" class="smart-green button buttonsize middle"></input>
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