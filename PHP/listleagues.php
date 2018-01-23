<?php
include "menu.php";
?>
<h2>Leagues</h2>
<table border=1>
<tr>
<th>Name</th>
<th>Number of Teams</th>
<th>Country</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from League";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['leagueName'] . '</td>';
  echo '<td>' . $row['numTeams'] . '</td>';
  echo '<td>' . $row['country'] . '</td>';
  echo "<td><a href='delleaguessrv.php?leagueName=" . $row['leagueName'] . "&country=" . $row['country'] ."'>Del</a> ";
  echo "<a href='editleaguesclt.php?leagueName=" . $row['leagueName'] . "&numTeams=" . $row['numTeams'] ."'>Edit</a></td>";
  echo "</tr>";
}
?>
</table>
<a href="addleaguesclt.php">Add New</a>