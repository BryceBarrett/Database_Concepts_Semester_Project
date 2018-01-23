<?php
include "dbconnect.php";
$sql = "delete from Managers where manID = " .  $_REQUEST["manID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='listmanagers.php';
</script>