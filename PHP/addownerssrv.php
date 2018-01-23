<?php
include "dbconnect.php";
$sql = "insert into Owners (ownerName,netWorth,teamName,yearBought,teamOwnedLen) values('" .
  $_REQUEST["ownerName"] . "','" .
  $_REQUEST["netWorth"] . "','" .
  $_REQUEST["teamName"] . "','" .
  $_REQUEST["yearBought"] . "','" .
  $_REQUEST["teamOwnedLen"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listowners.php';
</script>