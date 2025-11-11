<?php
// Test database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = getenv('DB_SERVER') ?: 'db';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: 'root_password';
$database = getenv('DB_NAME') ?: 'mtms_db';

echo "Attempting to connect to database:<br>";
echo "Host: $host<br>";
echo "Username: $username<br>";
echo "Database: $database<br><br>";

try {
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "Connected successfully to database!<br>";
    
    // Test query
    $result = $conn->query("SHOW TABLES");
    if ($result) {
        echo "<br>Tables in database:<br>";
        while ($row = $result->fetch_array()) {
            echo $row[0] . "<br>";
        }
    }
    
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 