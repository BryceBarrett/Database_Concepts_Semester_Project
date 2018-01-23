<?php
include "dbconnect.php";
$sql = "insert into Players (name,age,position,country,teamName) values('" .
  $_REQUEST["name"] . "','" .
  $_REQUEST["age"] . "','" .
  $_REQUEST["position"] . "','" .
  $_REQUEST["country"] . "','" .
  $_REQUEST["teamName"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listplayers.php';
</script>