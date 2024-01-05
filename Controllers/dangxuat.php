<?php
session_start(); // Bắt đầu session
$_SESSION['user'];
$_SESSION['loggedin'] = true;

session_destroy();
header("Location: ../Views/index.php");
exit();
