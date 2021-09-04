<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}


