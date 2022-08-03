<?php
// function for listing all products in database

function findAllProducts() {
  include "db-connect.php";
  $sql = "SELECT * FROM product";
  $result = $mysqli->query($sql);

  // outputting list of users:
  /*
  echo "<h2>List of All Products:</h2><br>";
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "itemid: " . $row["itemid"]. ", itemname: " . $row["itemname"]. ", price: " . $row["price"]. "<br>description: " . $row["description"]. "<br>";    
    } 
  }
  else {
    echo "0 results<br>";
  }
  */

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 

  return $result;

  //echo '<a href="..\index.php">Return to admin page</a>';

}

?>