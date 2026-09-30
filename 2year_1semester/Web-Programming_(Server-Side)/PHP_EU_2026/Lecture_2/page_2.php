<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 2</title>
</head>
<body>
    
    <p>
        <a href="page_2.php">Home page</a>
    </p>
    <form>
        <input type="text" name="name"> - Name
        <br><br>
        <input type="text" name="surname"> - Surname
        <br><br>
        <input type="text" name="position_held"> - Position held
        <br><br>
        <input type="number" name="salary"> - Salary
        <br><br>
        <input type="number" name="percentage"> - Percentage
        <br><br>
        <button>Send data</button>
    </form>

    <?php
    
        if (isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['position_held']) && isset($_GET['salary'])) {
            $name = $_GET['name'];
            $surname = $_GET['surname'];
            $position_held = $_GET['position_held'];
            $salary = (float)$_GET['salary'];
            $percentage = isset($_GET['percentage']) ? (float)$_GET['percentage'] : 20;
            $salary = $salary - ($salary / 100 * $percentage);
            echo "$name $surname is a $position_held. He earns $salary per month.";
        }
    ?>
</body>
</html>