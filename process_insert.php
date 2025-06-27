<?php
session_start(); // Mulai session (sesuai contoh di PDF) 
include 'dbconfig.php'; // Sertakan file koneksi database Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir dan lindungi dari injeksi SQL
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = floatval($conn->real_escape_string($_POST['price']));
    $stock = intval($conn->real_escape_string($_POST['stock']));
    $image_url = $conn->real_escape_string($_POST['image_url']);

    // Buat query INSERT dengan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock, image_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $name, $description, $price, $stock, $image_url);

    // Eksekusi query 
    if ($stmt->execute()) { 
        echo "Data berhasil ditambahkan!";
        header("Location: view_items.php"); // Arahkan kembali ke halaman lihat item
        exit();
    } else {
        echo "Error: " . $stmt->error; 
    }
    $stmt->close();
    $conn->close();
} else {
    // Jika akses langsung ke process_insert.php tanpa POST
    echo "Akses tidak valid.";
    echo "<a href='insert_item.php'>Kembali ke formulir</a>";
}
?>