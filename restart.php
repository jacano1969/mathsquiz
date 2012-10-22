<?php
session_start();

unset($_SESSION['score.gained']);
unset($_SESSION['score.possible']);

unset($_SESSION['level']);
unset($_SESSION['questions']);

header('location: index.php');
