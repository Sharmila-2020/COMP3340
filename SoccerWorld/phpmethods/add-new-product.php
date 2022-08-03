
<?php
include "function-addnewproduct.php";
include "function-findproductbyitemid.php";
include "function-createnewemptyproduct.php";
include "function-updateproduct.php";
include "function-writeclothingpage.php";
$newproductname = $_POST["new-itemname"];
$newproductprice = $_POST["new-price"];
$newproductdescription = $_POST["new-description"];
$newitemtype = $_POST["new-itemtype"];
$newonsale = $_POST["new-onsale"];
$last_itemid;

// upload image file php
// help from https://www.w3schools.com/php/php_file_upload.asp
$target_dir = "..\productimages\\";
// concatenate and create the file path:
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  // make the db connection here
  $last_itemid = createNewEmptyProduct();
  $new_target_file = addslashes($target_dir . $last_itemid . '-' . basename($_FILES["fileToUpload"]["name"]));
  updateProduct($last_itemid, $newproductname, $newproductprice, $newproductdescription, $newitemtype, $newonsale, $new_target_file);
  // create the new html file here (actually put this in the function-updateproduct.php)
  //writeProductPage();

  // new_target_file was updated from just target_file
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//testing the filepath names:

echo 'The img filepath saved in db: ' , $new_target_file;

// adding the rest of the product details (replaced this with code above)
//addNewProduct($newproductname, $newproductprice, $newproductdescription);

// showing updated product list
echo "<h2>Adding the following item to the database: <em>$newproductname</em> at <em>$newproductprice</em>:</h2><br>";
$result = findProductByItemid($last_itemid);

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

// if a clothing item is added, remake the clothing.html file
if($newitemtype === "clothing") {
  writeClothingPage();
}

echo '<a href="../products/'. $last_itemid .'.php" target="_blank">View the item you just edited</a><br>';
?>

<a href="..\index.php">Return to admin page</a>