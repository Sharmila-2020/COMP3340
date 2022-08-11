<?php
//php file for handling the editing of an item record in db
include "..\headerfile.php";
include "function-findproductbyitemid.php";
$receiveditemid = $_GET['itemidbox'];
$fetcheditemid;
$fetcheditemname;
$fetchedprice;
$fetcheddescription;
$fetchedimg;
$fetcheditemtype;
$fetchedonsale;

$result = findProductByItemid($receiveditemid);

// displaying product with that itemid:
echo "<h2>Showing all products that include <em>$receiveditemid</em>:</h2><br>";
if ($result->num_rows > 0) {
  // output data of each row and gather form information from db
  while($row = $result->fetch_assoc()) {
    echo "itemid: " . $row["itemid"]. " - product name: " . $row["itemname"]. " - price: ". $row["price"]
    . "<br>description: ". $row["description"]
    ."<br>product image: <img src=\"" . $row["img"] . "\" alt=\"product image\" width=\"100\" height=\"100\"><br><br>";    
    $fetcheditemid = $row["itemid"];
    $fetcheditemname = $row["itemname"];
    $fetchedprice = $row["price"];
    $fetcheddescription = $row["description"];
    $fetcheditemtype = $row["itemtype"];
    $fetchedonsale = $row["onsale"];
    $fetchedimg = $row["img"];
  } 
}
else {
  echo "0 results<br>";
}

// form to submit updated product details
echo '
<form class="form-horizontal" action="edit-item-record-submission.php" enctype="multipart/form-data" method="post">
<fieldset>

<!-- Form Name -->
<legend>Edit product details</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="itemidbox">itemid</label>  
  <div class="col-md-2">
  <input id="itemidbox" name="itemidbox" type="text" placeholder="',$fetcheditemid,'" value="',$fetcheditemid,'" class="form-control input-md" readonly>
  <span class="help-block">Read only</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="itemnamebox">Product name</label>  
  <div class="col-md-4">
  <input id="itemnamebox" name="itemnamebox" type="text" placeholder="',$fetcheditemname,'" value="',$fetcheditemname,'" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pricebox">Price</label>  
  <div class="col-md-2">
  <input id="pricebox" name="pricebox" type="text" placeholder="',$fetchedprice,'" value="',$fetchedprice,'" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="descriptionbox">Description</label>  
  <div class="col-md-8">
  <input id="descriptionbox" name="descriptionbox" type="text" placeholder="',$fetcheddescription,'" value="',$fetcheddescription,'" class="form-control input-md" required="">
  <span class="help-block">Write something about the product</span>  
  </div>
</div>

<!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Type of product</label>
      <div class="col-md-4">
        <select id="itemtypebox" name="itemtypebox" class="form-control">
          <option value="clothing">Clothing</option>
          <option value="footwear">Footwear</option>
          <option value="equipment">Equipment</option>
          <option value="fanclothing">Fan clothing</option>
        </select>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectsale">Is the item on sale</label>
      <div class="col-md-2">
        <select id="onsalebox" name="onsalebox" class="form-control">
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </div>
    </div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="buttonid"></label>
  <div class="col-md-8">
    <button id="buttonid" name="buttonid" value="Update" class="btn btn-success">Update product</button>
    <button id="buttonid" name="buttonid" value="Delete" class="btn btn-danger">DELETE</button>
  </div>
</div>

</fieldset>
</form>

';

// form for submitting a new product image
echo '
<form class="form-horizontal" action="edit-item-record-image-submission.php" enctype="multipart/form-data" method="post">
<fieldset>

<!-- Form Name -->
<legend>Edit product image</legend>

<!-- Hidden input to send itemid -->
<input type="hidden" id="itemidbox" name="itemidbox" value="',$receiveditemid,'">

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="imgbox">Product image</label>
  <div class="col-md-4">
    <input id="fileToUpload" name="fileToUpload" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" value="Image" class="btn btn-primary">Update product image</button>
  </div>
</div>

</fieldset>
</form>

';

?>

<a href="..\index.php">Return to admin page</a>

<?php
  include '..\footerfile.php';
?>