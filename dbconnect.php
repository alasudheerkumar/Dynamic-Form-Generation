<?php
$servername = "SERVER_NAME";
$username = "USER_NAME";
$password = "PASSWORD";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>