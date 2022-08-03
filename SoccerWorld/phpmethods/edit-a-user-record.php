<?php
// php form for handling editing a user within database
include "..\headerfile.php";
include "function-finduserbyuserid.php";
$receiveduserid = $_GET['submituserid'];
$fetcheduserid;
$fetchedusername;
$fetchedfname;
$fetchedlname;
$fetchedemail;

$result = findUserByUserid($receiveduserid);

// display the result to the html page
// within an html form
echo "<h2>User with userid <em>$receiveduserid</em>:</h2><br>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "userid: " . $row["userid"]. ", username: " . $row["username"]. ", fname: ". $row["fname"]. ", lname: " . $row["lname"]. ", email: " . $row["email"]. "<br>";    
    $fetcheduserid = $row["userid"];
    $fetchedusername = $row["username"];
    $fetchedfname = $row["fname"];
    $fetchedlname = $row["lname"];
    $fetchedemail = $row["email"];
  } 
}
else {
  echo "0 results<br>";
}
//need to change the action attr, to something like update-user-record.php?
echo '
<form class="form-horizontal" action="edit-a-user-record-submission.php" enctype="multipart/form-data" method="post">
<fieldset>

<!-- Form Name -->
<legend>Edit a user</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="useridbox">UserID</label>  
  <div class="col-md-2">
  <input id="useridbox" name="useridbox" type="text" placeholder="',$fetcheduserid,'" class="form-control input-md" value="',$fetcheduserid,'" readonly>
  <span class="help-block">Read-only</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="usernamebox">Username</label>  
  <div class="col-md-4">
  <input id="usernamebox" name="usernamebox" type="text" placeholder="" class="form-control input-md" value="',$fetchedusername,'" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fnamebox">First name</label>  
  <div class="col-md-5">
  <input id="fnamebox" name="fnamebox" type="text" placeholder="" class="form-control input-md" value="',$fetchedfname,'" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lnamebox">Last name</label>  
  <div class="col-md-5">
  <input id="lnamebox" name="lnamebox" type="text" placeholder="" class="form-control input-md" value="',$fetchedlname,'" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailbox">Email</label>  
  <div class="col-md-6">
  <input id="emailbox" name="emailbox" type="text" placeholder="" class="form-control input-md" value="',$fetchedemail,'" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="button1id" name="buttonid" value="Update" class="btn btn-success">Update user</button>
    <button id="button2id" name="buttonid" value="Delete" class="btn btn-danger">DELETE USER</button>
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