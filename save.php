<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// UPDATE
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE id='" . $_POST["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error update record: " . mysqli_error($conn);
}
mysqli_close($conn);
