<?php

// maths game!
$title = 'Maths Game!';

$levels = array (1 => 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 14);

$questions = array(10, 15, 20, 25, 50, 75, 100);

$operators = array('+', '-');

session_start();

if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 1;
}
if (!isset($_SESSION['questions'])) {
    $_SESSION['questions'] = 10;
}
if (!isset($_SESSION['score.gained'])) {
    $_SESSION['score.gained'] = 0;
}
if (!isset($_SESSION['score.possible'])) {
    $_SESSION['score.possible'] = 0;
}
if (!isset($_SESSION['stars'])) {
    $_SESSION['stars'] = array();
}

function do_percent($f, $s) {
    if ($s == 0) {
        return 0;
    } else {
        return (int) round(($f / $s) * 100);
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="ico/favicon.ico">
    <title><?php echo $title; ?></title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/extras.css" rel="stylesheet">
    <!-- link href="css/bootstrap-responsive.css" rel="stylesheet" -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><?php echo $title; ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="restart.php">Restart? <i class="icon-warning-sign"></i></a></li>
              <li><a href="reset.php">Reset? <i class="icon-remove-sign"></i></a></li>
              <!-- li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li -->
            </ul>
            <form class="navbar-form pull-right">
              <!-- input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button -->
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div><!-- end navbar -->
    
    <div class="container"><!-- everything goes in here -->
    
        <h1><?php echo $title; ?></h1>
