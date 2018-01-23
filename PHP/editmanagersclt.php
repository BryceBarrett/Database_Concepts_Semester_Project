<?php
include "dbconnect.php";
$sql = "select * from Managers where manID = " .  $_REQUEST["manID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();

?>
<form action="editmanagerssrv.php" method="get">
</br>
<input type="hidden" name="manID" value="<?php echo $_REQUEST['manID']; ?>"/>

Name:<input type="text" name="name" value="<?php echo $row['name']; ?>"/></br>
Age:<input type="text" name="age" value="<?php echo $row['age']; ?>"/></br>
Country:<input type="text" name="country" value="<?php echo $row['country']; ?>"/></br>
Team:<input type="text" name="teamName" value="<?php echo $row['teamName']; ?>"/></br>
<input type="submit"/>
</form>