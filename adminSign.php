<?php
 // Connect to MySQL database
 include './conection/conn.php';
 // Get user input
 $username = $_POST['username'];
 $password = $_POST['password'];


 $query = "SELECT admin_Name , admin_Password  FROM tbl_admin WHERE admin_Name = '$username'  AND admin_Password = '$password'";
 $result = $conn->query($query);

 if ($result->num_rows == 1) {
     // User is authenticated
     $row = $result->fetch_assoc();
    
     $_SESSION["admin"] = $row["admin_Name"];
    //  header("Location: admin-home.php"); // Redirect to a dashboard or home page
    echo "ok";
 } else {
     // Authentication failed
     echo "Invalid username or password.";
 }
 
 $conn->close();
?>
