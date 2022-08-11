<!DOCTYPE html>
<html lang="en">

<!--
By: Chris ChrisRafinski
For: Dr. Kobti
COMP3340
University of Windsor
Web server index page, for usb web server
-->

<head>
    <title>COMP3340 Project test web server - ChrisRafinski</title>
    <meta charset="UTF-8">
    <meta name="author" content="Christopher Rafinski">
    <meta name="description" content="Test web server for final project of COMP3340, group 10">
    <meta name="keywords" content="COMP3340 UWindsor test usb web server">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css" />
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>

<body>
  <!--update this title to something like admin backend server-->
  <h1>Admin Interface</h1>
  <?php
    include "phpmethods\db-connect.php";

    // using some information from: https://www.w3schools.com/php/php_mysql_select.asp
    // connection error checking:
    echo "<h2>Connection Status:</h2><br>";
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    } 
    // on connection success:
    echo "Connected to: ";
    echo $mysqli->host_info . "<br>";  
  ?>

  <!--html form for showing all users in db-->
  <!--bootstrap form from bootsnip-->
  <form class="form-horizontal" action="phpmethods\search-for-all-users.php">
    <fieldset>

      <!-- Form Name -->
      <legend>List All Users</legend>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="show-allusers">List all users</label>
        <div class="col-md-4">
          <button id="show-allusers" name="show-allusers" class="btn btn-primary">Show</button>
        </div>
      </div>

    </fieldset>
  </form>

  <!-- html form for searching for specific user -->
  <!--bootstrap form from bootsnip-->
 
  <form class="form-horizontal" action="phpmethods\search-for-specific-user.php">
    <fieldset>

    <!-- Form Name -->
    <legend>Search for a User by Username, First Name, or Last Name</legend>

    <!-- Search input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="finduser">Find user containing:</label>
      <div class="col-md-5">
        <input id="finduser" name="finduser" type="search" placeholder="e.g. username" class="form-control input-md" required="">
        <p class="help-block">Enter username, first name, or last name to search user list</p>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit-searchuser"></label>
      <div class="col-md-4">
        <button id="submit-searchuser" name="submit-searchuser" class="btn btn-primary">Search</button>
      </div>
    </div>

    </fieldset>
  </form>

  


  <!-- html form for searching user by userid then editing that users record -->
  <!--bootstrap form from bootsnip-->
  <form class="form-horizontal" action="phpmethods\edit-a-user-record.php">
  <fieldset>

    <!-- Form Name -->
    <legend>Edit a User by userid</legend>

    <!-- Search input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submituserid">Enter userid</label>
      <div class="col-md-2">
        <input id="submituserid" name="submituserid" type="search" placeholder="e.g. 2" class="form-control input-md" required="">
        <p class="help-block">Enter the userid number of who you want to edit</p>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Edit</button>
      </div>
    </div>

  </fieldset>
</form>


  <!-- html form for searching and listing all products in DB -->
  <!--bootstrap form from bootsnip-->

  <form class="form-horizontal" action="phpmethods\search-for-all-products.php">
    <fieldset>

      <!-- Form Name -->
      <legend>List All Products</legend>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="submit-allproducts">List all products</label>
        <div class="col-md-4">
          <button id="submit-allproducts" name="submit-allproducts" class="btn btn-primary">Show</button>
        </div>
      </div>

    </fieldset>
  </form>


  <!-- html form for searching keywords -->
  <!--bootstrap form from bootsnip-->
  <form class="form-horizontal" action="phpmethods\search-for-keyword.php">
    <fieldset>

    <!-- Form Name -->
    <legend>Search Product Database</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="keyword">Search database</label>  
      <div class="col-md-4">
        <input id="keyword" name="keyword" type="text" placeholder="e.g. ball" class="form-control input-md" required="">
      <span class="help-block">Enter a search term into the box to search and test the database</span>  
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button id="submit-search" name="submit-search" class="btn btn-primary">Search</button>
      </div>
    </div>

    </fieldset>
  </form>


  <!-- html form for adding more items-->
  <!--bootstrap form from bootsnip-->
  <!--<form class="form-horizontal" action="phpmethods\add-new-product.php" method="POST">-->
  <form class="form-horizontal" action="phpmethods\add-new-product.php" method="POST" enctype="multipart/form-data">
    <fieldset>

    <!-- Form Name -->
    <legend>Add Product to Database</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="new-itemname">Name</label>  
      <div class="col-md-5">
        <input id="new-itemname" name="new-itemname" type="text" placeholder="e.g. Soccer jersey" class="form-control input-md" required="">
        <span class="help-block">Enter the new product title</span>  
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="new-price">Price</label>  
      <div class="col-md-4">
      <input id="new-price" name="new-price" type="text" placeholder="e.g. 14.99" class="form-control input-md" required="">
      <span class="help-block">Enter the price for new product</span>  
      </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="new-description">Details about product</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="new-description" name="new-description">e.g. Wow! What a great product we have here...</textarea>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Type of product</label>
      <div class="col-md-4">
        <select id="new-itemtype" name="new-itemtype" class="form-control">
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
        <select id="new-onsale" name="new-onsale" class="form-control">
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </div>
    </div>

    <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="new-image">Product image to upload</label>
      <div class="col-md-4">
        <input name="fileToUpload" id="fileToUpload" class="input-file" type="file">
      </div>
    </div>
    

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button id="submit-newproduct" name="submit-newproduct" class="btn btn-primary">Add item</button>
      </div>
    </div>

    </fieldset>
  </form>

  <!-- html form for editing items-->
  <!--bootstrap form from bootsnip-->
  <form class="form-horizontal" action="phpmethods\edit-item-record.php">
    <fieldset>

    <!-- Form Name -->
    <legend>Edit a Product by itemid</legend>

    <!-- Search input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="searchinput">Enter product itemid</label>
      <div class="col-md-2">
        <input id="itemidbox" name="itemidbox" type="search" placeholder="e.g. 51" class="form-control input-md" required="">
    
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Edit product</button>
      </div>
    </div>

    </fieldset>
  </form>


  


  <?php
    // another query
   
   // include "phpmethods\search-for-balls.php";   
    
    $mysqli->close(); // must close the connection, because all the functions are open for now

  ?>
  <a href="home.html">Website Home</a><br>

</body>

</html>