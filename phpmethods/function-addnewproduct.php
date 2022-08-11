<?php
// function for adding a new product into the db
// currently not being used, was replace with createnewemptyproduct() and updateproduct() used together


function addNewProduct($newproductname, $newproductprice, $newproductdescription) {
  include "db-connect.php";

  $sql = "INSERT INTO product (itemid, itemname, price, description) VALUES (NULL, '$newproductname', '$newproductprice', '$newproductdescription')";
  $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 

}



?>