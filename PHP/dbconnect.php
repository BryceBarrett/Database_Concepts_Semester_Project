<?php
function myquery($mysqli,$sql) {
  if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
  }
  return $result;
}

$mysqli = new mysqli('127.0.0.1', 'bryceb68_test', 'snow1234', 'bryceb68_test');
if ($mysqli->connect_errno) {
 echo "Errno: " . $mysqli->connect_errno . "</br>";
 echo "Error: " . $mysqli->connect_error . "</br>";
 exit;
}
?>
