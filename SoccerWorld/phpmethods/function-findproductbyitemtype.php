<?php
// php function that opens connection to db and searches for
//  products with a specific product type (like clothing, footwear, etc)

function findProductByItemtype($receiveditemtype) {
  include "db-connect.php";

  $sql = "SELECT * FROM product WHERE itemtype = '$receiveditemtype'";
  $result = $mysqli->query($sql);

  // closing the db connection
  $mysqli->close(); 

  return $result;
}
?>