<?php
include "dbconnect.php";
$sql = "delete from League where leagueName = '" .  $_REQUEST["leagueName"] . "' and country = '" . $_REQUEST["country"] . "'";

myquery($mysqli,$sql);

?>
<script>
window.location='listleagues.php';
</script>