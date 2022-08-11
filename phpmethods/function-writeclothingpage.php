<?php
// this php function is called when user clicks on the clothing page

function writeClothingPage() {
  include "function-findproductbyitemtype.php";
  // create unique product filename
  $clothinghtmlpagename = "../clothing". ".php"; // file will be saved in this location with this name
  $newclothinghtmlfile = fopen($clothinghtmlpagename,"w"); // creates or overwrites the file
  $clothinghtmlfilecontents = '<?php echo file_get_contents("html/clothingpageheader.html"); ?>';
  $clothingpageproductcontainer = '
  <div class="main-container">
            <div class="main-row">
                <hr/>
                <br/><br/>
                <div class="main-row">
                    <h1>Featured Clothing Products</h1>
                </div>
  ';
  $result = findProductByItemType("clothing");
  //building the html item per item
  if ($result->num_rows > 0) {
    // concatenate data of each item together
    while($row = $result->fetch_assoc()) {
      $clothingpageproductcontainer = $clothingpageproductcontainer .
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
  $clothingpageproductcontainer = $clothingpageproductcontainer . '
  <hr/>
            </div>
            <!--end of main-row-->
        </div>
        <!-- end of main-container -->
  ';              
                 
  
  $clothinghtmlfilecontents = $clothinghtmlfilecontents . $clothingpageproductcontainer;
  $clothinghtmlfilecontents = $clothinghtmlfilecontents . '<?php echo file_get_contents("html/clothingpagefooter.html"); ?>';
  fwrite($newclothinghtmlfile, $clothinghtmlfilecontents);
  fclose($newclothinghtmlfile);
}
?>

