<?php
include "menu.php";
?>
<h2>Trades</h2>
<table border=1>
<tr>
<th>Trade Number</th>
<th>Name</th>
<th>Date</th>
<th>Traded From</th>
<th>Traded To</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from Trades";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['tradeNum'] . '</td>';
  echo '<td>' . $row['playerName'] . '</td>';
  echo '<td>' . $row['dateTraded'] . '</td>';
  echo '<td>' . $row['teamFrom'] . '</td>';
  echo '<td>' . $row['teamTo'] . '</td>';
  echo "<td><a href='deltradessrv.php?tradeNum=" . $row['tradeNum'] ."'>Del</a> ";
  echo "<a href='edittradesclt.php?tradeNum=" . $row['tradeNum'] ."'>Edit</a></td>";
  echo "</tr>";
}
?>
</table>
<a href="addtradesclt.php">Add New</a>