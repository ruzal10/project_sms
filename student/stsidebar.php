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
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

  }

  /* Sidebar Container */
  .sidebar {
    background-color: #f2f2f2;
    width: 170px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
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
    width: 100%;
  }

  .sidebar-menu li {
    margin-bottom: 10px;
  }

  .sidebar-menu li a {
    font-size: 20px;
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
    padding: 5px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .sidebar-menu li a i {
    margin-right: 10px;
  }

  .sidebar-menu li a:hover {
    background-color: #ddd;
  }

  .sidebar-menu li.active a {
    background-color: #666;
    color: #fff;
  }
</style>
<div class="sidebar">
  <div class="sidebar-header">
    <img src="https://cdn1.iconfinder.com/data/icons/marketing-19/100/Profile-512.png" alt="Profile Picture" />
    <span>Admin</span>
  </div>
  <div class="sidebar-menu">
    <ul>
      <li><a href="studentdashboard.php"><i class="ri-home-2-fill"></i> Home</a></li>
      <li><a href="result.php"><i class="ri-book-fill"></i> Result</a></li>
      <li><a href="notice.php"><i class="ri-sticky-note-fill"></i> Notice</a></li>
      <li><a href="feedback.php"><i class="ri-feedback-fill"></i> Feedback</a></li>
      <li><a href="logout.php"><i class="ri-logout-box-fill"></i> Log Out</a></li>
    </ul>
  </div>
</div>