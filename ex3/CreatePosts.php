<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "emiles3", "Not12quit!", "emiles3");
$uservalue=$_POST['username'];
$postvalue=$_POST['post'];

/* check connection */
if ($mysqli->connect_errno) {
    echo "Connection failed.";
    exit();
}
if(empty($uservalue))
{
  echo "Error: User field cannot be left blank.<br>";
}
else
{
  if(!empty($postvalue))
  {
    $query = "SELECT user_id FROM Users WHERE user_id='$uservalue'";
    $result = $mysqli->query($query);
    if($result == true)
    {
      if($row = $result->fetch_assoc())
      {
        $query = "INSERT INTO Posts (content,author_id) VALUES ('$postvalue','$uservalue')";
        $result = $mysqli->query($query);
        if($result == true)
        {
          echo "Post saved.";
        }
        $result->free();
      }
      else
      {
        echo "Error: User with name <i>".$uservalue."</i> does not exist.";
      }
    }
  }
  else
  {
    echo "Error: Your post cannot be empty.";
  }
}

/* close connection */
$mysqli->close();
?>
