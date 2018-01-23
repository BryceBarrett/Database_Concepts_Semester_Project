<?php
include "dbconnect.php";
$sql = "insert into Managers (name,age,country,teamName) values('" .
  $_REQUEST["name"] . "','" .
  $_REQUEST["age"] . "','" .
  $_REQUEST["country"] . "','" .
  $_REQUEST["teamName"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listmanagers.php';
</script>