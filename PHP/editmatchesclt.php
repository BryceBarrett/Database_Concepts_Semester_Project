<?php
include "dbconnect.php";
$sql = "select * from Matches where matchID = " .  $_REQUEST["matchID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();

?>
<form action="editmatchessrv.php" method="get">
</br>
<input type="hidden" name="matchID" value="<?php echo $_REQUEST['matchID']; ?>"/>

Home Team:<input type="text" name="homeTeam" value="<?php echo $row['homeTeam']; ?>"/></br>
Away Team:<input type="text" name="awayTeam" value="<?php echo $row['awayTeam']; ?>"/></br>
Game Date:<input type="text" name="gameDate" value="<?php echo $row['gameDate']; ?>"/></br>
<input type="submit"/>
</form>