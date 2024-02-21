<?php
// Database configuration ,, i use xampp .
define('DB_HOST', 'localhost');       
define('DB_USERNAME', 'root');        
define('DB_PASSWORD', '');            
define('DB_NAME', 'task_manager');   


$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
