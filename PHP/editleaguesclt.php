<?php
include "dbconnect.php";
$sql = "select * from League where leagueName = '" .  $_REQUEST["leagueName"] ."'";

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();

?>
<form action="editleaguessrv.php" method="get">
</br>


Name:<input type="text" name="leagueName" value="<?php echo $row['leagueName']; ?>"/></br>
Number of Teams:<input type="text" name="numTeams" value="<?php echo $row['numTeams']; ?>"/></br>
Country:<input type="text" name="country" value="<?php echo $row['country']; ?>"/></br>
<input type="submit"/>
</form>