<?php
// php function that opens connection to db and searches for
//  products that are on sale (value has 1)

function findProductsOnSale() {
  include "db-connect.php";

  $sql = "SELECT * FROM product WHERE onsale = '1'";
  $result = $mysqli->query($sql);

  // closing the db connection
  $mysqli->close(); 

  return $result;
}
?>