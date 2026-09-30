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

    <p>
        <a href="?name=bondo&age=34">User Data</a>
    </p>


    <?php

        if (isset($_GET['name']) && isset($_GET['age'])) {
            $user = $_GET['name'];
            $age = $_GET['age'];
        echo "$user is $age years old. He is a good boy. Belive me!";
        }

    ?>
</body>
</html>