<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "emiles3", "Not12quit!", "emiles3");
$uservalue=$_POST['username'];

/* check connection */
if ($mysqli->connect_errno) {
    echo "Connection failed.";
    exit();
}

if(!empty($uservalue))
{
  $query = "INSERT INTO Users (user_id) VALUES ('$uservalue')";
  if($mysqli->query($query)=== true)
  {
    echo "New user created successfully!";
  }
  else {
    echo "Error: Username already exists!";
  }
}
else {
  echo "Error: Username cannot be empty!";
}

/* close connection */
$mysqli->close();
?>
