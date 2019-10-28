<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "emiles3", "Not12quit!", "emiles3");
$posts=$_POST['deleteForm'];
if ($mysqli->connect_errno)
{
    echo "Connection failed.";
    exit();
}
if(isset($posts))
{
  foreach($posts as $values)
  {
    $query = "DELETE FROM Posts WHERE post_id='$values'";
    $result = $mysqli->query($query);
    if($result == true)
    {
      echo "Post with post ID <i><b>" . $values . "</i></b> has been deleted! <br>";
    }
    else
    {
      echo "Error: Unable to delete post.<br>";
    }
  }
}
else
{
  echo "Error: No posts selected to delete!<br>";
}

/* close connection */
$mysqli->close();
?>
