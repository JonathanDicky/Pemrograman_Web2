<?php

$brush_price = 5;
$counter = 10;

echo "<table border=\"1\" align=\"center\">";
echo "<tr>";
echo "<th>Quantity</th>";
echo "<th>Price</th>";
echo "</tr>";

while ($counter <= 100) {
    echo "<tr>";
    echo "<td>";
    echo $counter;
    echo "</td>";
    echo "<td>";
    echo $brush_price * $counter;
    echo "</td>";
    echo "</tr>";

    $counter = $counter + 10;
}

echo "</table>";

?>