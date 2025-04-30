<?php
// File: includes/db_connect.php

// Database connection settings
$servername = "localhost";  // XAMPP server is always localhost
$username = "root";          // Default username in XAMPP
$password = "";              // Default password is empty
$database = "sarawak_connect"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
