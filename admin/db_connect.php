<?php
// admin/db_connect.php
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
    // Pengaturan Localhost (XAMPP)
    $username = "root";
    $password = ""; 
    $dbname = "nexis_db";
} else {
    // Pengaturan Online (Rumahweb cPanel)
    $username = "movh6621_nesa";
    $password = "Nexa123#"; 
    $dbname = "movh6621_nesa";
}
$servername = "localhost"; // Selalu localhost di cPanel

// Use error suppression to avoid fatal crashes when XAMPP is off
$conn = @new mysqli($servername, $username, $password, $dbname);

$db_connected = true;
if ($conn->connect_error) {
    $db_connected = false;
} else {
    // Only check for tables if connection was successful
    $check_tables = @mysqli_query($conn, "SHOW TABLES LIKE 'testimonials'");
    if (!$check_tables) {
         $db_connected = false;
    }
}
?>
