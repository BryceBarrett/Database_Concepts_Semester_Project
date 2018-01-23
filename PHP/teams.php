<?php
include 'dbconnect.php';

$sql = "select * from teams";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<table border=1>';
echo '<tr><th>Name</th><th>Owner</th><th>Manager</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['owner'] . '</td>';
  echo '<td>' . $row['manager'] . '</td>';
  echo '</tr>';
}
echo '</table>';

?>