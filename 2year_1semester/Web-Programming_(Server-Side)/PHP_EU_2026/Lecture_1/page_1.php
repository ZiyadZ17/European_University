<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 1</title>
</head>
<body>

<?php
    echo $_GET['parameter1'];
    echo "<br>";
    echo $_GET['parameter2'];
    echo "<hr><hr>";

?>


<h1>Lecture 1</h1>


<?php 
    echo'<h3 style="color: red;">Hello world</h3>';
    $x = 34;
    echo $x;
    $arl = [4, 6, "Hello, Bro"];
    echo "<hr>";
    $ar2 = ['name' => 'John', 'age' => 20, 'gpa' => 4, 'info' => ["programming", "web development"]];
    print_r($ar2);

?>

</body>
</html>