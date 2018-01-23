<?php
include "menu.php";
?>
<h2>Current Teams per League</h2>
<table border=1>
<tr>
<th>League Name</th>
<th>Number of Teams</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from numTeamsinLeague";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['leagueName'] . '</td>';
  echo '<td>' . $row['teamsCount'] . '</td>';

}
?>
</table>