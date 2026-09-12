<!DOCTYPE html>
<html>
<head>
    <title>Latihan 2 - Diskon</title>
</head>
<body>

    <h2>Latihan 2 - Menghitung Diskon</h2>

    <form method="get">

        <label>Besar Pembelian:</label>

        <input 
            type="number" 
            name="total_beli" 
            placeholder="Masukkan jumlah pembelian"
            required
        >

        <br><br>

        <input 
            type="submit" 
            value="Tentukan Diskon"
        >

    </form>

    <br>

    <?php

    if (isset($_GET['total_beli'])) {

        $total_beli = intval($_GET['total_beli']);

        $diskon = 0;

        // Jika pembelian >= 200.000
        if ($total_beli >= 200000) {

            $diskon = 0.10;

        // Jika pembelian >= 100.000
        } elseif ($total_beli >= 100000) {

            $diskon = 0.05;

        // Jika pembelian < 100.000
        } else {

            $diskon = 0.01;
        }

        // Menghitung nominal diskon
        $nominal_diskon = $diskon * $total_beli;

        // Menghitung jumlah yang harus dibayar
        $pembayaran = $total_beli - $nominal_diskon;

        echo "Total Pembelian : Rp " . number_format($total_beli, 0, ',', '.') . "<br>";

        echo "Diskon : " . ($diskon * 100) . "%<br>";

        echo "Nominal Diskon : Rp " .
             number_format($nominal_diskon, 0, ',', '.') .
             "<br>";

        echo "Pembayaran : Rp " .
             number_format($pembayaran, 0, ',', '.') .
             "<br>";
    }

    ?>

</body>
</html>