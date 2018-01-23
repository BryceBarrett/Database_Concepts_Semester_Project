<?php
include "menu.php";
?>
<h2>Teams</h2>
<table border=1>
<tr>
<th>Name</th>
<th>Manager</th>
<th>Owner</th>
<th>League</th>
<th>Country</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from Teams";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['manager'] . '</td>';
  echo '<td>' . $row['owner'] . '</td>';
  echo '<td>' . $row['league'] . '</td>';
  echo '<td>' . $row['country'] . '</td>';
  echo "<td><a href='delteamssrv.php?name=" . $row['name'] . "&owner=" . $row['owner'] ."'>Del</a> ";
  echo "<a href='editteamsclt.php?name=" . $row['name'] . "&owner=" . $row['owner'] . "&manager=" . $row['manager'] ."'>Edit</a></td>";
  echo "</tr>";
}
?>
</table>
<a href="addteamsclt.php">Add New</a>