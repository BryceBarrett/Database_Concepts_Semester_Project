<?php
include "dbconnect.php";
$sql = "insert into Matches (homeTeam, awayTeam, gameDate) values('" .
  $_REQUEST["homeTeam"] . "','" .
  $_REQUEST["awayTeam"] . "','" .
  $_REQUEST["gameDate"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listmatches.php';
</script>