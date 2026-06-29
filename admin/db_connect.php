<?php
// admin/db_connect.php

// Prioritize environment variables for Vercel/TiDB Cloud, fallback to XAMPP default
$servername = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASS') ?: ""; 
$dbname = getenv('DB_NAME') ?: "nexis_db";
$port = getenv('DB_PORT') ?: 3306;

// Use error suppression to avoid fatal crashes when XAMPP is off
$conn = mysqli_init();
if (getenv('DB_HOST')) {
    // If TiDB Cloud (or other hosts) require SSL
    $conn->ssl_set(NULL, NULL, NULL, NULL, NULL);
    @$conn->real_connect($servername, $username, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL);
} else {
    // Localhost XAMPP
    @$conn->real_connect($servername, $username, $password, $dbname, $port);
}

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
