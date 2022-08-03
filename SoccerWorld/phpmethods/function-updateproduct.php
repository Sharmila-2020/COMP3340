<?php
// updates a product record in the db, product must exist first
// this function checked to see if a new image was included in the update
// if so, it runs an sql statement with the updated img
// if not, then it updates the record while leaving the previous img value alone

function updateProduct($received_itemid, $updatedname, $updatedprice, $updateddescription, $updateditemtype, $updatedonsale, $updatedimg) {
  include "db-connect.php";
  include "function-writeproductpage.php";
  include_once "function-findproductbyitemid.php";
  $imgpath;

  if(isset($updatedimg)) {
    $sql = "UPDATE product SET itemname = '$updatedname', price = '$updatedprice', description = '$updateddescription', itemtype = '$updateditemtype', onsale = '$updatedonsale', img = '$updatedimg' WHERE itemid = '$received_itemid'";
    if ($mysqli->query($sql) === TRUE) {
      echo "Record and image updated successfully<br>";
    } else {
      echo "Error updating record: " . $mysqli->error . "<br>";
    }
  }
  else {
    $sql = "UPDATE product SET itemname = '$updatedname', price = '$updatedprice', description = '$updateddescription', itemtype = '$updateditemtype', onsale = '$updatedonsale' WHERE itemid = '$received_itemid'";
    if ($mysqli->query($sql) === TRUE) {
      echo "Record updated successfully (no change to image)<br>";
    } else {
      echo "Error updating record: " . $mysqli->error . "<br>";
    }
  }

  // checking to see if updatedimg is null, need to get imgpath before creating the new dynamic webpage
  if(!isset($updatedimg)) {
    $result = findProductByItemid($received_itemid);
    if ($result->num_rows > 0) {
      // output data of each row and gather form information from db
      while($row = $result->fetch_assoc()) {
        $imgpath = $row['img']; 
      } 
      // create the new webpage dynamically here
      writeProductPage($received_itemid, $updatedname, $updatedprice, $updateddescription, $updateditemtype, $updatedonsale, $imgpath);
      echo "clothing.php was rewritten successfully.<br>";
    }
    else {
      echo "0 results<br>";
    }
    
  } else {
    // no need to connect to db another time, updatedimg has the new correct img path
    writeProductPage($received_itemid, $updatedname, $updatedprice, $updateddescription, $updateditemtype, $updatedonsale, $updatedimg);
    echo "clothing.php was rewritten successfully.<br>";
  }
  
  // closing the db connection
  $mysqli->close(); 
  
  
}
?>