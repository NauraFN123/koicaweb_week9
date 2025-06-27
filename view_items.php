<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Semua Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1 class="link-wrapper">Daftar Item</h1>
    <a href="index.php" class="back-link">Kembali ke Dashboard</a>

    <?php
    include 'dbconfig.php'; // Sertakan file koneksi database Anda

    $sql = "SELECT id, product_name, product_desc, price, stock, image_url FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Nama Produk</th><th>Deskripsi</th><th>Harga</th><th>Stok</th><th>Gambar</th></tr></thead>";
        echo "<tbody>";
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td>" . $row["product_desc"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["stock"] . "</td>";
            echo "<td>" . ($row["image_url"] ? "<img src='" . htmlspecialchars($row["image_url"]) . "' alt='" . htmlspecialchars($row["product_name"]) . "' width='50'>" : "N/A") . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Tidak ada item ditemukan.</p>";
    }
    $conn->close();
    ?>
    <p class="tagline">Kelola inventaris Anda dengan mudah dan cepat.</p>
    </div>
    
</body>
</html>