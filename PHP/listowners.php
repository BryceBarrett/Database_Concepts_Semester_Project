<?php
include "menu.php";
?>
<h2>Owners</h2>
<table border=1>
<tr>
<th>OwnerID</th>
<th>Name</th>
<th>Networth</th>
<th>Team Name</th>
<th>Years of Ownership</th>
<th>Purchase Date</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from Owners";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['ownerID'] . '</td>';
  echo '<td>' . $row['ownerName'] . '</td>';
  echo '<td>' . $row['netWorth'] . '</td>';
  echo '<td>' . $row['teamName'] . '</td>';
  echo '<td>' . $row['teamOwnedLen'] . '</td>';
  echo '<td>' . $row['yearBought'] . '</td>';
  echo "<td><a href='delownerssrv.php?ownerID=" . $row['ownerID'] ."'>Del</a> ";
  echo "<a href='editownersclt.php?ownerID=" . $row['ownerID'] ."'>Edit</a></td>";
  echo "</tr>";
}
?>
</table>
<a href="addownersclt.php">Add New</a>