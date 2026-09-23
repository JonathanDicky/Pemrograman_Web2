<!DOCTYPE html>
<html>
<body>

<?php

// Array biasa
$x = array("one", "two", "three");

foreach ($x as $value) {
    echo $value . "<br>";
}

echo "<br>";

// Array asosiatif
$b["buah"] = "semangka";
$b["sayur"] = "wortel";
$b["daging"] = "ayam";
$b["utama"] = "nasi";

$jumlah = sizeof($b);

print "Jumlah array b = $jumlah <br>";

// Variabel $jumlah akan bernilai 4

?>

</body>
</html>