<?php
include "dbconnect.php";
$sql = "insert into League (leagueName,numTeams,country) values('" .
  $_REQUEST["leagueName"] . "'," .
  $_REQUEST["numTeams"] . ",'" .
  $_REQUEST["country"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listleagues.php';
</script>