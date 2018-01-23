<?php
include "dbconnect.php";
$sql = "update Players set name = '" . $_REQUEST["name"] . "'," .
  "age = " .   $_REQUEST["age"] . "," . "position = '" .   $_REQUEST["position"] . "'," .
  "country = '" .   $_REQUEST["country"] . "'," .
  "teamName = '" .   $_REQUEST["teamName"] . "' where playerID = " .
  $_REQUEST["playerID"] ;



myquery($mysqli,$sql);

?>
<script>
window.location='listplayers.php';
</script>