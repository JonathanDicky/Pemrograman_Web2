<!DOCTYPE html>
<html>
<head>
    <title>Latihan 1 - If Elseif</title>
</head>
<body>

    <h2>Latihan 1 - Menentukan Warna</h2>

    <?php

    $ball = "purple";

    // Menentukan warna berdasarkan nilai $ball
    if ($ball == "red") {
        $redbox = $ball;

    } elseif ($ball == "yellow") {
        $yellowbox = $ball;

    } elseif ($ball == "blue") {
        $bluebox = $ball;

    } elseif ($ball == "green") {
        $greenbox = $ball;

    } elseif ($ball == "purple") {
        $purplebox = $ball;

    } else {
        $colorlessbox = $ball;
    }

    echo "Red box : " . ($redbox ?? "") . "<br>";
    echo "Yellow box : " . ($yellowbox ?? "") . "<br>";
    echo "Blue box : " . ($bluebox ?? "") . "<br>";
    echo "Green box : " . ($greenbox ?? "") . "<br>";
    echo "Purple box : " . ($purplebox ?? "") . "<br>";
    echo "Colorless box : " . ($colorlessbox ?? "") . "<br>";

    ?>

</body>
</html>