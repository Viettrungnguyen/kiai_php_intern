<?php
$conn = mysqli_connect('localhost', 'root', '', 'registeruser') or die('Không thể kết nối tới database');

$sql = "DELETE FROM users WHERE id='" . $_POST["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>