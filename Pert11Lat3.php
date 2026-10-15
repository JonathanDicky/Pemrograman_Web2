
<?php
// Koneksi ke server MySQL
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memilih database
mysqli_select_db($conn, "lat_dbase");

// Membuat tabel jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS tbl_mhs (
    mhsID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(15),
    LastName VARCHAR(15),
    Age INT
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabel tbl_mhs berhasil dibuat atau sudah tersedia.<br>";
} else {
    die("Gagal membuat tabel: " . mysqli_error($conn));
}

// Memeriksa apakah data Anjar sudah ada
$cek = mysqli_query($conn, "SELECT * FROM tbl_mhs
    WHERE FirstName = 'Anjar'
    AND LastName = 'Prabowo'
    AND Age = 25");

if (mysqli_num_rows($cek) == 0) {
    $input = mysqli_query($conn, "INSERT INTO tbl_mhs
        (FirstName, LastName, Age)
        VALUES ('Anjar', 'Prabowo', 25)");

    if ($input) {
        echo "Data Anjar Prabowo berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
} else {
    echo "Data Anjar Prabowo sudah tersedia.";
}

// Menutup koneksi
mysqli_close($conn);
?>
