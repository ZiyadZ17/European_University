<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeWork 2</title>
</head>
<body>
    
    <form method="POST">
        <input type="text" name="name"> - Name
        <br><br>
        <input type="text" name="surname"> - Surname
        <br><br>
        <input type="text" name="course"> - Course
        <br><br>
        <input type="text" name="semester"> - Semester
        <br><br>
        <input type="text" name="subject"> - Subject
        <br><br>
        <input type="text" name="mark"> - mark
        <br><br>
        <input type="text" name="lecture"> - Lectures name and surname
        <br><br>
        <input type="text" name="decan"> - Decans name and surname
        <br><br>
        <button>Send</button>
        <br><br>
    </form>



<?php
    if (isset($_POST['name']) && isset($_POST['surname'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        $subject = $_POST['subject'];
        $mark = $_POST['mark'];
        $lecture = $_POST['lecture'];
        $decan = $_POST['decan'];
        $finalMark = "";

        if ($mark < 0 || $mark > 100) {
            $finalMark = 'Invalid mark';
        } elseif ($mark <= 40) {
            $finalMark = 'F - Failed';
        } elseif ($mark <= 50) {
            $finalMark = 'FX - Failed with last chance';
        } elseif ($mark <= 60) {
            $finalMark = 'E - enough';
        } elseif ($mark <= 70) {
            $finalMark = 'D - Normal';
        } elseif ($mark <= 80) {
            $finalMark = 'C - Good';
        } elseif ($mark <= 90) {
           $finalMark = 'B - Very good';
        } elseif ($mark <= 100) {
            $finalMark = 'A - Excellent';
        }

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
                <td style='border: 1px solid black'>Course</td>
                <td style='border: 1px solid black'>$course</td>
            </tr>
            <tr>
                <td style='border: 1px solid black'>Semester</td>
                <td style='border: 1px solid black'>$semester</td>
            </tr>
            <tr>
                <td style='border: 1px solid black'>Subject</td>
                <td style='border: 1px solid black'>$subject</td>
            </tr>
            <tr>
                <td style='border: 1px solid black'>Final mark</td>
                <td style='border: 1px solid black'>$finalMark</td>
            </tr>
            <tr>
                <td style='border: 1px solid black'>Lecture</td>
                <td style='border: 1px solid black'>$lecture</td>
            </tr>
            <tr>
                <td style='border: 1px solid black'>Decan</td>
                <td style='border: 1px solid black'>$decan</td>
            </tr>
        </table>";
    }


?>
</body>
</html>