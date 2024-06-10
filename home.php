<!DOCTYPE html PUBLIC>
<html class="admin">
<head>
<link rel="SHORTCUT ICON" type="image/x-icon" href="images/url.bmp" />
<link rel="stylesheet"  type="text/css" href="css/style.css"/>
</head>

<?php 
include('check.php');
?>
<script type="text/javascript">
function appear(){
	var nav = document.getElementById('navigation');
	nav.style.display="block";
}
function hide(){
	var nav = document.getElementById('navigation');
	nav.style.display="none";
}

</script>
<body class="homead"><!--background="images/bg-tile.gif"><!-- onLoad="alert('Hello <?php// echo $_SESSION['user_details']; ?>!');" onUnload="alert('Goodbye <?php// echo $_SESSION['user_details']; ?>! Have a nice Day!');"> -->
<center>
<div id="supercontainer" >
<?php
while($row=mysql_fetch_array($rsql))
	{
	
	$lname =  $row['LN'];
	$fname =  $row['FN'];
	$mname =  $row['MN'];
		$complete =  $lname.', '.$fname.' '.$mname;
		$complete2 =  $fname.' '.$mname.' '.$lname;
		$name = ucwords($complete);
		$name2 = ucwords($complete2);
	}
?>
<title><?php echo $name2;?></title>
<table class="tableadmin1" align="center" cellspacing="0" cellpadding="0"  bordercolor="#EEE" hspace="0" bgcolor="#FFFFFF">

	<td height="32">
		<table width="100%" border="1" style="border:1px solid orange; 	border-radius: 10px; ">
			<tr>
				<td width="250" align="center">
				<?php  echo '<b>'.$name.'</b>'; ?>
			    </td>
                              	<td colspan="1" align="center">
                                	<embed src="images/fsdba.swf" quality='high' width='106' height='26' >

                                </td>
                                <td colspan="1" align="center">
                                	
                                    <font size="-1">
                                    <?php
                        				echo date('F j, Y');
                        			?>
                                    </font>
                                </td>
			<td colspan=2 align="center">
					<?php echo '<i><a href="accounts/chpw.php?'.session_id().'=change?" id="change" target="adminframe">Change Password</a></i>';?>
				</td>	
			    <td align="center">
				<?php echo '<a href="logout.php?'.session_id().'?session_terminate=(1)" id="logout" target="_parent">Logout</a>'; ?>
			    </td>
			
				
			</tr>
		</table>
	</td>
  </tr>
  <tr>
  <td valign="middle" height="140">
  <?php include('banner.php'); ?>	
  </td>
  </tr>
  <tr>
  <td height="28">
  <table border="1" class="menu" width='1000' style="border:1px solid orange;">

  <?php
	
 	if($_SESSION['type']=="admin"){
	
	echo '<tr><td class="buttons" align="center" width="25%">
	<div id="button1" onmouseout="hide();" onmouseover="appear();"><b>Accounts Management</b>
	<div id="navigation">
	<a href="accounts/mgmt.php?'.session_id().'?Employee=New/" target="adminframe">Add User</a>
	<a href="accounts/edit_users.php?'.session_id().'?Employee=Old/" target="adminframe"">Edit User</a>
	<a href="accounts/edit_employee.php?'.session_id().'?Employee=Old/" target="adminframe"">Delete Employee/s</a>
	</div>
	</div></td>';
	}
	if($_SESSION['type']=="hra"){
	
	echo '<tr><td class="buttons" align="center" width="25%"><a class="button" href="trainings/AllTrainings2.php?'.session_id().'" target="adminframe">List of All Trainings</a></td>';

	echo '<td class="buttons" align="center" width="25%"><a class="button" href="notifications.php?p=1&'.session_id().'&training/new/" target="adminframe">Training Approvals</a></td>';

	echo '<td class="buttons" align="center" width="25%"><a class="button" href="Employee_approve.php?p=1&'.session_id().'&training/new/" target="adminframe">Employee Approvals</a></td>';
	
	//echo '<td class="buttons" align="center" width="5%"><a class="button" href="uploader.php?p=1&'.session_id().'&training/new/" target="adminframe">Search</a></td>';
	}	
	
	if($_SESSION['type']=="coordinator"){
		
	echo '<tr><td class="buttons" align="center" width="20%"><a class="button" href="trainings/AllTrainings2.php?'.session_id().'viewing?all=trainings/" target="adminframe">List of All Trainings</a></td>';
	
	echo '<td class="buttons" align="center" width="20%"><a class="button" href="trainings/addtraining2.php?p=1&'.session_id().'&training/new/" target="adminframe">Add New Training</a></td>';

  	echo '<td class="buttons" align="center" width="20%"><a class="button" href="notifications.php?p=1&'.session_id().'&notifications=received?" target="adminframe">My Trainings / Notifications</a></td>';
	
	}
	
	if($_SESSION['type']=="hrl"){
	echo '<td class="buttons" align="center" width="20%"><a class="button" href="leaves/add_employee.php?'.session_id().'" target="adminframe">New Employee</a></td>';
	echo '<td class="buttons" align="center" width="20%"><a class="button" href="leaves/employees_list.php?'.session_id().'" target="adminframe">List of  All Employees</a></td>';
	
	
	}
	
  ?>
</table>
</td>
</tr>
  <tr align="center">
  <td>
  <?php
  echo '<iframe id="ifr" name="adminframe" src="mainframe.php?'.session_id().'" width="950" height="800" scrolling="yes" frameborder="0"></iframe>';
  ?>
  </td>
  </tr>

</table>
</div>
</center>
</body>
</html>