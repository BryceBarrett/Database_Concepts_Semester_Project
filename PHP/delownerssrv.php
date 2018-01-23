<?php
include "dbconnect.php";
$sql = "delete from Owners where ownerID = " .  $_REQUEST["ownerID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='listowners.php';
</script>