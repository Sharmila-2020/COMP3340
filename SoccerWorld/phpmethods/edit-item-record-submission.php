<?php
//php file for handling the submission form when updating a product item in the db
include "..\headerfile.php";
include "function-findproductbyitemid.php";
include "function-updateproduct.php";
include_once "function-writeclothingpage.php";
$receiveditemid = $_POST['itemidbox'];
$updateditemname = $_POST['itemnamebox'];
$updatedprice = $_POST['pricebox'];
$updateddescription = $_POST['descriptionbox'];
$updateditemtype = $_POST['itemtypebox'];
$updatedonsale = $_POST['onsalebox'];

//  help from https://stackoverflow.com/questions/547821/two-submit-buttons-in-one-form
//if user clicks the 'update' button
if ($_POST['buttonid'] == 'Update') {
  //updating the db with new information
  /*
  include "db-connect.php";
  
  $sql = "UPDATE product SET itemname = '$updateditemname', price = '$updatedprice', description = '$updateddescription' WHERE itemid = '$receiveditemid'";
    if ($mysqli->query($sql) === TRUE) {
      echo "Record (without image) updated successfully<br>";
    } else {
      echo "Error updating record: " . $mysqli->error . "<br>";
    }

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 
  */
  updateProduct($receiveditemid, $updateditemname, $updatedprice, $updateddescription, $updateditemtype, $updatedonsale, NULL);

  // displaying the updated record
  $result = findProductByItemid($receiveditemid);
  echo "<h2>Showing updated product with itemid <em>$receiveditemid</em>:</h2><br>";
  if ($result->num_rows > 0) {
    // output data of each row and gather form information from db
    while($row = $result->fetch_assoc()) {
      echo "itemid: " . $row["itemid"]. " - product name: " . $row["itemname"]. " - price: ". $row["price"]
      . "<br>description: ". $row["description"]
      ."<br>product image: <img src=\"" . $row["img"] . "\" alt=\"product image\" width=\"100\" height=\"100\"><br><br>"
      . "<br>" . "itemtype: " . $row["itemtype"] . " onsale: " . $row["onsale"] . "<br>";   
    } 
  }
  else {
    echo "0 results<br>";
  }


} else if ($_POST['buttonid'] == 'Delete') {
  //deleting the item record, because user clicked DELETE
  include "db-connect.php";

  $sql = "DELETE FROM product WHERE itemid=". $receiveditemid;

  if ($mysqli->query($sql) === TRUE) {
    echo "Record deleted successfully<br>";
  } else {
    echo "Error deleting record: " . $mysqli->error . "<br>";
  }

  // closing the db connection
  $mysqli->close(); 
  
} else {
  //invalid action!
  echo 'invalid action';
}

// if a clothing item is added, remake the clothing.html file
if($updateditemtype === "clothing") {
  writeClothingPage();
}

echo '<a href="../products/'. $receiveditemid .'.php" target="_blank">View the item you just edited</a><br>';
?>

<a href="..\index.php">Return to admin page</a>

<?php
  include '..\footerfile.php';
?>