<?php
// Ensure no output before session_start
if (ob_get_level()) ob_end_clean();
ob_start();

// Set error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set timezone
ini_set('date.timezone','Asia/Kolkata');
date_default_timezone_set('Asia/Kolkata');

// Configure session security
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', isset($_SERVER["HTTPS"]));

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('initialize.php');
require_once('classes/DBConnection.php');
require_once('classes/SystemSettings.php');
$db = new DBConnection;
$conn = $db->conn;

function redirect($url=''){
    if(!empty($url))
    echo '<script>location.href="'.base_url .$url.'"</script>';
}

function validate_image($file){
    if(!empty($file)){
        $ex = explode('?',$file);
        $file = $ex[0];
        $param = isset($ex[1]) ? '?'.$ex[1] : '';
        if(is_file(base_app.$file)){
            return base_url.$file.$param;
        }else{
            return base_url.'img/no-image-available.png';
        }
    }else{
        return base_url.'img/no-image-available.png';
    }
}

function isMobileDevice(){
    $aMobileUA = array(
        '/iphone/i' => 'iPhone', 
        '/ipod/i' => 'iPod', 
        '/ipad/i' => 'iPad', 
        '/android/i' => 'Android', 
        '/blackberry/i' => 'BlackBerry', 
        '/webos/i' => 'Mobile'
    );

    //Return true if Mobile User Agent is detected
    foreach($aMobileUA as $sMobileKey => $sMobileOS){
        if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
            return true;
        }
    }
    //Otherwise return false..  
    return false;
}

// Don't end output buffering here - let the script handle it
?>