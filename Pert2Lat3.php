<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Latihan 3 - Kalkulator Sederhana</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 80px;
        }

        h2 {
            color: darkred;
        }

        .form-kalkulator {
            margin-top: 30px;
        }

        input,
        select {
            padding: 5px;
            font-size: 16px;
        }

        select {
            width: 50px;
        }

        input[type="submit"] {
            padding: 5px 15px;
            cursor: pointer;
        }

        .hasil {
            margin-top: 30px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Latihan 3 - Kalkulator Sederhana</h2>

    <form method="post" class="form-kalkulator">

        <label>
            <b>Nilai I</b>
        </label>

        <br><br>

        <input
            type="number"
            name="nilai1"
            required
        >

        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input
            type="number"
            name="nilai2"
            required
        >

        <input
            type="submit"
            name="submit"
            value="Submit"
        >

    </form>

    <?php

    if (isset($_POST['submit'])) {

        $nilai1 = $_POST['nilai1'];
        $nilai2 = $_POST['nilai2'];
        $operator = $_POST['operator'];

        $hasil = 0;

        switch ($operator) {

            case "+":
                $hasil = $nilai1 + $nilai2;
                break;

            case "-":
                $hasil = $nilai1 - $nilai2;
                break;

            case "*":
                $hasil = $nilai1 * $nilai2;
                break;

            case "/":

                if ($nilai2 == 0) {
                    echo "<div class='hasil'>";
                    echo "Tidak dapat melakukan pembagian dengan 0.";
                    echo "</div>";
                    exit;
                }

                $hasil = $nilai1 / $nilai2;
                break;

            default:
                echo "<div class='hasil'>";
                echo "Operator tidak valid.";
                echo "</div>";
                exit;
        }

        echo "<div class='hasil'>";
        echo "Hasil : $nilai1 $operator $nilai2 = $hasil";
        echo "</div>";
    }

    ?>

</body>

</html>