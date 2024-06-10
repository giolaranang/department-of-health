<!DOCTYPE html PUBLIC>
<html class="admin">
<head>
<link rel="SHORTCUT ICON" type="image/x-icon" href="images/url.bmp" />
<link rel="stylesheet"  type="text/css" href="css/style.css"/>
</head>

<?php 
include('leaves/check.php');
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
<!--<link rel=stylesheet href="css/frameset.css" type="text/css">-->
<body class="homead"><!--background="images/bg-tile.gif"><!-- onLoad="alert('Hello <?php// echo $_SESSION['user_details']; ?>!');" onUnload="alert('Goodbye <?php// echo $_SESSION['user_details']; ?>! Have a nice Day!');"> -->
<center>
<div id="supercontainer" >

<?php
   // FOR EXPANSION

   	//echo '<td class="buttons" align="center" width="25%"><a class="button" href="http://www.yahoo.com" target="_new">My Trainings / Notifications</a></td>';
/*
echo '
<div id="navs_container">
	<div id="navs"><a class="button" href="http://192.168.227.85/odtis/login.php" target="_new">ODTIS Log-in</a></div>
</div>';

 put inside div
	<div id="navs"><a class="button" href="expansion/expansion1.php?'.session_id().'ref=accounts?" target="adminframe">NAV TEST1</a></div>
	<div id="navs"><a class="button" href="expansion/expansion1.php?'.session_id().'ref=accounts?" target="adminframe">NAV TEST2</a></div>
	<div id="navs"><a class="button" href="expansion/expansion1.php?'.session_id().'ref=accounts?" target="adminframe">NAV TEST3</a></div>
*/
?>	

<?php

?>
<title><?php echo $name2;?></title>
<table class="tableadmin1" align="center" cellspacing="0" cellpadding="0"  bordercolor="#EEE" hspace="0" bgcolor="#FFFFFF">

	<td height="32">
		<table width="100%" border="1" style="border:1px solid orange;">
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
					<?php echo '<i><a href="leaves/chpw.php?'.session_id().'=change?" target="adminframe">Change Password</a></i>';?>
				</td>	
			    <td align="center">
				<?php echo '<a href="logout.php?'.session_id().'?session_terminate=(1)" target="_parent">Logout</a>'; ?>
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
	
	echo '<td class="buttons" align="center" width="20%"><a class="button" href="leaves/AllTrainings.php?'.session_id().'" target="adminframe">All Trainings</a></td>';
	echo '<td class="buttons" align="center" width="20%"><a class="button" href="leaves/employees_list.php?'.session_id().'" target="adminframe">My trainings</a></td>';
	
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