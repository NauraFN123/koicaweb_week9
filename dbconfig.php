<?php
$config = parse_ini_file('db/db.ini');
$conn = new mysqli("localhost", $config['username'], $config['password'], $config['dbname'], 3307); // Tambahkan port di sini

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>