<body bgcolor="FFFFFF"><?php include('../logs.php'); 
$_SESSION['today'] = date('Y-m-j');
session_start();
	echo '<form id="form1" name="form1" method="post" action="cp.php?'.session_id().'">';
?>
<table width="300" border="0" align="center">
  <tr>
    <td>Current Password:</td>
    <td>
      <label for="curpwd"></label>
      <input name="curpwd" type="password" id="curpwd" maxlength="16" />
    </td>
  </tr>
  <tr>
    <td>New Password:</td>
    <td>
      <label for="newpassword"></label>
      <input name="newpassword" type="password" id="newpassword" maxlength="16" />
    </td>
  </tr>
  <tr>
    <td>Confirm New Password:</td>
    <td>
      <label for="connewpassword"></label>
      <input name="connewpassword" type="password" id="connewpassword" maxlength="16" />
    </td>
  </tr>
  <tr>
  	<td colspan="2" align="center"><input name="submit"  onClick="return confirm('Are you sure?')"  type="submit" value="change password" /></td>
  </tr>
</table>
</form>