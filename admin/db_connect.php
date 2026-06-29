<?php
// admin/db_connect.php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "nexis_db";

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
