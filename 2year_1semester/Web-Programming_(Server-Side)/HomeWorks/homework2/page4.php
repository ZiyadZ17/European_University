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
    <input type="text" name="students[0][name]" placeholder="Students name">
    <br>
    <input type="number" name="students[0][mark]" placeholder="Students mark 0-100">
    <br><br>

    <input type="text" name="students[1][name]" placeholder="Students name">
    <br>
    <input type="number" name="students[1][mark]" placeholder="Students mark 0-100">
    <br><br>

    <input type="text" name="students[2][name]" placeholder="Students name">
    <br>
    <input type="number" name="students[2][mark]" placeholder="Students mark 0-100">
    <br><br>

    <input type="text" name="students[3][name]" placeholder="Students name">
    <br>
    <input type="number" name="students[3][mark]" placeholder="Students mark 0-100">
    <br><br>

    <input type="text" name="students[4][name]" placeholder="Students name">
    <br>
    <input type="number" name="students[4][mark]" placeholder="Students mark 0-100">
    <br><br>
    <button>Send</button>
    <br><br>
</form>


<?php

$all_marks = [];

if (isset($_POST['students'])) {
    $students = $_POST['students'];

    foreach ($students as &$student) {
        $name = $student['name'];
        $mark = $student['mark'];
        if ($mark < 0 || $mark > 100 || $mark === '') {
            echo "Please, enter mark from 0 to 100.";
            die();
        }

    $all_marks[] = $mark;

        if ($mark <= 40) {
                $student['grade'] = 'F - Failed';
            } elseif ($mark <= 50) {
                $student['grade'] = 'FX - Failed with last chance';
            } elseif ($mark <= 60) {
                $student['grade'] = 'E - enough';
            } elseif ($mark <= 70) {
                $student['grade'] = 'D - Normal';
            } elseif ($mark <= 80) {
                $student['grade'] = 'C - Good';
            } elseif ($mark <= 90) {
                $student['grade'] = 'B - Very good';
            } elseif ($mark <= 100) {
                $student['grade'] = 'A - Excellent';
            }
    }

    unset($student);

    usort($students, function($a, $b) {
        return $b['mark'] <=> $a['mark'];
    });


    $avg_mark = array_sum($all_marks) / count($all_marks);
    $min_mark = min($all_marks);
    $max_mark = max($all_marks);


    echo "
        <table>
            <tr>
                <th>Name</th>
                <th>Mark</th>
                <th>Grade</th>
            </tr>
    ";

    foreach ($students as $student) {
        $name = $student['name'];
        $mark = $student['mark'];
        $grade = $student['grade'];

        echo "
            <tr>
                <td>$name</td>
                <td>$mark</td>
                <td>$grade</td>
            </tr>
        ";
    }

    echo "</table><br><br>";

    echo "
        <table>
            <tr>
                <th>Max. mark</th>
                <th>Min. mark</th>
                <th>Avg. mark</th>
            </tr>
            <tr>
                <td>$max_mark</td>
                <td>$min_mark</td>
                <td>$avg_mark</td>
            </tr>
        </table>
    ";

}


?>
</body>
</html>