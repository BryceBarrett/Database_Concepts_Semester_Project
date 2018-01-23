<?php
include "menu.php";
?>
<h2>Matches</h2>
<table border=1>
<tr>
<th>MatchID</th>
<th>Home Team</th>
<th>Away Team</th>
<th>Date of Event</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from Matches";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['matchID'] . '</td>';
  echo '<td>' . $row['homeTeam'] . '</td>';
  echo '<td>' . $row['awayTeam'] . '</td>';
  echo '<td>' . $row['gameDate'] . '</td>';
  echo "<td><a href='delmatchessrv.php?matchID=" . $row['matchID'] ."'>Del</a> ";
  echo "<a href='editmatchesclt.php?matchID=" . $row['matchID'] ."'>Edit</a></td>";
  echo "</tr>";
}
?>
</table>
<a href="addmatchesclt.php">Add New</a>