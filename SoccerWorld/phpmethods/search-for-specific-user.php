<?php

//include "db-connect.php";
include "function-finduser.php";
$keywordfromform = $_GET['finduser'];
//$searchusername = $_GET['submitusername'];
//$searchfname = $_GET['submitfname'];
//$searchlname = $_GET['submitlname'];

// outputting list of users using php function:
//$result = findUser($keywordfromform);
$result = findUser($keywordfromform);

// display the result to the html page
echo "<h2>Showing all users that include <em>$keywordfromform</em>:</h2><br>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "userid: " . $row["userid"]. ", username: " . $row["username"]. ", fname: ". $row["fname"]. ", lname: " . $row["lname"]. ", email: " . $row["email"]. "<br>";    
  } 
}
else {
  echo "0 results<br>";
}

?>

<a href="..\index.php">Return to admin page</a>