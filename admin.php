<title>DOH Trainings</title>
<?php 
include('check.php');?>
<style>
body{
	background-image:url(images/bg-gradient.gif);
	background-repeat:repeat-x;
}
.menu{
	border-collapse:collapse;
}
.buttons{
	background-image:url(images/buttons.jpg);
}
.buttons:hover{
	background-color:#c8c8c8;
	background-image:none;
}
a.button:link{
	text-decoration:none;
	font-weight:bold;
	color:#000;
}
a.button:visited{
	text-decoration:none;
	font-weight:bold;
	color:#000;
}
a.button:hover{
	text-decoration:underline;
	font-weight:bold;
}
a.button:active{
	text-decoration:underline;
	font-weight:bold;
	color:#FFF;
}
</style>
<!--<link rel=stylesheet href="css/frameset.css" type="text/css">-->
<body bgcolor="#FFFFFF"><!--background="images/bg-tile.gif"><!-- onLoad="alert('Hello <?php// echo $_SESSION['user_details']; ?>!');" onUnload="alert('Goodbye <?php// echo $_SESSION['user_details']; ?>! Have a nice Day!');"> -->
<center>

<table width="800" height="100%" align="center" cellspacing="0" cellpadding="0" border="1" bordercolor="#EEEEEE" hspace="0" bgcolor="#FFFFFF">
  <tr>
	<td height="32">
		<table width="100%" border="1">
			<tr>
				<td width="250">
				<?php  echo 'Logged in as, '.$_SESSION['username']; ?>
			    </td>
                              	<td colspan="1">
                                	<embed src="images/fsdba.swf" quality='high' width='106' height='26' >

                                </td>
                                <td colspan="1">
                                	
                                    <font size="-1">
                                    <?php
                        				echo date('l, F j Y');
                        			?>
                                    
                                    
                                    </font>
                                </td>
			<td colspan=2 align="right">
					<i><a href="accounts/chpw.php?'.session_id().'" target="adminframe">Change Password</a></i>
				</td>	
			    <td>
				<a href="logout.php?'.session_id().'" target="_parent">Logout</a>
			    </td>
			
				
			</tr>
		</table>
	</td>
  </tr>
  <tr>
  <td valign="middle" height="140">
  <?php// include('banner.php'); ?>
  	
	
  </td>
  </tr>
  <tr>
  <td height="28">
  <table border="1" class="menu" width=800>

  <?php
 /* 	if($_SESSION['type']=="superuser"){
	echo '<tr><td class="buttons" align="center" width="25%"><a class="button" href="order.php?'.session_id().'" target="adminframe">Documents</a></td>';
	
  	echo '<td class="buttons" align="center" width="25%"><a class="button" href="person.php?p=1&'.session_id().'&letter=all" target="adminframe">Persons</a></td>';
	
  	echo '<td class="buttons" align="center" width="25%"><a class="button" href="accounts/settings.php?'.session_id().'" target="adminframe">Accounts</a></td>';
	echo '<td class="buttons" align="center" width="25%"><a class="button" href="logs_window.php?'.session_id().'" target="adminframe">Logs</a></td>';
	}else{
	echo '<tr><td class="buttons" align="center" width="50%"><a class="button" href="order.php?'.session_id().'" target="adminframe">Documents</a></td>';
	
  	echo '<td class="buttons" align="center" width="50%"><a class="button" href="person.php?p=1&'.session_id().'&letter=all" target="adminframe">Persons</a></td>';
	echo '</tr>';
	}
	*/
  ?>
</table>
</td>
</tr>
  <tr align="center">
  <td>
  <?php
//  echo '<iframe name="adminframe" src="order.php?'.session_id().'" width="790" height="400" scrolling="yes" frameborder="0"></iframe>';
  ?>
  </td>
  </tr>
</table>

</center>
</body>
