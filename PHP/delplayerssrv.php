<?php
include "dbconnect.php";
$sql = "delete from Players where playerID = " .  $_REQUEST["playerID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='listplayers.php';
</script>