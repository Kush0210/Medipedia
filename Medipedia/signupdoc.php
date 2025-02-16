<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medipedia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  if(strlen($_POST["dpass"]) < 8){
  die("Password must contain atleast 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["dpass"])) {
  die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["dpass"])) {
  die("Password must contain at least one number");
}

if ($_POST["dpass"] !== $_POST["dcpass"]) {
  die("Passwords must match");
}

if(isset($_POST["Submit"])) {
    $dname = $_POST['dname'];
    $dHname = $_POST['dHname'];
    $dmain = $_POST['dmain'];
    $dEmail = $_POST['dEmail'];
    $dpass = $_POST['dpass'];
    
    $sql = "INSERT INTO Doctor (fullname, hospital, domain, email, password) 
    VALUES('$dname', '$dHname', '$dmain', '$dEmail', '$dpass')";

    if ($conn->query($sql) === TRUE) {
    header("Location: sign_suc.html");
    }
    else {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>