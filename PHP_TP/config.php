<?php
// Database configuration ,, i use xampp .
define('DB_HOST', 'localhost');       
define('DB_USERNAME', 'root');        
define('DB_PASSWORD', '');            // Database password (default is blank for XAMPP/WAMP)
define('DB_NAME', 'task_manager');    // Database name

// Attempt to connect to MySQL database
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to utf8mb4 to support Unicode characters
$conn->set_charset("utf8mb4");
?>
