<?php

session_start();

if (isset($_GET['q']) && !empty($_GET['q']) && is_numeric($_GET['q'])) {
    $_SESSION['questions'] = $_GET['q'];
} else {
    $_SESSION['questions'] = 5;
}

header('location: index.php');