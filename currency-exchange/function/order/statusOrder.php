<?php
ob_start();
session_start();
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $status = $_POST['status'];
    $orderId = $_POST['orderId']; 

    $stmt = mysqli_prepare($connect, "UPDATE orders SET status = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'si', $status, $orderId);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 'Статус замовлення успішно оновлено.';
        header("location: ../../admin/");
    } else {
        echo 'Помилка при оновленні статусу замовлення: ' . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
} else {
    echo 'Некоректний метод запиту.';
}
?>