<!-- info bar -->
<div class="row">
<div class="span6">
    <p>Hello <strong><?php echo $_SESSION['username']; ?></strong>. Your current score: <?php echo $_SESSION['score.gained']; ?> 
        out of <?php echo $_SESSION['score.possible']; ?>
        (that's <?php echo do_percent($_SESSION['score.gained'], $_SESSION['score.possible']); ?>%).</p>
    <p>Stars earned so far: 
<?php
    if (count($_SESSION['stars']) == 0) {
        echo 'none yet.';
    } else {
        $tmp = '';
        foreach ($_SESSION['stars'] as $star) {
            $tmp .= '<img src="img/'.$star.'.png" alt="'.$star.'" style="width: 30px;">';
        }
        echo $tmp;
    }
?>
    </p>
    <h2>Level <?php echo $_SESSION['level']; ?></h2>
</div>
<div class="span6">
    <div class="btn-group pull-right">
        <button class="btn btn-info">Questions</button>
        <button class="btn dropdown-toggle btn-info" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
<?php
    foreach ($questions as $q) {
        echo '            <li><a href="setquestions.php?q='.$q.'">'.$q.'</a></li>'."\n";
    }
?>
        </ul>
    </div>
</div>
</div>
<!-- end info bar -->
