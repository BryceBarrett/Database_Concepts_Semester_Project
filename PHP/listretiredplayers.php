<?php
include "menu.php";
?>
<h2>Retired Players</h2>
<table border=1>
<tr>
<th>PlayerID</th>
<th>Name</th>
<th>Age Retired</th>
<th>Position</th>
<th>Country</th>
<th>Team</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from RetiredPlayers";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['playerID'] . '</td>';
  echo '<td>' . $row['playerName'] . '</td>';
  echo '<td>' . $row['ageRetired'] . '</td>';
  echo '<td>' . $row['position'] . '</td>';
  echo '<td>' . $row['country'] . '</td>';
  echo '<td>' . $row['teamName'] . '</td>';
  echo "<td><a href='delretiredplayerssrv.php?playerID=" . $row['playerID'] ."'>Del</a> ";
  echo "<a href='editretiredplayersclt.php?playerID=" . $row['playerID'] ."'>Edit</a></td>";
  echo "</tr>";
}
?>
</table>
<a href="addretiredplayersclt.php">Add New</a>