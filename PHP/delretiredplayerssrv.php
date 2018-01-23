<?php
include "dbconnect.php";
$sql = "delete from RetiredPlayers where playerID = " .  $_REQUEST["playerID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='listretiredplayers.php';
</script>