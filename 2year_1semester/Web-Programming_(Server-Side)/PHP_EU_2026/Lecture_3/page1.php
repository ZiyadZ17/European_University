<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 3</title>
</head>
<body>

<form method="POST">
    <input type="text" name="t" placeholder="Enter your question.">
    <button>Submit</button>


</form>


<form method="POST">
    <p>1. The capital of Georgia is:</p>
    <input type="radio" name="q1" value="a"> Rustavi
    <br>
    <input type="radio" name="q1" value="b"> Tbilisi
    <br>
    <input type="radio" name="q1" value="c"> Zestafoni
    <br><br>

    <p>2. What is not meat in dough?</p>
    <input type="radio" name="q2" value="a"> Khinkali
    <br>
    <input type="radio" name="q2" value="b"> Kubdari
    <br>
    <input type="radio" name="q2" value="c"> Khachapuri
    <br><br>

    <p>3. Which university is the best?</p>
    <input type="radio" name="q3" value="a"> European University
    <br>
    <input type="radio" name="q3" value="b"> GTU
    <br>
    <input type="radio" name="q3" value="c"> TSU
    <br><br>

    <p>4. What programming language is used in this website?</p>
    <input type="text" name="q4">
    <br><br>

    <p>5. Name of the country, where this website was created:</p>
    <input type="text" name="q5">
    <br><br>

    <button>Send</button>
</form>

<?php
    if (isset($_POST['q1'])) {
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $q5 = $_POST['q5'];
        $correct = 0;
        if ($q1 == "b") {
            $correct++;
        } 
        if ($q2 == "c") {
           $correct++; 
        } 
        if ($q3 == "a") {
            $correct++;
        }
        if ($q4 == "PHP" || $q4 == "Php" || $q4 == "php") {
            $correct++;
        }
        if ($q5 == "Georgia" || $q5 == "georgia") {
            $correct++;
        }

        echo "Correct answers: $correct/5";
    }

?>
</body>
</html>