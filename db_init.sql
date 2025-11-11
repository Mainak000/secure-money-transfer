-- Initialize MIMT database schema

-- Create users table
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `branch_id` int(30) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `biography` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create user_activity_logs table
CREATE TABLE IF NOT EXISTS `user_activity_logs` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `webpage` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create branch_list table
CREATE TABLE IF NOT EXISTS `branch_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default branch
INSERT INTO `branch_list` (`name`, `address`, `status`) VALUES
('Main Branch', 'IIT Hyderabad Campus', 1);

-- Create transaction_list table
CREATE TABLE IF NOT EXISTS `transaction_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `tracking_code` varchar(100) NOT NULL,
  `user_id` int(30) NOT NULL,
  `send_to` int(30) NOT NULL,
  `sending_amount` float NOT NULL DEFAULT 0,
  `purpose` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=confirmed, 2=cancelled',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create fee_list table
CREATE TABLE IF NOT EXISTS `fee_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `minimum_amount` float NOT NULL DEFAULT 0,
  `maximum_amount` float NOT NULL DEFAULT 0,
  `fee` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create system_info table
CREATE TABLE IF NOT EXISTS `system_info` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user
INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`, `avatar`, `type`, `branch_id`, `email`, `phone`, `balance`) VALUES
('Admin', 'User', 'admin', '457805b4392b2afbfa95aab0ec1b90b4', NULL, 1, NULL, 'admin@mimt.com', '1234567890', 1000.00);
