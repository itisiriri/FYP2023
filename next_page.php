<?php session_start();

if (isset($_SESSION['lecturer_name'])) {
    $lecturer_name = $_SESSION['lecturer_name'];
} else {}
?>