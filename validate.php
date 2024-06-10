<title>Validating..</title>
<?php
session_start();
unset($_SESSION['logout']);
include 'databaseConnection.php';
?>

<script> self.location='home2.php?".session_id()."';</script>