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

if (isset($_POST["Submit"])) {
  $date = $_POST['date'];
  $Hname = $_POST['Hname'];
  $pres = $_POST['pres'];
  $_FILES = $_POST['file'];

  $sql = "INSERT INTO prescription (date, hospital, prescription, file) 
    VALUES('$date', '$Hname', '$pres', '$_FILES')";

  if ($conn->query($sql) === TRUE) {
    //echo "Data added successfully";
    //header("Location: sign_suc.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>
<html>

<head>
  <style>
    *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}

body{
    display: flex;
justify-content: center;
align-items: center;
background: url('home2.jpg')no-repeat;
  width: 100%;
  height: 100vh;
  background-size: cover;
  background-position: center;
  position: relative;
}

    .wrapper {
      position: relative;
      width: 500px;
      height: 600px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, .5);
      border-radius: 20px;
      backdrop-filter: blur(20px);
      box-shadow: 0 0 30px Orgba(0, 0, 0, .5);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .wrapper .form-box {
      width: 100%;
      padding: 40px;
    }

    .form-box h2 {
      font-size: 2em;
      color: #162938;
      text-align: center;
    }

    .input-box {
      position: relative;
      width: 100%;
      height: 50px;
      border-bottom: 2px solid #162938;
      margin: 30px 0;
    }

    .input-box label {
      position: absolute;
      top: 50%;
      left: 5px;
      transform: translateY (-50%);
      font-size: 1em;
      color: #162938;
      font-weight: 500;
      pointer-events: none;
      transition: .5s;
    }

    .input-box input:focus~label,
    .input-box input:valid~label {
      top: -5px;
    }

    .input-box input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      font-size: 1em;
      color: #162938;
      font-weight: 600;
      padding: 0 35px 0 5px;
    }
  </style>
</head>

<body>
  <div class="wrapper">

    <div class="form-box login">
      <h1>Data added successfully</h1>
      <h2>*********************************</h2>
      <br>
      <h2>Your entered data is : <br><br>
        Date : <?php echo $_POST["date"]; ?><br><br>
        Hospital : <?php echo $_POST["Hname"]; ?><br><br>
        Prescription : <?php echo $_POST["pres"]; ?><br><br>
        File : <?php echo $_POST["file"]; ?><br>
      </h2>
    </div>
  </div>
</body>

</html>