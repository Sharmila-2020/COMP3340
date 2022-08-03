<?php
// php function for finding all users in db

function findAllUsers() {
  include "db-connect.php";

  $sql = "SELECT userid, username, fname, lname FROM user";
  $result = $mysqli->query($sql);

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 

  return $result;
}
?>