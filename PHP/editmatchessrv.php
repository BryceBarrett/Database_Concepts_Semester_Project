<?php
include "dbconnect.php";
$sql = "update Matches set homeTeam = '" . $_REQUEST["homeTeam"] . "'," .
  "awayTeam = '" .   $_REQUEST["awayTeam"] . "'," .
  "gameDate = '" .   $_REQUEST["gameDate"] . "' where matchID = " .
  $_REQUEST["matchID"] ;



myquery($mysqli,$sql);

?>
<script>
window.location='listmatches.php';
</script>