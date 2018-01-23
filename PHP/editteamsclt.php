<?php
include "dbconnect.php";
$sql = "select * from Teams where name = '" .  $_REQUEST["name"] . "' and 1=1";

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();

?>
<form action="editteamssrv.php" method="get">
</br>

Name:<input type="text" name="name" value="<?php echo $row['name']; ?>"/></br>
Manager:<input type="text" name="manager" value="<?php echo $row['manager']; ?>"/></br>
Owner:<input type="text" name="owner" value="<?php echo $row['owner']; ?>"/></br>
League:<input type="text" name="league" value="<?php echo $row['league']; ?>"/></br>
Country:<input type="text" name="country" value="<?php echo $row['country']; ?>"/></br>
<input type="submit"/>
</form>