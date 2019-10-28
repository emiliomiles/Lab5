<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "emiles3", "Not12quit!", "emiles3");
$uservalue=$_POST['username'];

/* check connection */
if ($mysqli->connect_errno) {
    echo "Connection failed.";
    exit();
}
$query = "SELECT content FROM Posts WHERE author_id='$uservalue'";
$result = $mysqli->query($query);
if($result == true)
{
  echo "Posts made by " . $uservalue . ":";
  echo "<table>";
  while($row = $result->fetch_assoc())
  {
    echo "<tr><td>- " . $row['content'] . "</td>";
  }
  echo "</table>";
  $result->free();
}

/* close connection */
$mysqli->close();
?>
