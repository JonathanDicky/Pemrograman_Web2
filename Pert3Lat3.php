<!DOCTYPE html>
<html>
<head>
    <title>Latihan 3 - Switch Case</title>
</head>
<body>

    <h2>Latihan 3 - Switch Case</h2>

    <?php

    $destination = "Tokyo";

    switch ($destination) {

        case "Las Vegas":
            echo "Bring an extra $500";
            break;

        case "Amsterdam":
            echo "Bring an open mind";
            break;

        case "Egypt":
            echo "Bring 15 bottles of SPF 50 Sunscreen";
            break;

        case "Tokyo":
            echo "Bring lots of money";
            break;

        case "Caribbean Islands":
            echo "Bring a swimsuit";
            break;

        default:
            echo "Have a nice trip!";
            break;
    }

    ?>

</body>
</html>