<?php
$conn = mysqli_connect("localhost","root","root","db_privateinstitutemanagment");
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get JSON data from the client
$data = json_decode(file_get_contents('php://input'), true);

// Insert data into the MySQL table
foreach ($data as $row) {
    $name = $row['name'];
    $age = $row['age'];
    $sql = "INSERT INTO test (name, age) VALUES ('$name', '$age')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        die();
    }
}

echo "Data inserted successfully.";

// Close the database connection
$conn->close();
?>