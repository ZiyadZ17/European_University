<?php
    session_start();

    if (isset($_POST['reset'])) {
        unset($_SESSION['quiz']);
        unset($_SESSION['quiz_status']);    
    
        header("Location: " . $_SERVER['PHP_SELF']);
        die();
    }

    $results_ready = false;
    $quiz_status = false;

    if (isset($_POST['add_question'])) {

        $new_question = [
            'question' => $_POST['question'],
            'type' => $_POST['type']
        ];

        if ($new_question['type'] === 'opened') {
            $new_question['correct'] = $_POST['correct_open'];
        } elseif ($new_question['type'] === 'closed') {
            $new_question['options'] = $_POST['options'];
            $new_question['correct'] = $_POST['correct_option'];
        }

        $_SESSION['quiz'][] = $new_question;

        header("Location: " . $_SERVER['PHP_SELF']);
        die();
    }

    if (isset($_POST['start_quiz'])) {
        $_SESSION['quiz_status'] = true;

        header("Location: " . $_SERVER['PHP_SELF']);
        die();
    }


    if (isset($_POST['submit_answers'])) {
        $correct_count = 0;
        $test_result = [];

        foreach ($_SESSION['quiz'] as $index => $q) {
            $student_answer = $_POST['student_answer'][$index] ?? '';
            
            $test_result[$index] = [
                'status' => ($student_answer === $q['correct']) ? 'correct' : 'incorrect',
                'student_answer' => $student_answer
            ];
            if ($student_answer === $q['correct']) {
                $correct_count++;
            }
        }
        $results_ready = true;
    }
?>
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
    if ($results_ready) {
        $total_questions = count($_SESSION['quiz']);
        $statistic = round(($correct_count / $total_questions) * 100, 2);
        echo "
            <table>
            <tr>
                <th>Question</th>
                <th>Your answer</th>
                <th>Correct answer</th>
                <th>Status</th>
            </tr>
            ";
        foreach ($test_result as $index => $status) {
            $question_text = $_SESSION['quiz'][$index]['question'];
            $correct_ans = $_SESSION['quiz'][$index]['correct'];
            $students_answer = $status['student_answer'];


            if ($status['status'] == "correct") {
                echo "
                    <tr class='correct'>
                        <td>$question_text</td>
                        <td>$students_answer</td>
                        <td>$correct_ans</td>
                        <td>'Correct'</td>
                    </tr>
                ";
            } else {
                echo "
                    <tr class='incorrect'>
                        <td>$question_text</td>
                        <td>$students_answer</td>
                        <td>$correct_ans</td>
                        <td>'Inorrect'</td>
                    </tr>
                ";
            }
        }
        echo "</table><br><br>";
        echo "<p>Correct answers: " . $correct_count . "/" . $total_questions . ". It is " . $statistic . "%";
        echo "<br><br>
            <form method='POST'>
                <button name='reset'>Reset quiz</button>
            </form>
        ";
    } 
    
    if (isset($_SESSION['quiz_status']) && $_SESSION['quiz_status'] === true && !empty($_SESSION['quiz'])) {
        echo "<form method='POST'>";
        foreach ($_SESSION['quiz'] as $index => $q) {
            $student_answer = $_POST['student_answer'][$index] ?? '';

            echo "
                <div class='quiz'>
                    <p><strong>" . ($index + 1)  . "</strong>) {$q['question']}</p>
                    <hr>
                ";

            if ($q['type'] === 'closed') {
               foreach ($q['options'] as $opt_index => $opt_text) {
                    $checked = (isset($_POST['student_answer'][$index]) && (string)$student_answer === (string)$opt_index) ? 'checked' : '';
                    echo "
                        <input type='radio' name='student_answer[$index]' value='$opt_index' $checked> $opt_text
                    ";
               }
            } elseif ($q['type'] === 'opened') {
                echo "
                    <input type='text' name='student_answer[$index]' value='$student_answer' placeholder='Your answer'>
                ";
            }
            echo "</div><br><br>";
        }
        echo "<button name='submit_answers'>Submit Test</button>";
        echo "</form>";
    } else {
            echo "
                <form method='POST' class='create'>
                <h3>Add your question</h3>

                <input type='text' name='question' placeholder='The question'>

                <h4>Choose question type</h4>

                <select name='type'>
                    <option value='opened'>Opened</option>
                    <option value='closed'>Closed</option>
                </select>

                <br><br>
                <hr>
                <br>

                <input type='text' name='options[0]' placeholder='Option 1'><br><br>
                <input type='text' name='options[1]' placeholder='Option 2'><br><br>
                <input type='text' name='options[2]' placeholder='Option 3'><br><br>
                <input type='text' name='options[3]' placeholder='Option 4'><br><br>

                <hr>

                <p>Which opsion is correct?</p>

                <select name='correct_option'>
                    <option value='0'>Option 1</option>
                    <option value='1'>Option 2</option>
                    <option value='2'>Option 3</option>
                    <option value='3'>Option 4</option>
                </select>

                <br><br>

                <input type='text' name='correct_open' placeholder='Correct answer for OPEN'>

                <br><br>

                <button name='add_question'>Add question</button>

                <br><br>

                <button name='start_quiz'>Start quiz</button>
                </form>
            ";
        }
?>
</body>
</html>