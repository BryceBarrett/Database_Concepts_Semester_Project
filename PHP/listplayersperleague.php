<?php
include "menu.php";
?>
<h2>Current Players per League</h2>
<table border=1>
<tr>
<th>League Name</th>
<th>Number of Players</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from numPlayersperLeague";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['leagueName'] . '</td>';
  echo '<td>' . $row['playersCount'] . '</td>';

}
?>
</table>