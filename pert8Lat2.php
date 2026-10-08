<html>

<head>
    <title>Contoh Penggunaan UDF</title>
</head>

<body>

<form method="post">
    Masukkan Bilangan Pertama : <br>
    <input type="text" name="A" size="10"><br>

    Masukkan Bilangan Kedua : <br>
    <input type="text" name="B" size="10"><br>

    <input type="submit" value="hitung">
</form>

<?php

if (isset($_POST["A"]) && isset($_POST["B"])) {

    $A = $_POST["A"];
    $B = $_POST["B"];

    function jumlah($A, $B)
    {
        return $A + $B;
    }

    function kurang($A, $B)
    {
        return $A - $B;
    }

    function kali($A, $B)
    {
        return $A * $B;
    }

    function bagi($A, $B)
    {
        return $A / $B;
    }

    echo "<br>";
    echo "Bilangan Pertama : " . $A;
    echo "<br>";

    echo "Bilangan Kedua : " . $B;
    echo "<br><br>";

    $jumlahbil = jumlah($A, $B);
    echo "Hasil Penjumlahan 2 buah bilangan<br>";
    printf("Penjumlahan antara : %d + %d = %d", $A, $B, $jumlahbil);

    echo "<br><br>";

    $kurangbil = kurang($A, $B);
    echo "Hasil Pengurangan 2 buah bilangan<br>";
    printf("Pengurangan antara : %d - %d = %d", $A, $B, $kurangbil);

    echo "<br><br>";

    $kalibil = kali($A, $B);
    echo "Hasil Perkalian 2 buah bilangan<br>";
    printf("Perkalian antara : %d * %d = %d", $A, $B, $kalibil);

    echo "<br><br>";

    if ($B != 0) {
        $bagibil = bagi($A, $B);
        echo "Hasil Pembagian 2 buah bilangan<br>";
        printf("Pembagian antara : %d / %d = %.2f", $A, $B, $bagibil);
    } else {
        echo "Pembagian dengan 0 tidak dapat dilakukan.";
    }
}

?>

</body>
</html>