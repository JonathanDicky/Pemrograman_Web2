
<?php
// Koneksi ke server MySQL
$con = mysqli_connect("localhost", "root", "");

if (!$con) {
    die("Tidak dapat terhubung: " . mysqli_connect_error());
}

// Memilih database
mysqli_select_db($con, "lat_dbase");

// Memasukkan data Karina
$sql1 = "INSERT INTO tbl_mhs (FirstName, LastName, Age)
         VALUES ('Karina', 'Suwandi', 29)";

if (mysqli_query($con, $sql1)) {
    echo "Data Karina berhasil ditambahkan.<br>";
} else {
    echo "Gagal menambahkan data Karina: " . mysqli_error($con) . "<br>";
}

// Memasukkan data Glenn
$sql2 = "INSERT INTO tbl_mhs (FirstName, LastName, Age)
         VALUES ('Glenn', 'Gandari', 32)";

if (mysqli_query($con, $sql2)) {
    echo "Data Glenn berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan data Glenn: " . mysqli_error($con);
}

// Menutup koneksi
mysqli_close($con);
?>
