<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukkan Item Baru</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Masukkan Item Baru</h1>
    <a href="index.php" class="back-link">Kembali ke Dashboard</a> 

    <form action="process_insert.php" method="POST">
        <label for="product_name">Nama Produk:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="product_desc">Deskripsi:</label>
        <textarea id="description" name="description" rows="4"></textarea><br>

        <label for="price">Harga:</label>
        <input type="number" id="price" name="price" step="0.01" required><br>

        <label for="stock">Stok:</label>
        <input type="number" id="stock" name="stock" required><br>

        <label for="image_url">URL Gambar (Opsional):</label>
        <input type="text" id="image_url" name="image_url"><br>

        <input type="submit" value="Tambahkan Item">
    </form>
    <p class="tagline">Tambahkan produk baru ke inventaris Anda dengan mudah.</p>
    </div>
</body>
</html>