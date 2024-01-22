<?php
require_once '../db.php'; 

$query = "SELECT * FROM `currency`";
$result = mysqli_query($connect, $query);

$coefficients = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($coefficients);
?>