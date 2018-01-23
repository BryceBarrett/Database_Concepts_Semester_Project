<?php
include "dbconnect.php";
$sql = "insert into RetiredPlayers (playerName,ageRetired,position,country,teamName) values('" .
  $_REQUEST["playerName"] . "','" .
  $_REQUEST["ageRetired"] . "','" .
  $_REQUEST["position"] . "','" .
  $_REQUEST["country"] . "','" .
  $_REQUEST["teamName"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listretiredplayers.php';
</script>