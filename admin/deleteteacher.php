<?php 
$tid=$_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$conn) {
    die('Error connection');
}
$sql = "DELETE FROM teachers WHERE id = $tid";
if(mysqli_query($conn,$sql))
{
    echo '<script>alert("Teacher deleted Sucessfully")</script>';
    echo "<script>window.location.href='admindashboard.php'</script>";
}
else{
    
    echo '<script>alert("Error")</script>';
    echo "<script>window.location.href='admindashboard.php'</script>";
}
?>