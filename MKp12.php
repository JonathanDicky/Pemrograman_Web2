
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "artikel_db";

// Koneksi ke server MySQL
$connection = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$connection) {
    die("Tidak dapat terhubung dengan database: " . mysqli_connect_error());
}

// Membuat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS `$dbname`";

if (!mysqli_query($connection, $sql)) {
    die("Gagal membuat database: " . mysqli_error($connection));
}

// Memilih database
if (!mysqli_select_db($connection, $dbname)) {
    die("Tidak dapat memilih database: " . mysqli_error($connection));
}

echo "Berhasil terhubung dengan database artikel_db!";

?>
