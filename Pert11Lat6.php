
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

// Menampilkan data mahasiswa
while ($data = mysqli_fetch_array($hasil)) {
    echo $data['FirstName'] . " ";
    echo $data['LastName'] . " ";
    echo $data['Age'] . "<br>";
}

// Menutup koneksi
mysqli_close($conn);
?>
