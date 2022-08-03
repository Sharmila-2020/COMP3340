<?php
// this php function is called when a new product page needs to be dynamically generates

function writeProductPage($received_itemid, $updatedname, $updatedprice, $updateddescription, $updateditemtype, $updatedonsale, $updatedimg) {
  // create unique product filename
  $productfilename = "../products/". $received_itemid . ".php"; // file will be saved in this location with this name
  $newproductfile = fopen($productfilename,"w"); // creates or overwrites the file
  $productfilecontents = '<?php echo file_get_contents("../html/productupper.html"); ?>';
  $productlayoutandinformation = '
  <div class="main-product-container">
            <div class="main-row">
                <hr/>
                <br/><br/>
                <div class="main-row">
                    <h1>'. $updatedname .'</h1>
                </div>
                <div class="column">
                <img src="' . $updatedimg . '" alt="product image" width="150" height="150">
                </div>
                <div class="column">
                    <h2>Price: $'. $updatedprice .'</h2>
                </div>
                <div class="column">
                    <h2>'. $updateddescription .'</h2>
                </div>
                <hr/>
            </div>
            <!--end of main-row-->
        </div>
        <!-- end of main-container --> 
  ';
  $productfilecontents = $productfilecontents . $productlayoutandinformation;
  $productfilecontents = $productfilecontents . '<?php echo file_get_contents("../html/productlower.html"); ?>';
  fwrite($newproductfile, $productfilecontents);
  fclose($newproductfile);
}
?>