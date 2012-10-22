<?php
session_start();
$_SESSION['level']++;
header('location: index.php');
