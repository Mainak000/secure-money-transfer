<?php
// Test database structure
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$host = getenv('DB_SERVER') ?: 'db';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: 'root_password';
$database = getenv('DB_NAME') ?: 'mtms_db';

echo "<h1>Database Structure Test</h1>";
echo "<h2>Connection Parameters:</h2>";
echo "Host: $host<br>";
echo "Username: $username<br>";
echo "Database: $database<br><br>";

try {
    // Connect to database
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "<h2>Connection successful!</h2>";
    
    // Check users table structure
    $result = $conn->query("DESCRIBE users");
    if ($result) {
        echo "<h2>Users Table Structure:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "<td>" . $row['Extra'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "Error getting users table structure: " . $conn->error;
    }
    
    // Close connection
    $conn->close();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 