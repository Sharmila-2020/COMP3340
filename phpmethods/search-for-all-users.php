<?php
/*
include "db-connect.php";
$sql = "SELECT userid, username, fname, lname FROM user";
$result = $mysqli->query($sql);
*/
include "function-findallusers.php";

//php function to connect to db and find all users
$result = findAllUsers();

// display list of users:
echo "<h2>List of Users:</h2><br>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "userid: " . $row["userid"]. " - username: " . $row["username"]. " - fname: " . $row["fname"]. " - lname: " . $row["lname"] . "<br>";    
  } 
}
else {
  echo "0 results<br>";
}

?>

<a href="..\index.php">Return to admin page</a>