
<?php
session_start();

// Koneksi ke database
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "pendaftaran_db"
);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$error = "";

// Proses submit form
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

    $lokasi = $_POST["lokasi"] ?? "";
    $gelombang = $_POST["gelombang"] ?? "";
    $nama = trim($_POST["nama"] ?? "");
    $jk = $_POST["jk"] ?? "";
    $ttl = trim($_POST["ttl"] ?? "");
    $sekolah = trim($_POST["sekolah"] ?? "");
    $pekerjaan = trim($_POST["pekerjaan"] ?? "");

    $mat = $_POST["mat"] ?? "";
    $bing = $_POST["bing"] ?? "";
    $umum = $_POST["umum"] ?? "";

    // Validasi data
    if (
        !in_array($lokasi, ["A", "B", "V"], true) ||
        !in_array($gelombang, ["1", "2", "3", "4"], true) ||
        !in_array($jk, ["Laki-laki", "Perempuan"], true) ||
        $nama === "" || $ttl === "" ||
        $sekolah === "" || $pekerjaan === "" ||
        $mat === "" || $bing === "" || $umum === "" ||
        !is_numeric($mat) ||
        !is_numeric($bing) ||
        !is_numeric($umum) ||
        $mat < 0 || $mat > 100 ||
        $bing < 0 || $bing > 100 ||
        $umum < 0 || $umum > 100
    ) {
        $error = "Data belum lengkap atau nilai tidak valid!";
    } else {

        // Nomor pendaftar berdasarkan data di database
        $resultNomor = mysqli_query(
            $conn,
            "SELECT COUNT(*) AS total FROM pendaftar"
        );

        $rowNomor = mysqli_fetch_assoc($resultNomor);
        $nomor = (int)$rowNomor["total"] + 101;

        // Membuat kode pendaftaran
        $kodeBulan = substr((string)date("n"), -1);

        $kode = $lokasi . $gelombang . "-" .
                str_pad($nomor, 3, "0", STR_PAD_LEFT) .
                "-" . $kodeBulan;

        // Menghitung nilai rata-rata
        $mat = (float)$mat;
        $bing = (float)$bing;
        $umum = (float)$umum;

        $rata = ($mat + $bing + $umum) / 3;

        // Menentukan kelulusan
        if ($rata >= 70) {
            $ket = "Lulus";
        } elseif ($rata >= 60) {
            $ket = "Cadangan";
        } else {
            $ket = "Tidak Lulus";
        }

        // Menyimpan data ke database
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO pendaftar
            (kode, nama, jk, ttl, sekolah, pekerjaan,
             mat, bing, umum, rata, ket)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ssssssdddds",
            $kode,
            $nama,
            $jk,
            $ttl,
            $sekolah,
            $pekerjaan,
            $mat,
            $bing,
            $umum,
            $rata,
            $ket
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
        } else {
            $error = "Gagal menyimpan data pendaftar.";
        }

        mysqli_stmt_close($stmt);
    }
}

// Mengambil seluruh data dari database
$data = [];
$result = mysqli_query(
    $conn,
    "SELECT * FROM pendaftar ORDER BY id ASC"
);

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Menghitung jumlah pendaftar dan kelulusan
$total = count($data);
$lulus = 0;
$tidakLulus = 0;

foreach ($data as $p) {
    if ($p["ket"] === "Lulus") {
        $lulus++;
    } elseif ($p["ket"] === "Tidak Lulus") {
        $tidakLulus++;
    }
}

// Mengamankan output HTML
function e($value) {
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        "UTF-8"
    );
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f3f5;
            margin: 0;
            padding: 20px;
            color: #222;
        }

        .container {
            max-width: 1150px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px #0001;
        }

        h2, h3 {
            text-align: center;
        }

        h2 {
            margin-bottom: 5px;
        }

        .subjudul {
            text-align: center;
            margin-bottom: 25px;
            color: #555;
        }

        .info {
            background: #eaf2ff;
            border-left: 4px solid #2563eb;
            padding: 12px;
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 180px minmax(0, 1fr);
            gap: 12px;
            align-items: center;
            width: 100%;
            max-width: 100%;
        }

        label {
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 9px;
            border: 1px solid #bbb;
            border-radius: 4px;
            font-size: 14px;
        }

        .radio-group {
            display: flex;
            gap: 18px;
            align-items: center;
        }

        .radio-group label {
            font-weight: normal;
        }

        .radio-group input {
            width: auto;
        }

        .buttons {
            margin: 20px 0 30px 180px;
            display: flex;
            gap: 10px;
        }

        button {
            border: none;
            padding: 10px 22px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .submit {
            background: #2563eb;
            color: white;
        }

        .batal {
            background: #ddd;
            color: #222;
        }

        .submit:hover {
            background: #1d4ed8;
        }

        .error {
            padding: 12px;
            color: #991b1b;
            background: #fee2e2;
            margin-bottom: 15px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 13px;
        }

        th, td {
            border: 1px solid #999;
            padding: 9px 7px;
            text-align: center;
        }

        th {
            background: #e5e7eb;
        }

        td.nama, td.sekolah {
            text-align: left;
        }

        .lulus {
            color: #15803d;
            font-weight: bold;
        }

        .cadangan {
            color: #b45309;
            font-weight: bold;
        }

        .tidak {
            color: #b91c1c;
            font-weight: bold;
        }

        .ringkasan {
            margin-top: 20px;
            max-width: 450px;
            margin-left: auto;
        }

        .ringkasan td {
            text-align: left;
        }

        .ringkasan td:last-child {
            text-align: right;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            body {
                padding: 8px;
            }

            .container {
                padding: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 7px;
            }

            .buttons {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <h2>PENDAFTARAN MAHASISWA BARU</h2>
    <div class="subjudul">
        Program Penerimaan Mahasiswa Baru
    </div>

    <div class="info">
        <strong>Jumlah Data:</strong>
        <?= $total; ?> pendaftar
    </div>

    <h3>INPUT PENDAFTARAN</h3>

    <?php if ($error !== ""): ?>
        <div class="error"><?= e($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-grid">

            <label>Lokasi Tes</label>
            <select name="lokasi" required>
                <option value="">-- Pilih Gedung --</option>
                <option value="A">A - Gedung A</option>
                <option value="B">B - Gedung B</option>
                <option value="V">V - Viktor</option>
            </select>

            <label>Gelombang</label>
            <select name="gelombang" required>
                <option value="">-- Pilih Gelombang --</option>
                <option value="1">Gelombang 1</option>
                <option value="2">Gelombang 2</option>
                <option value="3">Gelombang 3</option>
                <option value="4">Gelombang 4</option>
            </select>

            <label>Nama Pendaftar</label>
            <input type="text" name="nama"
                   placeholder="Masukkan nama lengkap" required>

            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="jk"
                           value="Laki-laki" required>
                    Laki-laki
                </label>

                <label>
                    <input type="radio" name="jk"
                           value="Perempuan" required>
                    Perempuan
                </label>
            </div>

            <label>TTL</label>
            <input type="text" name="ttl"
                   placeholder="Contoh: Tangerang, 10-05-2005"
                   required>

            <label>Asal Sekolah</label>
            <input type="text" name="sekolah" required>

            <label>Pekerjaan Orang Tua</label>
            <input type="text" name="pekerjaan" required>

            <label>Nilai Matematika</label>
            <input type="number" name="mat" min="0" max="100"
                   step="any" required>

            <label>Nilai Bahasa Inggris</label>
            <input type="number" name="bing" min="0" max="100"
                   step="any" required>

            <label>Nilai Umum</label>
            <input type="number" name="umum" min="0" max="100"
                   step="any" required>

        </div>

        <div class="buttons">
            <button class="submit" type="submit" name="submit">
                SUBMIT
            </button>

            <button class="batal" type="reset">
                BATAL
            </button>
        </div>
    </form>

    <h3>TABEL DATA PENDAFTAR</h3>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Pendaftar</th>
                    <th>Jns Kel</th>
                    <th>TTL</th>
                    <th>Asal Sekolah</th>
                    <th>Pek. Ortu</th>
                    <th>Mat</th>
                    <th>B. Ingr</th>
                    <th>Umum</th>
                    <th>Rata-Rata</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>
            <?php if ($total === 0): ?>
                <tr>
                    <td colspan="12">
                        Belum ada data pendaftar.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($data as $i => $p): ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= e($p["kode"]); ?></td>
                        <td class="nama"><?= e($p["nama"]); ?></td>
                        <td><?= e($p["jk"]); ?></td>
                        <td><?= e($p["ttl"]); ?></td>
                        <td class="sekolah"><?= e($p["sekolah"]); ?></td>
                        <td><?= e($p["pekerjaan"]); ?></td>
                        <td><?= e($p["mat"]); ?></td>
                        <td><?= e($p["bing"]); ?></td>
                        <td><?= e($p["umum"]); ?></td>
                        <td><?= number_format($p["rata"], 2); ?></td>
                        <td class="<?=
                            $p["ket"] === "Lulus" ? "lulus" :
                            ($p["ket"] === "Cadangan" ? "cadangan" : "tidak");
                        ?>">
                            <?= e($p["ket"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <table class="ringkasan">
        <tr>
            <td>JUMLAH PENDAFTAR</td>
            <td><?= $total; ?></td>
        </tr>
        <tr>
            <td>JUMLAH PESERTA LULUS</td>
            <td><?= $lulus; ?></td>
        </tr>
        <tr>
            <td>JUMLAH PESERTA TIDAK LULUS</td>
            <td><?= $tidakLulus; ?></td>
        </tr>
    </table>

</div>
</body>
</html>