<?php
$conn = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$conn) {
  die('Error connection');
}

// for deleting faculty
if(!empty($_GET['fid']))
{
$fid = $_GET['fid'];

$qry1 = "DELETE FROM faculty WHERE id = $fid";
if(mysqli_query($conn,$qry1)){
    echo '<script>alert("Faculty deleted Sucessfully")</script>';
    echo "<script>window.location.href='faculty.php'</script>";
}
else{
    echo '<script>alert("Error,Try again.")</script>';
    echo "<script>window.location.href='faculty.php'</script>";
}
}

// for deleting semester
if(!empty($_GET['sid']))
{
$semid = $_GET['sid'];
$qry1 = "DELETE FROM semester WHERE id = $semid";
if(mysqli_query($conn,$qry1)){
    echo '<script>alert("Semester deleted Sucessfully")</script>';
    echo "<script>window.location.href='faculty.php'</script>";
}
else{
    echo '<script>alert("Error,Try again.")</script>';
    echo "<script>window.location.href='faculty.php'</script>";
}
}
$conn->close();
?>