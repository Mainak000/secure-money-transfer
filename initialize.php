<?php
$dev_data = array('id'=>'-1','firstname'=>'Developer','lastname'=>'','username'=>'dev_oretnom','password'=>'5da283a2d990e8d8512cf967df5bc0d0','last_login'=>'','date_updated'=>'','date_added'=>'');

// Dynamically determine the base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$script_name = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
if(!defined('base_url')) define('base_url', $protocol . $host . '/');

if(!defined('base_app')) define('base_app', str_replace('\\','/',__DIR__).'/' );
if(!defined('dev_data')) define('dev_data',$dev_data);

// Debug information
error_log("Host detected: " . $host);
error_log("Base URL: " . $protocol . $host . '/');

// Database configuration - check environment variables first, then fall back to defaults
if(!defined('DB_SERVER')) define('DB_SERVER', getenv('DB_SERVER') ?: 'localhost');
if(!defined('DB_USERNAME')) define('DB_USERNAME', getenv('DB_USERNAME') ?: 'root');
if(!defined('DB_PASSWORD')) define('DB_PASSWORD', getenv('DB_PASSWORD') ?: '');
if(!defined('DB_NAME')) define('DB_NAME', getenv('DB_NAME') ?: 'mtms_db');

// Debug database connection settings
error_log("Database connection settings:");
error_log("DB_SERVER: " . DB_SERVER);
error_log("DB_USERNAME: " . DB_USERNAME);
error_log("DB_NAME: " . DB_NAME);
?>