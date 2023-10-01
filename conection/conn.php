<?php
$conn = mysqli_connect("localhost","root","root","db_privateinstitutemanagment");
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>