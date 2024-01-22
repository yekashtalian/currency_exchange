<?php
ob_start();
session_start();
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $coefficient = $_POST['coefficient'];


    $stmt = mysqli_prepare($connect, "INSERT INTO currency (name, coefficient) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, 'ss', $name, $coefficient);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 'Валюта успішно додана.';
        header("location: ../../admin/currency.php");
    } else {
        echo 'Помилка при додаванні валюти: ' . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
} else {

    echo 'Некоректний метод запиту.';
}
?>