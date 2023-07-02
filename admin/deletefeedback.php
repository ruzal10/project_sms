<?php
$feedbackId = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$conn) {
    die('Error connecting to the database');
}
// Delete the notice from the "Notice" table
$sql = "DELETE FROM feedback WHERE id = $feedbackId";
if(mysqli_query($conn, $sql)) {
    echo '<script>alert("feedback deleted successfully")</script>';
    echo "<script>window.location.href='feedback.php'</script>";
} else {
    echo '<script>alert("Error deleting feedback")</script>';
    echo "<script>window.location.href='feedback.php'</script>";
}
