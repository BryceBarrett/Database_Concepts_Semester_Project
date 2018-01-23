<?php
include "dbconnect.php";
$sql = "insert into Trades (playerName,dateTraded,teamFrom,teamTo) values('" .
  $_REQUEST["playerName"] . "','" .
  $_REQUEST["dateTraded"] . "','" .
  $_REQUEST["teamFrom"] . "','" .
  $_REQUEST["teamTo"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listtrades.php';
</script>