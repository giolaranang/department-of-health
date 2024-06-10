<?php include('../check.php');include('../logs.php');$_SESSION['today'] = date('Y-m-j');
//querys all accounts
$sql = "SELECT * FROM `user` ORDER BY `type` desc, `username` asc";
$rsql = mysql_query($sql);
while($row = mysql_fetch_array($rsql)){
	//this code is for the deletion of accounts..
	if($row['username']!=$_SESSION['username']){
		$b=true;
		for($i = 0; $i < count($_POST['delete']); $i++){
			if($_POST['delete'][$i]==$row['username']){
				$sql = "DELETE from `user` WHERE `username` = '".$row['username']."'";
				mysql_query($sql);
				__logs($_POST['delete'][$i]. " account deleted.");
				$b = false;
				break;
			}
		}
		if($b){
			//$sql = "UPDATE `user` SET `status` = 0 WHERE `username` = '".$row['username']."'";
			//mysql_query($sql);
		}
	}
}
echo "<script language='javascript'>self.location='delete.php';</script>";
?>