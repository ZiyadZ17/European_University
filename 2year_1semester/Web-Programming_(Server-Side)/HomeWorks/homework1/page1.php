<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Work 1</title>
</head>
<body>
    
    <form>
        <input type="text" name="name"> - Name
        <br><br>
        <input type="text" name="surname"> - Surname
        <br><br>
        <input type="text" name="position"> - Position
        <br><br>
        <input type="text" name="salary"> - Salary
        <br><br>
        <input type="text" name="tax"> - Tax
        <br><br>
        <button>Send</button>
    </form>

<?php


if (isset($_GET['name'])) {
$name = $_GET['name'];
$surname = $_GET['surname'];
$position = $_GET['position'];
$salary = (float)$_GET['salary'];
$taxPercent = (!empty($_GET['tax'])) ? (float)$_GET['tax'] : 20;

$taxAmount = $salary * ($taxPercent / 100);
$realSalary = $salary - $taxAmount;
echo "<table style='border: 1px solid black'>
        <tr>
            <td style='border: 1px solid black'>Name</td>
            <td style='border: 1px solid black'>$name</td>
        </tr>
        <tr>
            <td style='border: 1px solid black'>Surname</td>
            <td style='border: 1px solid black'>$surname</td>
        </tr>
        <tr>
            <td style='border: 1px solid black'>Position</td>
            <td style='border: 1px solid black'>$position</td>
        </tr>
        <tr>
            <td style='border: 1px solid black'>Real salary</td>
            <td style='border: 1px solid black'>$realSalary</td>
        </tr>
    </table>";
}
?>

</body>
</html>