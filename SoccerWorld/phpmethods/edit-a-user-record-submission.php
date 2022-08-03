<?php
// php to handle the user record update form on edit-a-user-record.php
include "..\headerfile.php";
include "function-finduserbyuserid.php";
$receiveduserid = $_POST['useridbox'];
$updatedusername = $_POST['usernamebox'];
$updatedfname = $_POST['fnamebox'];
$updatedlname = $_POST['lnamebox'];
$updatedemail = $_POST['emailbox'];

//  help from https://stackoverflow.com/questions/547821/two-submit-buttons-in-one-form
//if user clicks the 'update' button
if ($_POST['buttonid'] == 'Update') {
  //action for updating the table with new user record information
  include "db-connect.php";
  $sql = "UPDATE user SET username = '$updatedusername', fname = '$updatedfname', lname = '$updatedlname', email = '$updatedemail' WHERE userid = '$receiveduserid'";
  if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully<br>";
  } else {
    echo "Error updating record: " . $mysqli->error . "<br>";
  }

  // closing the db connection once all the other functions are closed too
  $mysqli->close(); 

  //displaying the updated user record
  $result = findUserByUserid($receiveduserid);
  echo "<h2>Displaying updated user info for userid <em>$receiveduserid</em>:</h2><br>";
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "userid: " . $row["userid"]. ", username: " . $row["username"]. ", fname: ". $row["fname"]. ", lname: " . $row["lname"]. ", email: " . $row["email"]. "<br>";    
    } 
  }
  else {
    echo "0 results<br>";
  }

} else if ($_POST['buttonid'] == 'Delete') {
  //action for deleting the user record if user clicks the delete button
  include "db-connect.php";

  $sql = "DELETE FROM user WHERE userid=". $receiveduserid;

  if ($mysqli->query($sql) === TRUE) {
    echo "Record deleted successfully<br>";
  } else {
    echo "Error deleting record: " . $mysqli->error . "<br>";
  }

  // closing the db connection
  $mysqli->close(); 
} else {
  //invalid action!
  echo "Invalid action<br>";
}
?>

<a href="..\index.php">Return to admin page</a>

<?php
  include '..\footerfile.php';
?>