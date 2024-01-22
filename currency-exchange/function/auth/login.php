<?php
session_start();
require_once '../db.php';

$email = $_POST['name'];
$password = $_POST['password'];

$stmt = mysqli_prepare($connect, "SELECT id, password FROM admin WHERE username = ?");
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$count = mysqli_num_rows($result);

if ($count == 1) {
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['admin'] = true;
    header('Location: ../../admin/');

} else {
    echo 'Не правильний логін або пароль!';
}

mysqli_stmt_close($stmt);
?>