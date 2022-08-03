<?php
// php function for finding a specific user
function findUser($keywordfromform) {
  include "db-connect.php";

  $sql = "SELECT userid, username, fname, lname, email FROM user WHERE (username LIKE '%" . $keywordfromform . "%' OR fname LIKE '%" . $keywordfromform . "%' OR lname LIKE '%" . $keywordfromform . "%')";
  $result = $mysqli->query($sql);

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 

  return $result;
}
?>