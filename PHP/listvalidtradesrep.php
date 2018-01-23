<?php
include "menu.php";
?>
<h2>Trade Report</h2>
<table border=1>
<tr>
<th>Player Name</th>
<th>Date Traded</th>
<th>Validity of Trade</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from isTradeValid";

$result = myquery($mysqli,$sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['playerName'] . '</td>';
  echo '<td>' . $row['dateTraded'] . '</td>';
  echo '<td>' . $row['validTrades'] . '</td>';
}
?>
</table>
