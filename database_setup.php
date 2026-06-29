<?php
// PHP Script to initialize the MySQL database for Nexis Consulting Group Admin Panel.
// Run this file in your browser (e.g. http://localhost/corporate-company-profile/database_setup.php)
// Or via terminal: php database_setup.php

$servername = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASS') ?: ""; 
$dbname_env = getenv('DB_NAME') ?: "nexis_db";
$port = getenv('DB_PORT') ?: 3306;

// 1. Connect to MySQL Server (Without specific database yet)
$conn = mysqli_init();
if (getenv('DB_HOST')) {
    // TiDB Serverless requires SSL
    $conn->ssl_set(NULL, NULL, NULL, NULL, NULL);
    $conn->real_connect($servername, $username, $password, "", $port, NULL, MYSQLI_CLIENT_SSL);
} else {
    $conn->real_connect($servername, $username, $password, "", $port);
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<b>Connected to MySQL server successfully.</b><br><br>";

// 2. Create the Database
$sql = "CREATE DATABASE IF NOT EXISTS `$dbname_env`";
if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname_env' created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// 3. Connect to the newly created Database
$conn->select_db($dbname_env);

// 4. Create `admin_users` table
$sql = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'admin_users' created or already exists.<br>";
} else {
    echo "Error creating table admin_users: " . $conn->error . "<br>";
}

// 5. Create `testimonials` table
$sql = "CREATE TABLE IF NOT EXISTS testimonials (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    client_role VARCHAR(100) NOT NULL,
    quote TEXT NOT NULL,
    avatar_image VARCHAR(255) DEFAULT NULL,
    avatar_initials VARCHAR(2) DEFAULT NULL,
    rating INT(1) DEFAULT 5,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'testimonials' created or already exists.<br>";
} else {
    echo "Error creating table testimonials: " . $conn->error . "<br>";
}

// 6. Create `pricing_plans` table
$sql = "CREATE TABLE IF NOT EXISTS pricing_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plan_name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    billing_period VARCHAR(50) DEFAULT '/mo',
    description TEXT NOT NULL,
    features JSON,
    is_popular BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'pricing_plans' created or already exists.<br>";
} else {
    echo "Error creating table pricing_plans: " . $conn->error . "<br>";
}

// 7. Seed Default Admin User
// Password is "admin123"
$default_admin = "admin";
$default_pass = password_hash("admin123", PASSWORD_DEFAULT);

$checkAdmin = $conn->query("SELECT id FROM admin_users WHERE username = '$default_admin'");
if ($checkAdmin->num_rows == 0) {
    $sql = "INSERT INTO admin_users (username, password_hash) VALUES ('$default_admin', '$default_pass')";
    if ($conn->query($sql) === TRUE) {
        echo "Default admin user created. (Username: <b>admin</b> | Password: <b>admin123</b>)<br>";
    } else {
        echo "Error creating admin user: " . $conn->error . "<br>";
    }
}

// 8. Seed Default Testimonials
$checkTesti = $conn->query("SELECT id FROM testimonials");
if ($checkTesti->num_rows == 0) {
    $sql = "INSERT INTO testimonials (client_name, client_role, quote, avatar_initials, rating) VALUES 
    ('Sarah Jenkins', 'CEO, TechFlow Inc', 'Nexis completely restructured our financial models. We experienced a 30% jump in operational efficiency within the first quarter alone.', 'SJ', 5),
    ('David Chen', 'Operations Director, GlobalTrade', 'The strategic foresight provided by their advisory team is unmatched. They don\'t just consult, they execute at an elite level.', 'DC', 5)";
    if ($conn->query($sql) === TRUE) {
        echo "Default testimonials successfully seeded!<br>";
    }
}

// 9. Seed Default Pricing Plans
$checkPricing = $conn->query("SELECT id FROM pricing_plans");
if ($checkPricing->num_rows == 0) {
    $features1 = json_encode(["Financial assessment", "1 Monthly consultation", "Tax optimization strategy", "Email support"]);
    $features2 = json_encode(["Everything in Standard", "Weekly strategy sessions", "Dedicated risk analyst", "M&A advisory", "24/7 VIP Support"]);
    
    $sql = "INSERT INTO pricing_plans (plan_name, price, billing_period, description, features, is_popular) VALUES 
    ('Enterprise Base', 2500.00, '/mo', 'Perfect for growing businesses needing structural stability and financial advisory.', '$features1', 0),
    ('Corporate Elite', 7500.00, '/mo', 'Comprehensive suite for large corporations requiring dedicated analysts and constant oversight.', '$features2', 1)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Default pricing plans successfully seeded!<br>";
    }
}

// 10. Create `about_section` table
$sql = "CREATE TABLE IF NOT EXISTS about_section (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    subtitle VARCHAR(255) DEFAULT 'About Our Company',
    title VARCHAR(255) NOT NULL DEFAULT 'We Are Highly Committed to Empowering Your Business',
    description TEXT NOT NULL,
    bullet_1 VARCHAR(255) DEFAULT NULL,
    bullet_2 VARCHAR(255) DEFAULT NULL,
    bullet_3 VARCHAR(255) DEFAULT NULL,
    image_filename VARCHAR(255) DEFAULT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'about_section' created or already exists.<br>";
} else {
    echo "Error creating table about_section: " . $conn->error . "<br>";
}

// 11. Seed Default About Section
$checkAbout = $conn->query("SELECT id FROM about_section");
if ($checkAbout->num_rows == 0) {
    $desc = "Founded with a vision to redefine corporate consulting, Nexis Consulting Group brings together elite strategists, financial experts, and HR specialists to drive sustainable growth. Over the past decade, we have partnered with enterprises globally, translating complex market dynamics into actionable business growth.";
    $b1   = "Trusted Professional Advisors";
    $b2   = "Tailored Strategic Solutions";
    $b3   = "Data-Driven Methodologies";
    $sql  = "INSERT INTO about_section (subtitle, title, description, bullet_1, bullet_2, bullet_3)
             VALUES ('About Our Company', 'We Are Highly Committed to Empowering Your Business', '$desc', '$b1', '$b2', '$b3')";
    if ($conn->query($sql) === TRUE) {
        echo "Default about_section data successfully seeded!<br>";
    }
}

$conn->close();

echo "<hr><h2 style='color:green;'>Database setup is fully complete!</h2>";
?>

