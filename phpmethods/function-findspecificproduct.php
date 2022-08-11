<?php
// php function that opens connection to db and searches for
//  specific product

function findSpecificProduct($keywordfromform) {
  include "db-connect.php";

  $sql = "SELECT itemid, itemname, price, description, img FROM product WHERE itemname LIKE '%" . $keywordfromform . "%'";
  $result = $mysqli->query($sql);

  return $result;

  // closing the db connection once all the other functions are closed too
  //$mysqli->close(); 
}
?>