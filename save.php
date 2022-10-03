<?php
$conn = mysqli_connect('localhost', 'root', '', 'registeruser') or die('Không thể kết nối tới database');
// UPDATE
$id = $_GET['id'];
$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "UPDATE `users` SET `username`='$name',`email`='$email',`password`='$password' WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error update record: " . mysqli_error($conn);
}
mysqli_close($conn);
