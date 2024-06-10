<?php include('../check.php');?>
<script>
pw = prompt("Verify Password to Proceed:\n\nAdded one month last : <?php echo date('M j, Y'); ?>")
location.href="authenticate2.php?ResultPass=" + pw;
</script>