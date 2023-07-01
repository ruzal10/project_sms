<?php
session_start();
if (!isset($_SESSION['student'])) {
  header('location:studentlogin.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$conn) {
  die('Error connection');
}
$student = $_SESSION['student'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dahboard Layout</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400&family=Merriweather&family=Ms+Madi&family=Roboto:wght@500&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    /* Sidebar Container */
    .sidebar {
      background-color: #f2f2f2;
      width: 200px;
      padding: 20px;
      height: 100vh;
      position: absolute;
      left: 0;
      top: 0;
    }

    /* Sidebar Header */
    .sidebar-header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .sidebar-header img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .sidebar-header span {
      font-size: 16px;
      font-weight: bold;
    }

    /* Sidebar Menu */
    .sidebar-menu ul {
      list-style-type: none;
      padding: 0;
    }

    .sidebar-menu li {
      margin-bottom: 10px;
    }

    .sidebar-menu li a {
      font-size: large;
      text-decoration: none;
      color: #333;
      display: block;
      padding: 5px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .sidebar-menu li a:hover {
      background-color: #ddd;
    }

    .sidebar-menu li.active a {
      background-color: #666;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <div class="sidebar-header">
      <img src="https://cdn1.iconfinder.com/data/icons/marketing-19/100/Profile-512.png" alt="Profile Picture" />
      <span> <?php echo $student  ?></span>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li class="active"><a href="studentdashboard.php"><i class="ri-home-2-fill"></i> Home</a></li>
        <li><a href="result.php"><i class="ri-book-fill"></i> Result</a></li>
        <li><a href="feedback.php"><i class="ri-feedback-fill"></i> Feedback</a></li>
        <li><a href="logout.php"><i class="ri-logout-box-fill"></i> Log Out</a></li>
      </ul>
    </div>
  </div>
</body>

</html>