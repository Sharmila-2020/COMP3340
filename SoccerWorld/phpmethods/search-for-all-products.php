<?php
/*
include "db-connect.php";
$sql = "SELECT itemid, itemname, price, description FROM product";
$result = $mysqli->query($sql);
*/

include "function-findallproducts.php";

$result = findAllProducts();

// outputting list of users:
echo "<h2>List of All Products:</h2><br>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "itemid: " . $row["itemid"]. ", itemname: " . $row["itemname"]. ", price: " . $row["price"]
    . "<br>description: " . $row["description"]
    ."<br>product image: <img src=\"" . $row["img"] . "\" alt=\"product image\" width=\"100\" height=\"100\"><br><br>"
      . "<br>" . "itemtype: " . $row["itemtype"] . " onsale: " . $row["onsale"] . "<br>";     
  } 
}
else {
  echo "0 results<br>";
}

?>

<a href="..\index.php">Return to admin page</a>