<?php
include "dbconnect.php";
$sql = "delete from Matches where matchID = " .  $_REQUEST["matchID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='listmatches.php';
</script>