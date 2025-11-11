<?php
// Test user registration
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('initialize.php');
require_once('classes/DBConnection.php');
require_once('classes/Users.php');

echo "<h2>Testing User Registration</h2>";

// Create test user data
$_POST = array(
    'firstname' => 'Test',
    'lastname' => 'User',
    'username' => 'testuser' . rand(1000, 9999),
    'email' => 'testuser' . rand(1000, 9999) . '@example.com',
    'password' => 'Test@123', // Meets all requirements: capital, number, special char, under 12 chars
    'phone' => '1234567890',
    'type' => '2', // Regular user
    'branch_id' => '1',
    'biography' => 'Test user for debugging'
);

echo "Attempting to register user with data:<br>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Debug database connection
echo "<h3>Database Connection Test</h3>";
try {
    $host = getenv('DB_SERVER') ?: 'db';
    $username = getenv('DB_USERNAME') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: 'root_password';
    $database = getenv('DB_NAME') ?: 'mtms_db';
    
    echo "Connection parameters:<br>";
    echo "Host: $host<br>";
    echo "Username: $username<br>";
    echo "Database: $database<br><br>";
    
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "Connected successfully to database!<br>";
    
    // Check if users table exists
    $result = $conn->query("SHOW TABLES LIKE 'users'");
    if ($result->num_rows > 0) {
        echo "Users table exists.<br>";
    } else {
        echo "Users table does not exist!<br>";
    }
    
    $conn->close();
} catch (Exception $e) {
    echo "Database connection error: " . $e->getMessage() . "<br>";
}

echo "<h3>User Registration Test</h3>";
try {
    // Initialize Users class
    $users = new Users();
    
    // Call the registration function
    $result = $users->save_rusers();
    
    echo "<br>Registration result:<br>";
    echo "<pre>";
    var_dump($result);
    echo "</pre>";
    
    // Decode JSON result if it's a string
    if (is_string($result)) {
        echo "<br>Decoded result:<br>";
        echo "<pre>";
        $decoded = json_decode($result, true);
        print_r($decoded);
        echo "</pre>";
    }
    
} catch (Exception $e) {
    echo "Error during registration: " . $e->getMessage() . "<br>";
    echo "Stack trace: <pre>" . $e->getTraceAsString() . "</pre>";
}
?> 