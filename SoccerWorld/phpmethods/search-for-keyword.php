<?php

//include "db-connect.php";
include "function-findspecificproduct.php";
$keywordfromform = $_GET['keyword'];

$result = findSpecificProduct($keywordfromform);

// displaying list of products:
echo "<h2>Showing all products that include <em>$keywordfromform</em>:</h2><br>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "itemid: " . $row["itemid"]. " - product name: " . $row["itemname"]. " - price: ". $row["price"]
    . "<br>description: ". $row["description"]
    . "<br>product image: <img src=\"" . $row["img"] . "\" alt=\"product image\" width=\"100\" height=\"100\"<br><br>";     
  } 
}
else {
  echo "0 results<br>";
}

?>

<a href="..\index.php">Return to admin page</a>