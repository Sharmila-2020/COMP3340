<?php
// this php function is called when user clicks on the clothing page

function writeEquipmentPage() {
  include_once "function-findproductbyitemtype.php";
  // create unique product filename
  $producttypehtmlpagename = "../equipment". ".php"; // file will be saved in this location with this name
  $newproducttypehtmlfile = fopen($producttypehtmlpagename,"w"); // creates or overwrites the file
  $producttypehtmlfilecontents = '<?php echo file_get_contents("html/equipmentpageheader.html"); ?>';
  $producttypepageproductcontainer = '
  <div class="main-container">
            <div class="main-row">
                <hr/>
                <br/><br/>
                <div class="main-row">
                    <h1>Featured Equipment Products</h1>
                </div>
  ';
  $result = findProductByItemType("equipment");
  //building the html item per item
  if ($result->num_rows > 0) {
    // concatenate data of each item together
    while($row = $result->fetch_assoc()) {
      $producttypepageproductcontainer = $producttypepageproductcontainer .
        '<div class="column-product" onclick="location.href=\'../products/'. $row["itemid"] .'.php\'">
          <img src="' . $row["img"] . '" alt="product image" width="100" height="100">
          <h3>'. $row["itemname"] .'</h3>
          <p>'. $row["price"] .'</p>
        </div>';
    } 
  }
  else {
    echo "0 results<br>";
  }
  $producttypepageproductcontainer = $producttypepageproductcontainer . '
  <hr/>
            </div>
            <!--end of main-row-->
        </div>
        <!-- end of main-container -->
  ';              
                 
  
  $producttypehtmlfilecontents = $producttypehtmlfilecontents . $producttypepageproductcontainer;
  $producttypehtmlfilecontents = $producttypehtmlfilecontents . '<?php echo file_get_contents("html/equipmentpagefooter.html"); ?>';
  fwrite($newproducttypehtmlfile, $producttypehtmlfilecontents);
  fclose($newproducttypehtmlfile);
}
?>

