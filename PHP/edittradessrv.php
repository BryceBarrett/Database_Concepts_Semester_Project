<?php
include "dbconnect.php";
$sql = "update Trades set playerName = '" . $_REQUEST["playerName"] . "'," .
  "dateTraded = '" .   $_REQUEST["dateTraded"] . "'," . "teamFrom = '" .   $_REQUEST["teamFrom"] . "'," .
  "teamTo = '" .   $_REQUEST["teamTo"] . "' where tradeNum = " .
  $_REQUEST["tradeNum"] ;



myquery($mysqli,$sql);

?>
<script>
window.location='listtrades.php';
</script>