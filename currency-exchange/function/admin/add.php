<?php
ob_start();
session_start();
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $locationId = $_POST['locationId'];

  
    $stmt = mysqli_prepare($connect, "INSERT INTO admin (username, password, locationId) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssi', $username, $password, $locationId);

  
    $result = mysqli_stmt_execute($stmt);

    
    if ($result) {
        echo 'Адміністратор успішно доданий.';
       header ("Location: ../../admin/user.php");
    } else {
        echo 'Помилка при додаванні адміністратора: ' . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
} else {
    
    echo 'Некоректний метод запиту.';
}
?>
