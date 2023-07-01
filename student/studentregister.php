<!DOCTYPE html>
<html>

<head>
  <title>Student Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    .outer {
      max-width: 100%;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 50px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="date"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
      width: 100%;
    }
  </style>
</head>

<body>
  <h1>Student Registration Form</h1>
  <div class="outer">
    <div class="container">
      <form method="POST" action="">
        <div class="form-group">
          <label for="sid">Student ID:</label>
          <input type="text" id="sid" name="sid" required>
        </div>
        <div class="form-group">
          <label for="sname">Student Name:</label>
          <input type="text" id="sname" name="sname" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
          <label for="mnumber">Mobile Number:</label>
          <input type="number" id="mnumber" name="mnumber" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="faculty">Faculty:</label>
          <input type="text" id="faculty" name="faculty" required>
        </div>
        <div class="form-group">
          <label for="semyear">Semester/Year:</label>
          <input type="text" id="semyear" name="semyear" required>
        </div>
        <div class="form-group">
          <label for="fname">Father's Name:</label>
          <input type="text" id="fname" name="fname" required>
        </div>
        <div class="form-group">
          <label for="mname">Mother's Name:</label>
          <input type="text" id="mname" name="mname" required>
        </div>
        <div class="form-group">
          <label for="ayear">Academic Year:</label>
          <input type="date" id="ayear" name="ayear" required>
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $sid = $_POST["sid"];
  $sname = $_POST["sname"];
  $address = $_POST["address"];
  $mnumber = $_POST["mnumber"];
  $email = $_POST["email"];
  $faculty = $_POST["faculty"];
  $semyear = $_POST["semyear"];
  $fname = $_POST["fname"];
  $mname = $_POST["mname"];
  $ayear = $_POST["ayear"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Database connection parameters
  $conn = mysqli_connect('localhost', 'root', '', 'smsdb');
  if (!$conn) {
    die('Error connection');
  }
  // SQL query to insert data into the student table
  $sql = "INSERT INTO student (sid, sname, address, mnumber, email, faculty, semyear, fname, mname, ayear, username, password)
          VALUES ('$sid', '$sname', '$address', '$mnumber', '$email', '$faculty', '$semyear', '$fname', '$mname', '$ayear', '$username', '$password')";

  if ($conn->query($sql) === TRUE) {
    // Redirect to a success page
    echo '<script>alert("Details submitted to admin.Wating for the registration by admin")</script>';
    echo "<script>window.location.href='studentlogin.php'</script>";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>