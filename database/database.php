<?php
// database.php
$host = 'localhost';
$dbname = 'property_db'; // Name of the database you created
$username = 'root';       // Default username for XAMPP
$password = '';           // Default password for XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
