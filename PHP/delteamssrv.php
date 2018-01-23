<?php
include "dbconnect.php";
$sql = "delete from Teams where name = '" .  $_REQUEST["name"] . "' and owner = '" . $_REQUEST["owner"] . "'";

myquery($mysqli,$sql);

?>
<script>
window.location='listteams.php';
</script>