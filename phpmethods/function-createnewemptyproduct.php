<?php
// creates an empty product record, then returns the unique itemid
function createNewEmptyProduct() {
  include "db-connect.php";

  $sql = "INSERT INTO product (itemname) VALUES ('temp')";
  $result = $mysqli->query($sql) or die(mysqli_error($mysqli));
  $last_itemid;

  //getting last created itemid https://www.w3schools.com/php/php_mysql_insert_lastid.asp
  if($result === TRUE) {
    $last_itemid = $mysqli->insert_id;
  } else {
    echo 'Could not retrieve last inserted itemid.<br>';
  }

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 

  return $last_itemid;
}
?>