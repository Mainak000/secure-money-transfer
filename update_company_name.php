<?php
require_once('config.php');
require_once('classes/DBConnection.php');
$db = new DBConnection;
$conn = $db->conn;

// Update company name
$update_query = "UPDATE system_info SET meta_value='IIT Hyderabad Money Transfer' WHERE meta_field='name'";
$result = $conn->query($update_query);

// Update short name
$update_short_name = "UPDATE system_info SET meta_value='IIT-H' WHERE meta_field='short_name'";
$result2 = $conn->query($update_short_name);

if ($result && $result2) {
    echo "<h2>Company name updated successfully!</h2>";
    echo "<p>The company name has been changed to 'IIT Hyderabad Money Transfer'.</p>";
    echo "<p>The short name has been changed to 'IIT-H'.</p>";
} else {
    echo "<h2>Error updating company information</h2>";
    echo "<p>Error: " . $conn->error . "</p>";
}
?> 