```php
<?php

// Inisiasi variabel yang digunakan

// Nama peralatan
$brg1 = "Buku";
$brg2 = "Mouse";
$brg3 = "FlashDisk";
$brg4 = "Pulpen";

// Harga per unit peralatan
$harga1 = 17500;
$harga2 = 30000;
$harga3 = 70000;
$harga4 = 22300;

// Jumlah peralatan yang ada
$jmlbrg1 = 2;
$jmlbrg2 = 5;
$jmlbrg3 = 1;
$jmlbrg4 = 3;

// Total harga per jenis peralatan
$th1 = $jmlbrg1 * $harga1;
$th2 = $jmlbrg2 * $harga2;
$th3 = $jmlbrg3 * $harga3;
$th4 = $jmlbrg4 * $harga4;

// Hitung grand total nilai peralatan
$tharga = $th1 + $th2 + $th3 + $th4;

// Besar diskon
$diskon = 5;

// Jumlah total diskon yang diberikan
$tdiskon = ($diskon * $tharga) / 100;

// Jumlah yang harus dibayar
$tdibayar = $tharga - $tdiskon;

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Peralatan Yang Dibeli</title>

    <style>
        body {
            font-size: 14pt;
            font-family: Arial, sans-serif;
        }

        table {
            font-size: 14pt;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
        }

        .judul {
            font-family: "Comic Sans MS", cursive;
            font-size: 24px;
            color: blue;
            margin-bottom: 20px;
        }

        .angka {
            text-align: right;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>

<body>

<center>

    <div class="judul">
        Contoh Perhitungan dengan PHP
    </div>

    <table border="1">

        <tr>
            <td colspan="4" align="center">
                <b>Daftar Pemesanan Peralatan Kantor</b>
            </td>
        </tr>

        <tr>
            <td><b>Nama Peralatan</b></td>
            <td><b>Jumlah</b></td>
            <td><b>Harga Satuan</b></td>
            <td><b>Jumlah Harga</b></td>
        </tr>

        <?php
        // Mengisi tabel dengan data yang ada
        ?>

        <tr>
            <td><?php echo $brg1; ?></td>
            <td class="angka"><?php echo $jmlbrg1; ?></td>
            <td class="angka">
                Rp <?php echo number_format($harga1, 0, ',', '.'); ?>
            </td>
            <td class="angka">
                Rp <?php echo number_format($th1, 0, ',', '.'); ?>
            </td>
        </tr>

        <tr>
            <td><?php echo $brg2; ?></td>
            <td class="angka"><?php echo $jmlbrg2; ?></td>
            <td class="angka">
                Rp <?php echo number_format($harga2, 0, ',', '.'); ?>
            </td>
            <td class="angka">
                Rp <?php echo number_format($th2, 0, ',', '.'); ?>
            </td>
        </tr>

        <tr>
            <td><?php echo $brg3; ?></td>
            <td class="angka"><?php echo $jmlbrg3; ?></td>
            <td class="angka">
                Rp <?php echo number_format($harga3, 0, ',', '.'); ?>
            </td>
            <td class="angka">
                Rp <?php echo number_format($th3, 0, ',', '.'); ?>
            </td>
        </tr>

        <tr>
            <td><?php echo $brg4; ?></td>
            <td class="angka"><?php echo $jmlbrg4; ?></td>
            <td class="angka">
                Rp <?php echo number_format($harga4, 0, ',', '.'); ?>
            </td>
            <td class="angka">
                Rp <?php echo number_format($th4, 0, ',', '.'); ?>
            </td>
        </tr>

        <tr class="total">
            <td colspan="3" class="angka">
                Total Harga
            </td>
            <td class="angka">
                Rp <?php echo number_format($tharga, 0, ',', '.'); ?>
            </td>
        </tr>

        <tr>
            <td colspan="3" class="angka">
                Diskon (<?php echo $diskon; ?>%)
            </td>
            <td class="angka">
                Rp <?php echo number_format($tdiskon, 0, ',', '.'); ?>
            </td>
        </tr>

        <tr class="total">
            <td colspan="3" class="angka">
                Jumlah Harus Dibayar
            </td>
            <td class="angka">
                Rp <?php echo number_format($tdibayar, 0, ',', '.'); ?>
            </td>
        </tr>

    </table>

</center>

</body>
</html>
```
