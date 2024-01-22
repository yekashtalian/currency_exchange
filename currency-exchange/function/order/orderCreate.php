<?php
ob_start();
session_start();
include '../db.php';

$giveName = isset($_POST['giveName']) ? $_POST['giveName'] : null;
$giveCount = isset($_POST['giveCount']) ? $_POST['giveCount'] : null;
$receiveName = isset($_POST['receiveName']) ? $_POST['receiveName'] : null;
$receiveCount = isset($_POST['receiveCount']) ? $_POST['receiveCount'] : null;
$location = isset($_POST['location']) ? mysqli_real_escape_string($connect, $_POST['location']) : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;

$sql = "INSERT INTO `orders` (`id`, `giveName`, `giveCount`, `receiveName`, `receiveCount`, `location`, `name`, `phone`, `status`, `created_at`) 
        VALUES (NULL, '$giveName', '$giveCount', '$receiveName', '$receiveCount', '$location', '$name', '$phone', '$status', CURRENT_TIMESTAMP)";

$result = mysqli_query($connect, $sql);

if ($result) {
    $orderId = mysqli_insert_id($connect);
    echo "Дані успішно вставлено в базу даних. ID ордера: $orderId";
   

    $_SESSION['orderId'] = $orderId;

    header ("Location: ../../thanks.php");
    exit();
} else {
    echo "Помилка: " . mysqli_error($connect);
}

mysqli_close($connect);
?>