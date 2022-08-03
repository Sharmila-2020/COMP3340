<?php
// php function that opens connection to db and searches for
//  specific product using the itemid

function findProductByItemid($receiveditemid) {
  include "db-connect.php";

  $sql = "SELECT * FROM product WHERE itemid = '$receiveditemid'";
  $result = $mysqli->query($sql);

  // closing the db connection
  $mysqli->close(); 

  return $result;
}
?>