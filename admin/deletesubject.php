<?php 
$sid=$_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$conn) {
    die('Error connection');
}
// Fetch data from the "student" table
$sql = "DELETE FROM subject WHERE id = $sid";
if(mysqli_query($conn,$sql))
{
    echo '<script>alert("Subject deleted Sucessfully")</script>';
    echo "<script>window.location.href='subject.php'</script>";
}
else{
    
    echo '<script>alert("Error")</script>';
    echo "<script>window.location.href='subject.php'</script>";
}
?>