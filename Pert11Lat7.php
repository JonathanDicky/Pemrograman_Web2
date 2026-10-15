
<?php
// Koneksi ke server MySQL
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memilih database
mysqli_select_db($conn, "lat_dbase");

// Mengambil seluruh data mahasiswa
$hasil = mysqli_query($conn, "SELECT * FROM tbl_mhs");

// Menghitung jumlah record
$hit = mysqli_num_rows($hasil);

// Menampilkan jumlah record
echo "Jumlah record: $hit";

// Menutup koneksi
mysqli_close($conn);
?>
