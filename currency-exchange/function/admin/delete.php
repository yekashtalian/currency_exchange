<?php
session_start();
require_once '../db.php';


if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];

   
    $stmt = mysqli_prepare($connect, "DELETE FROM admin WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $admin_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location: ../../admin/user.php');
} else {
    echo 'Не вказано ідентифікатор адміністратора для видалення.';
}
?>
