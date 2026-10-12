<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Work 2</title>
</head>
<body>

<?php
    $products = array("Grand Theft Auto"=>44.99, "Skyrim"=>24.99, "Assassin's Creed: Black Flag"=>59.99, "Elden Ring"=>39.99, "Resident Evil Requiem"=>52.49, "The Last Of Us: PART I"=>49.99, "Red Dead Redemption 2"=>59.99, "The Forest"=>10.49, "Detroit: Become Human"=>31.99);

    echo "<form method='POST'>";
    echo "<table>";
    foreach ($products as $game => $price) {
        echo "
            <tr>
                <td class='bold'>$game <span style='color: green;'>$price $</span></td>
            </tr>
            <tr>
                <td><input type='number' name='count[$game]' placeholder='How many?'></td>
            </tr>
        ";
    }

    echo "</table>";
    echo "<br><br>";
    echo "
        <table>
            <tr>
                <td>Select your offer</td>
                <td>
                    <select name='discount'>
                        <option value='0'>0%</option>
                        <option value='5'>5%</option>
                        <option value='10'>10%</option>
                    </select>
                </td>
            </tr>
        </table>
    ";
    echo "<br><br>";
    echo "<button>Send</button>";
    echo "<br><br>";

    echo "</form>";
    echo "<br><br>";
?>

<?php

    if (isset($_POST['count'])) {
    $sum_without_VAT = 0;


    echo "<table>";
    echo "
        <tr>
            <td class='bold'>Name</td>
            <td class='bold'>Price</td>
            <td class='bold'>Quantity</td>
            <td class='bold'>Total</td>
        </tr>    
    ";
    $count = $_POST['count'] ?? [];
    foreach ($count as $game => $quantity) {
        if ($quantity > 0) {
            $current_price = $products[$game];
            $sum = $quantity * $current_price;
            $sum_without_VAT += $sum;
            echo "
                <tr>
                    <td>$game</td>
                    <td>$current_price</td>
                    <td>$quantity</td>
                    <td>$sum</td>
                </tr>
                ";
        }
    }
    echo "</table>";
    echo "<br><br>";

    $discount = $_POST['discount'] ?? 0;
    $discount_amount = $sum_without_VAT * ($discount / 100);
    $discount_sum = $sum_without_VAT - $discount_amount;

    $sum_with_VAT = round($discount_sum * 1.18, 2);

    echo "
        <table>
            <tr>
                <th>Total without VAT</th>
                <th>Discount</th>
                <th>VAT</th>
                <th>Total with VAT</th>
            </tr>
            <tr>
                <td>$discount_sum</td>
                <td>$discount</td>
                <td>18%</td>
                <td>$sum_with_VAT</td>
            </tr>
        </table>
    ";
    }
?>
</body>
</html>