<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Work 2</title>
</head>
<body>
    
    <form method="post">
        <input type="number" name="num" placeholder="Enter number 1-20">
        <br><br>
        <button>Send</button>
        <br><br>
    </form>

<?php

    if (empty($_POST['num'])) {
        echo "Please, enter the number.";
    } elseif ($_POST['num'] < 1 || $_POST['num'] > 20) {
        echo "Please, enter the number from 1 to 20.";
    } else {
        $f_mult = $_POST['num'];
        $s_mult = array();
        $product = array();
        for ($i=1; $i <= 10; $i++) { 
            $product[] = $f_mult * $i;
            $s_mult[] = $i;
        }

        echo "
        <table>
        <tr>
            <th>First multiplier</th>
            <th>Second multiplier</th>
            <th>Product</th>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[0]}</td>
            <td>{$product[0]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[1]}</td>
            <td>{$product[1]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[2]}</td>
            <td>{$product[2]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[3]}</td>
            <td>{$product[3]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[4]}</td>
            <td>{$product[4]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[5]}</td>
            <td>{$product[5]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[6]}</td>
            <td>{$product[6]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[7]}</td>
            <td>{$product[7]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[8]}</td>
            <td>{$product[8]}</td>
        </tr>
        <tr>
            <td>$f_mult</td>
            <td>{$s_mult[9]}</td>
            <td>{$product[9]}</td>
        </tr>
        </table>
        ";


    }


?>
</body>
</html>