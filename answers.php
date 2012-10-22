<?php
require_once('header.php');

function do_sum($sum) {
    if (trim($sum[1]) == '+') {
        return (int) $sum[0] + (int) $sum[2];
    } else if (trim($sum[1]) == '-') {
        return (int) $sum[0] - (int) $sum[2];
    }
}

function get_star($in) {
    if ($in >= 90) {
        $tmp = '<p>'.number_format($in).'% gets you a gold star!</p>'.
            '<img src="img/gold.png" alt="Gold star!">';
        $_SESSION['stars'][] = 'gold';
    } else if ($in >= 70 && $in <= 89) {
        $tmp = '<p>'.number_format($in).'% gets you a silver star!</p>'.
            '<img src="img/silver.png" alt="Silver star!">';
        $_SESSION['stars'][] = 'silver';
    } else if ($in >= 50 && $in <= 69) {
        $tmp = '<p>'.number_format($in).'% gets you a bronze star!</p>'.
            '<img src="img/bronze.png" alt="Bronze star!">';
        $_SESSION['stars'][] = 'bronze';
    } else {
        $tmp = '<p>Sorry, no star this time. :(</p>';
    }
    return $tmp;
}

?><!-- start of answers.php -->
    <h2>Level <?php echo $_SESSION['level']; ?> Answers</h2>
<?php
    $questions = array();
    foreach ($_POST['data']['question'] as $question) {
        $questions[] = $question;
    }
    $num_questions = count($questions);
    if ($num_questions == 0) {
        echo 'Sorry, something went wrong: no questions.';
    }
    
    $answers = array();
    foreach ($_POST['data']['answer'] as $answer) {
        $answers[] = $answer;
    }
    if (count($answers) == 0) {
        echo 'Sorry, something went wrong: no answers.';
    }
    
    $sum = array();
    $question_result = array();
    foreach ($questions as $question) {
        $sum[] = explode('|', $question);
        $question_result[] = do_sum(explode('|', $question));
    }

    $correct = array();
    $num_correct = 0;
    for ($j = 0; $j <= count($answers)-1; $j++) {
        $_SESSION['score.possible']++;
        if (is_numeric($answers[$j]) && $answers[$j] == $question_result[$j]) {
            $correct[$j] = 1;
            $num_correct++;
            $_SESSION['score.gained']++;
        } else {
            $correct[$j] = 0;
        }
    }

    $percent_correct_level = do_percent($num_correct, $num_questions);
    
    //echo '<pre>'; print_r($questions); print_r($answers); print_r($question_result); print_r($correct); echo '</pre>';
    //echo '<pre>'; var_dump($answers); echo '</pre>';
?>
    <div class="row">
    <div class="span9">
    
    <table class="table table-hover table-bordered table-condensed">
        <tr><th>#</th><th>Question</th><th>Your Answer</th><th>Correct Answer</th><th>Result</th></tr>
<?php
        for ($j = 0; $j <= count($answers)-1; $j++) {
        $class = ((int) $correct[$j] == 1) ? '' : 'error';
        echo '    <tr class="'.$class.'">'."\n";
        echo '        <td>'.($j+1).'</td>'."\n";
        echo '        <td>'.$sum[$j][0].' '.$sum[$j][1].' '.$sum[$j][2].'</td>'."\n";
        $ans = (!is_numeric($answers[$j])) ? '(none)' : $answers[$j];
        echo '        <td>'.$ans.'</td>'."\n";
        echo '        <td>'.$question_result[$j].'</td>'."\n";
        $cor = ($correct[$j]) ? '<span class="text-success">Correct!</span>' : '<span class="text-error">Sorry :(</span>';
        echo '        <td>'.$cor.'</td>'."\n";
        echo '    </tr>'."\n";
    }
    echo '</table>'."\n";
?>
    <div class="well well-small center">
        <p><?php echo get_star($percent_correct_level); ?></p>
    </div>
    
    </div><!-- end span9 -->

    <div class="span3">
        <h4>This Level</h4>
        <div class="well well-small">
            <div class="center">You got <?php echo $num_correct; ?> out of 
                <?php echo $num_questions; ?> questions (<?php echo $percent_correct_level; ?>%) correct.
                <?php if ($num_correct == $num_questions) { echo ' <strong>Well done!</strong>'; } ?>
                </div>
        </div>
        <h4>Game Total</h4>
        <div class="well well-small">
            <div class="center">So far, you have got <?php echo $_SESSION['score.gained']; ?> out of 
                <?php echo $_SESSION['score.possible']; ?> questions (<?php echo do_percent($_SESSION['score.gained'], $_SESSION['score.possible']); ?>%) correct.
                <?php if ($_SESSION['score.gained'] == $_SESSION['score.possible']) { echo ' <strong>Well done!</strong>'; } ?>
                </div>
        </div>

        <a class="btn btn-block btn-large btn-success" href="continue.php">Continue the game! <i class="icon-hand-right icon-white"></i></a>
        <a class="btn btn-block btn-large btn-danger" href="restart.php"><i class="icon-hand-left icon-white"></i> Restart</a>
    </div>
    </div>

<?php
require_once('footer.php');
