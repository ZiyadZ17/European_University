<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HomeWork 2</title>
</head>
<body>
    
<form method="post">
    <input type="text" name="name"> - Name
    <br><br>
    <input type="text" name="surname"> - Surname
    <br><br>
    <input type="number" name="weight"> - Weight in kg
    <br><br>
    <input type="number" name="height"> - Height in cm
    <br><br>
    <button>Send</button>
    <br><br>
</form>

<?php

    if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['weight']) || empty($_POST['height'])) {
        echo "Please, fill all fields.";
    } elseif ($_POST['weight'] <= 0 || $_POST['height'] <= 0) {
        echo "Please, enter correct weight and height.";
    } else {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $weight = $_POST['weight'];
        $height_cm = $_POST['height'];

        $height_m = $height_cm / 100;
        $bmi = $weight / $height_m ** 2;
        $category = "";

        if ($bmi < 18.5) {
            $category = "Underweight";
        } elseif ($bmi < 24.9) {
            $category = "Normal weight";
        } elseif ($bmi < 29.9) {
            $category = "Overweight";
        } elseif ($bmi >= 30) {
            $category = "Obesity";
        }

        $bmi_rounded = round($bmi, 2);

        echo "
        <table>
        <tr>
            <td class='bold'>Name</td>
            <td>$name</td>
        </tr>
        <tr>
            <td class='bold'>Surname</td>
            <td>$surname</td>
        </tr>
        <tr>
            <td class='bold'>Weight</td>
            <td>$weight kg</td>
        </tr>
        <tr>
            <td class='bold'>Height</td>
            <td>$height_cm cm</td>
        </tr>
        <tr>
            <td class='bold'>BMI</td>
            <td>$bmi_rounded</td>
        </tr>
        <tr>
            <td class='bold'>Category</td>
            <td>$category</td>
        </tr>
        </table>
        ";
    }

?>
</body>
</html>