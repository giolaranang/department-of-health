	<?php
	include("../check.php");
	include("../logs.php");
	//set day for logs
	$_SESSION['today'] = date('Y-m-j');
	//query to know if username defined is already taken.
	$sql="select * from user where username='".$_POST["username"]."'";
	$rsql=mysql_query($sql);
	__logs("add account name=".$_POST["username"]. " attempt");
	if (mysql_num_rows($rsql)>0){
		echo "<script language='javascript'>alert('Username Already Taken');self.location='addaccount.php?';</script>";
		__logs("add account name=".$_POST["username"]. " failed");
	}else{
		//checks if added account is a superuser or a simple user
		if($_POST['type']=="superuser"){
		//if superuser sets all privilege to 1	
			$sql="Insert into `user` Values('".$_POST['username']."', '".$_POST['password']."', '".$_POST['type']."', ";
		//checks if the account will be enabled or disabled	
			if(isset($_POST['status'])){
				if($_POST['status']==1){
				$sql=$sql."1, '".$_POST['user_details']."', 1, 1, 1, 1, 1, 1, 1)";
				}else{
				$sql=$sql."0, '".$_POST['user_details']."', 1, 1, 1, 1, 1, 1, 1)";
				}
			}else{
			$sql=$sql."0, '".$_POST['user_details']."', 1, 1, 1, 1, 1, 1, 1)";
			}
		}else{
		$sql="Insert into `user` Values('".$_POST['username']."', '".$_POST['password']."', '".$_POST['type']."', ";
		//checks if the account will be enabled or disabled for simpleuser
 		if($_POST['status']==1){
			$sql=$sql."1, '".$_POST['user_details']."', ";
		}else{
			$sql=$sql."0, '".$_POST['user_details']."', ";
		}
		//checks if account have 'view_order' privelege
		if(isset($_POST['view_order'])){
			if($_POST['view_order']==1){
				$sql=$sql."1, ";
			}else{
				$sql=$sql."0, ";
			}
		}else{
			$sql=$sql."0, ";
		}
		//checks if account have 'add_order' privelege
		if(isset($_POST['add_order'])){
			if($_POST['add_order']==1){
				$sql=$sql."1, ";
			}else{
				$sql=$sql."0, ";
			}
		}else{
			$sql=$sql."0, ";
		}
		//checks if account have 'edit_order' privelege
		if(isset($_POST['edit_order'])){
			if($_POST['edit_order']==1){
				$sql=$sql."1, ";
			}else{
				$sql=$sql."0, ";
			}
		}else{
			$sql=$sql."0, ";
		}
		//checks if account have 'delete_order' privelege
		if(isset($_POST['delete_order'])){
			if($_POST['delete_order']==1){
				$sql=$sql."1, ";
			}else{
				$sql=$sql."0, ";
			}
		}else{
			$sql=$sql."0, ";
		}
		//checks if account have 'add_person' privelege
		if(isset($_POST['add_person'])){
			if($_POST['add_person']==1){
				$sql=$sql."1, ";
			}else{
				$sql=$sql."0, ";
			}
		}else{
			$sql=$sql."0, ";
		}
		//checks if account have 'edit_person' privelege		
		if(isset($_POST['edit_person'])){
			if($_POST['edit_person']==1){
				$sql=$sql."1, ";
			}else{
				$sql=$sql."0, ";
			}
		}else{
			$sql=$sql."0, ";
		}
		//checks if account have 'delete_person' privelege		
		if(isset($_POST['delete_person'])){
			if($_POST['delete_person']==1){
				$sql=$sql."1)";
			}else{
				$sql=$sql."0)";
			}
		}else{
			$sql=$sql."0)";
		}
		
		}
		//makes the insertion to the database
		mysql_query($sql);
		//creates the log
		__logs("add account name=".$_POST["username"]. " successful");
		//reloads the page to view all accounts
		echo "<script language='javascript'>self.location='viewall.php?';</script>";
	}
	
	?>