<?php
include "dbconnect.php";
$sql = "update Managers set name = '" . $_REQUEST["name"] . "'," .
  "age = " .   $_REQUEST["age"] . "," .
  "country = '" .   $_REQUEST["country"] . "'," .
  "teamName = '" .   $_REQUEST["teamName"] . "' where manID = " .
  $_REQUEST["manID"] ;



myquery($mysqli,$sql);

?>
<script>
window.location='listmanagers.php';
</script>