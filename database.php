<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portofolio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
