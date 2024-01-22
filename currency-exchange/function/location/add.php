<?php
ob_start();
session_start();
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nameLocation = $_POST['name'];

    $stmt = mysqli_prepare($connect, "INSERT INTO location (nameLocation) VALUES (?)");
    mysqli_stmt_bind_param($stmt, 's', $nameLocation);


    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 'Локацію успішно додано.';
        header("location: ../../admin/location.php");
    } else {
        echo 'Помилка при додаванні локації: ' . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
} else {
    
    echo 'Некоректний метод запиту.';
}
?>
