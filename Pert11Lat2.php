
<?php
// Koneksi ke server MySQL
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat database jika belum ada
$dbname = "lat_dbase";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (mysqli_query($conn, $sql)) {
    echo "Database $dbname berhasil dibuat atau sudah tersedia.";
} else {
    echo "Gagal membuat database: " . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
