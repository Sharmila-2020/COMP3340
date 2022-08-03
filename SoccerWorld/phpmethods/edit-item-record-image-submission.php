<?php
//php file for handling the submission form when updating a product image in the db
include "..\headerfile.php";
include "function-findproductbyitemid.php";
$receiveditemid = $_POST['itemidbox'];

  //action for updating the image only

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
    //$last_itemid = createNewEmptyProduct();
    $new_target_file = addslashes($target_dir . $receiveditemid . '-' . basename($_FILES["fileToUpload"]["name"]));
    //updateProduct($last_itemid, $newproductname, $newproductprice, $newproductdescription, $new_target_file);
    // updating the img column in table, for img path
    include "db-connect.php";
    $sql = "UPDATE product SET img = '$new_target_file' WHERE itemid = '$receiveditemid'";
    if ($mysqli->query($sql) === TRUE) {
      echo "Image updated in db successfully<br>";
      writeProductPage($receiveditemid, NULL, NULL, NULL, NULL, NULL, $new_target_file);
    } else {
      echo "Error updating record: " . $mysqli->error . "<br>";
    }

    // closing the db connection
    $mysqli->close(); 

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  // displaying the updated record
  $result = findProductByItemid($receiveditemid);
  echo "<h2>Showing updated product with itemid <em>$receiveditemid</em>:</h2><br>";
  if ($result->num_rows > 0) {
    // output data of each row and gather form information from db
    while($row = $result->fetch_assoc()) {
      echo "itemid: " . $row["itemid"]. " - product name: " . $row["itemname"]. " - price: ". $row["price"]
      . "<br>description: ". $row["description"]
      ."<br>product image: <img src=\"" . $row["img"] . "\" alt=\"product image\" width=\"100\" height=\"100\"><br><br>";     
    } 
  }
  else {
    echo "0 results<br>";
  }
  
  echo '<a href="../products/'. $receiveditemid .'.php" target="_blank">View the item you just edited</a><br>';
?>

<a href="..\index.php">Return to admin page</a>

<?php
  include '..\footerfile.php';
?>