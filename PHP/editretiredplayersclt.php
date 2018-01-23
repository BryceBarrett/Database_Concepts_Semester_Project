<?php
include "dbconnect.php";
$sql = "select * from RetiredPlayers where playerID = " .  $_REQUEST["playerID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();

?>
<form action="editretiredplayerssrv.php" method="get">
</br>
<input type="hidden" name="playerID" value="<?php echo $_REQUEST['playerID']; ?>"/>

Name:<input type="text" name="playerName" value="<?php echo $row['playerName']; ?>"/></br>
Age Retired:<input type="text" name="ageRetired" value="<?php echo $row['ageRetired']; ?>"/></br>
Position:<input type="text" name="position" value="<?php echo $row['position']; ?>"/></br>
Country:<input type="text" name="country" value="<?php echo $row['country']; ?>"/></br>
Team:<input type="text" name="teamName" value="<?php echo $row['teamName']; ?>"/></br>
<input type="submit"/>
</form>