<?php
include "dbconnect.php";
$sql = "update RetiredPlayers set playerName = '" . $_REQUEST["playerName"] . "'," .
  "ageRetired = " .   $_REQUEST["ageRetired"] . "," . "position = '" .   $_REQUEST["position"] . "'," .
  "country = '" .   $_REQUEST["country"] . "'," .
  "teamName = '" .   $_REQUEST["teamName"] . "' where playerID = " .
  $_REQUEST["playerID"] ;



myquery($mysqli,$sql);

?>
<script>
window.location='listretiredplayers.php';
</script>