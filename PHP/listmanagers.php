<?php
include "menu.php";
?>
<h2>Managers</h2>
<table border=1>
<tr>
<th>ManagerID</th>
<th>Name</th>
<th>Age</th>
<th>Country</th>
<th>Team</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from Managers";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['manID'] . '</td>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['age'] . '</td>';
  echo '<td>' . $row['country'] . '</td>';
  echo '<td>' . $row['teamName'] . '</td>';
  echo "<td><a href='delmanagerssrv.php?manID=" . $row['manID'] ."'>Del</a> ";
  echo "<a href='editmanagersclt.php?manID=" . $row['manID'] ."'>Edit</a></td>";
  echo "</tr>";
}
?>
</table>
<a href="addmanagersclt.php">Add New</a>