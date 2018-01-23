<?php
include "dbconnect.php";
$sql = "select * from Trades where tradeNum = " .  $_REQUEST["tradeNum"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();

?>
<form action="edittradessrv.php" method="get">
</br>
<input type="hidden" name="tradeNum" value="<?php echo $_REQUEST['tradeNum']; ?>"/>

Name:<input type="text" name="playerName" value="<?php echo $row['playerName']; ?>"/></br>
Date Traded:<input type="text" name="dateTraded" value="<?php echo $row['dateTraded']; ?>"/></br>
Traded From Team:<input type="text" name="teamFrom" value="<?php echo $row['teamFrom']; ?>"/></br>
Traded To Team:<input type="text" name="teamTo" value="<?php echo $row['teamTo']; ?>"/></br>
<input type="submit"/>
</form>