<?php
include "dbconnect.php";
$sql = "insert into Teams (name,manager,owner,league,country) values('" .
  $_REQUEST["name"] . "','" .
  $_REQUEST["manager"] . "','" .
  $_REQUEST["owner"] . "','" .
  $_REQUEST["league"] . "','" .
  $_REQUEST["country"] . "')";

myquery($mysqli,$sql);

?>
<script>
window.location='listteams.php';
</script>