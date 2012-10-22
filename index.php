<?php
require_once('header.php');

if (!isset($_SESSION['username'])) {
    header('location: username.php');
    exit;
}

require_once('info.php');
?><!-- start of index.php -->
        <form action="answers.php" method="post">
<?php

for ($j = 1; $j <= $_SESSION['questions']; $j++) {
    $f = rand(0, $levels[$_SESSION['level']]);
    $s = rand(0, $levels[$_SESSION['level']]);
    $o = $operators[rand(0, count($operators)-1)];
    
    echo '            <div class="input-prepend offset3">'."\n";
    echo '                <span class="add-on">'.$f.' '.$o.' '.$s.' = </span>'."\n";
    echo '                <input type="hidden" name="data[question]['.$j.']" value="'.$f.'|'.$o.'|'.$s.'">'."\n";
    echo '                <input type="text" name="data[answer]['.$j.']" id="prependedInput" class="span1" >'."\n";
    echo '            </div>'."\n";
}
?>
        <div class="row">
        <div class="span2 offset5">
            <button type="submit" class="btn btn-success btn-large span2">Go! <i class="icon-hand-right icon-white"></i></button>
        </div>
        </div>
        </form>
<?php
require_once('footer.php');