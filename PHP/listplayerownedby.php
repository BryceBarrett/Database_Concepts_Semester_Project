<?php
include "menu.php";
?>
<h2>Player Owners</h2>
<table border=1>
<tr>
<th>Player Name</th>
<th>Owned By</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from playersOwnedBy";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['playerName'] . '</td>';
  echo '<td>' . $row['ownedBy'] . '</td>';
}
?>
</table>