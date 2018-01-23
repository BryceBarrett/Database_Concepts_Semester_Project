<?php
include "dbconnect.php";
$sql = "update Teams set name = '" . $_REQUEST["name"] . "'," .
  "manager = '" .   $_REQUEST["manager"] . "'," . "owner = '" .   $_REQUEST["owner"] . "'," .
  "league = '" .   $_REQUEST["league"] . "'," .
  "country = '" .   $_REQUEST["country"] . "' where name = '" .
  $_REQUEST["name"] . "' and 1=1";



myquery($mysqli,$sql);

?>
<script>
window.location='listteams.php';
</script>