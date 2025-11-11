<?php
// Include configuration file
require_once('config.php');

// Create database connection
$db = new mysqli($server, $username, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Update the system name
$sql = "UPDATE system_info SET meta_value = 'IIT Hyderabad Money Transfer' WHERE meta_field = 'name'";

if ($db->query($sql) === TRUE) {
    echo "System name updated successfully to 'IIT Hyderabad Money Transfer'";
    
    // Clear the session to ensure the new name is loaded
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION['system_info']['name'])) {
        $_SESSION['system_info']['name'] = 'IIT Hyderabad Money Transfer';
    }
    
    echo "<p>Session updated as well.</p>";
    echo "<p><a href='login.php'>Go to login page</a></p>";
} else {
    echo "Error updating system name: " . $db->error;
}

$db->close();
?> 