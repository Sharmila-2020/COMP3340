<?php
// php function for finding a specific user using userid from table
function findUserByUserid($receiveduserid) {
  include "db-connect.php";

  //$sql = "SELECT userid, username, fname, lname, email FROM user WHERE userid LIKE '%" . $receiveduserid . "%'";
  $sql = "SELECT * FROM user WHERE userid = '$receiveduserid'";
  $result = $mysqli->query($sql);

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 

  return $result;
}
?>