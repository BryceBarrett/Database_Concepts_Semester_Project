<?php
include "dbconnect.php";
$sql = "select * from Owners where ownerID = " .  $_REQUEST["ownerID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();

?>
<form action="editownerssrv.php" method="get">
</br>
<input type="hidden" name="ownerID" value="<?php echo $_REQUEST['ownerID']; ?>"/>

Name:<input type="text" name="ownerName" value="<?php echo $row['ownerName']; ?>"/></br>
Networth:<input type="text" name="netWorth" value="<?php echo $row['netWorth']; ?>"/></br>
Team Name:<input type="text" name="teamName" value="<?php echo $row['teamName']; ?>"/></br>
Years of Ownership:<input type="text" name="teamOwnedLen" value="<?php echo $row['teamOwnedLen']; ?>"/></br>
Date Purchased:<input type="text" name="yearBought" value="<?php echo $row['yearBought']; ?>"/></br>
<input type="submit"/>
</form>