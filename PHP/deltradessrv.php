<?php
include "dbconnect.php";
$sql = "delete from Trades where tradeNum = " .  $_REQUEST["tradeNum"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='listtrades.php';
</script>