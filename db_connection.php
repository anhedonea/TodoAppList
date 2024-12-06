<?php
$servername = "localhost";
$username = "root";
$password = "";  // Leave blank if no password
$dbname = "todo_list";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists.\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Select the database
$conn->select_db($dbname);

// Create the tasks table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT
)";

if ($conn->query($table_sql) === TRUE) {
    echo "Table 'tasks' created successfully or already exists.\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}
?>
