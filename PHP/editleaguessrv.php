<?php
include "dbconnect.php";
$sql = "update League set leagueName = '" . $_REQUEST["leagueName"] . "'," .
  "numTeams = " .   $_REQUEST["numTeams"] . "," .
  "country = '" .   $_REQUEST["country"] . "' where leagueName = '" .
  $_REQUEST["leagueName"] . "'";



myquery($mysqli,$sql);

?>
<script>
window.location='listleagues.php';
</script>