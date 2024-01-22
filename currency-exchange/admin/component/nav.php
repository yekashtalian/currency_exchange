<?php
session_start();
require_once '../function/db.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
}


$id = $_SESSION['user_id'];
$userResult = mysqli_query($connect, "SELECT * FROM `admin` WHERE `id` = $id");
$users = mysqli_fetch_assoc($userResult);


if ($users['locationId'] !== 'main' && basename($_SERVER['SCRIPT_NAME']) !== 'index.php') {
    header("Location: ./");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/index.css">
</head>

<body>
    <div class="admin-wrapper">
        <div class="admin-nav">
            <div class="admin-nav__main">
                <a href="./index.php">Заявки</a>
                <?php if ($users['locationId'] == 'main'): ?>
                    <a href="./user.php">Адміністратори</a>
                    <a href="./currency.php">Валюти</a>
                    <a href="./location.php">Локації</a>
                <?php endif; ?>

            </div>
            <div class="admin-mav__bottom">
                <a href="./exit.php">Вихід</a>
            </div>
        </div>