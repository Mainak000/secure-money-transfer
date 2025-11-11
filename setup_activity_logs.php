<?php
require_once('config.php');

// Check if the table already exists
$check_table = $conn->query("SHOW TABLES LIKE 'user_activity_logs'");
if($check_table->num_rows > 0) {
    echo "Table 'user_activity_logs' already exists.";
    exit;
}

// Create the user_activity_logs table
$sql = "CREATE TABLE `user_activity_logs` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `webpage` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if($conn->query($sql)) {
    echo "Table 'user_activity_logs' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}
?> 