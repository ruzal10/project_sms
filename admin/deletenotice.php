<?php
$noticeId = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$conn) {
    die('Error connecting to the database');
}
// Delete the notice from the "Notice" table
$sql = "DELETE FROM Notice WHERE notice_id = $noticeId";
if(mysqli_query($conn, $sql)) {
    echo '<script>alert("Notice deleted successfully")</script>';
    echo "<script>window.location.href='notice.php'</script>";
} else {
    echo '<script>alert("Error deleting notice")</script>';
    echo "<script>window.location.href='notice.php'</script>";
}
?>
