<?php
require_once('header.php');

if (isset($_POST['username']) && !empty($_POST['username'])) {
    $_SESSION['username'] = trim($_POST['username']);
    header('location: index.php');
    exit;
}

?><!-- start of username.php -->
        <form action="username.php" method="post">
            <fieldset>
            <label>Please enter your <strong>name</strong> or <strong>nickname</strong> and click Continue!</label>
            <div class="row">
                <div class="span3">
                    <input name="username" id="username" type="text">
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <button type="submit" class="btn btn-success btn-large btn-block">Continue! <i class="icon-hand-right icon-white"></i></button>
                </div>
            </div>
            <fieldset>
        </form>
<?php
require_once('footer.php');