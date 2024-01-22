<?php
ob_start();
session_start();
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $idCurrency = $_POST['idCurrency'];
    $coefficient = $_POST['coefficient']; 

    $stmt = mysqli_prepare($connect, "UPDATE currency SET coefficient = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'si', $coefficient, $idCurrency);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 'Статус замовлення успішно оновлено.';
        header("location: ../../admin/currency.php");
    } else {
        echo 'Помилка при оновленні статусу замовлення: ' . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
} else {
    echo 'Некоректний метод запиту.';
}
?>