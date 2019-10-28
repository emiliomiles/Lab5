<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","emiles3","Not12quit!","emiles3");
echo "<title> Users </title>";
if ($mysqli->connect_errno)
{
    echo "Connection failed.";
    exit();
}
$query = "SELECT * FROM Users";
$result = $mysqli->query($query);
echo "<b><u> Users in the Database:</u></b><br><br>";
echo "<table>";
while($row = $result->fetch_assoc())
{
  echo "<tr><td>" . $row['user_id'] . "</td>";
}
echo "</table>";
$result->free();
/* close connection */
$mysqli->close();
?>
