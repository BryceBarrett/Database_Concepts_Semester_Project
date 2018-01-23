<?php
include "dbconnect.php";
$sql = "update Owners set ownerName = '" . $_REQUEST["ownerName"] . "'," .
  "netWorth = " .   $_REQUEST["netWorth"] . "," . "teamName = '" .   $_REQUEST["teamName"] . "'," .
  "teamOwnedLen = " .   $_REQUEST["teamOwnedLen"] . "," .
  "yearBought = '" .   $_REQUEST["yearBought"] . "' where ownerID = " .
  $_REQUEST["ownerID"] ;



myquery($mysqli,$sql);

?>
<script>
window.location='listowners.php';
</script>