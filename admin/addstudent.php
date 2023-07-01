<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('location:login.php');
}
if($sid=$_GET['id']){
$conn = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$conn) {
    die('Error connection');
}
// Fetch data from the "student" table
$sql = "UPDATE student set status = 'verified' WHERE sid = $sid";
if(mysqli_query($conn,$sql))
{
     echo '<script>alert("Student Added Sucessfully")</script>';
     echo "<script>window.location.href='viewstudent.php'</script>";

}
else{
    echo '<script>alert("Error adding student")</script>';
    echo "<script>window.location.href='viewstudent.php'</script>";
}
}
?>
