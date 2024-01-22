<?php
require_once './component/nav.php';
require_once '../function/db.php';

// Fetch filter values from the form
$filterStatus = isset($_GET['filterStatus']) ? $_GET['filterStatus'] : '';
$filterAmount = isset($_GET['filterAmount']) ? $_GET['filterAmount'] : '';
$filterDate = isset($_GET['filterDate']) ? $_GET['filterDate'] : '';

// Build the SQL query based on the filters
if ($users['locationId'] !== 'main') {
    $locationName = $users['locationId'];
    $userResult = mysqli_query($connect, "SELECT * FROM `location` WHERE `id` = $locationName");
    $users = mysqli_fetch_assoc($userResult);

    $lol = $users['nameLocation'];
    $sql = "SELECT * FROM `orders` WHERE `location` = '$lol'";
} else {
    $sql = "SELECT * FROM `orders` WHERE 1";
}


if ($filterStatus !== '') {
    $sql .= " AND `status` = '$filterStatus'";
}

if ($filterAmount === 'min') {
    $sql .= " ORDER BY `amount` ASC";
} elseif ($filterAmount === 'max') {
    $sql .= " ORDER BY `amount` DESC";
}

if ($filterDate !== '') {
    $sql .= " AND DATE(`created_at`) = '$filterDate'";
}

// Execute the SQL query
$orders = mysqli_query($connect, $sql);
$orders = mysqli_fetch_all($orders);
$orders = array_reverse($orders);

?>

<div class="admin-main">
    <div class="admin-main__header">
        <h3>Заявки</h3>
        <div class="filter">
            <form action="" method="">
                <div class="filter-block">
                    <p>Фільтр по статусу</p>
                    <select name="filterStatus">
                        <option value="" <?= ($filterStatus === '' || $filterStatus === 'all') ? 'selected' : ''; ?>>Всі
                        </option>
                        <option value="1" <?= $filterStatus === '1' ? 'selected' : ''; ?>>Виконані</option>
                        <option value="0" <?= $filterStatus === '0' ? 'selected' : ''; ?>>Відхилені</option>
                    </select>
                </div>

                <!-- <div class="filter-block">
                    <p>Фільтр по сумі</p>
                    <select name="filterAmount">
                        <option value="">По замовчуванні</option>
                        <option value="min" <?= $filterAmount === 'min' ? 'selected' : ''; ?>>Від найменшої суми</option>
                        <option value="max" <?= $filterAmount === 'max' ? 'selected' : ''; ?>>Від найбільшої суми</option>
                    </select>
                </div> -->
                <div class="filter-block">
                    <p>Фільтр по даті</p>
                    <input type="date" name="filterDate" value="<?= $filterDate; ?>">
                </div>
                <button>Фільтрувати</button>
            </form>
        </div>
    </div>

    <table>
        <tr>
            <td>ID</td>
            <td>Віддаємо</td>
            <td>Отримуємо</td>
            <td>Відділення</td>
            <td>Ваше ім'я</td>
            <td>Номер телефону</td>
            <td>Статус</td>
        </tr>

        <?php foreach ($orders as $order): ?>
            <tr>
                <td>
                    <?= $order[0] ?>
                </td>
                <td>
                    <?= $order[2] ?>
                    <?= $order[1] ?>
                </td>
                <td>
                    <?= $order[4] ?>
                    <?= $order[3] ?>
                </td>
                <td>

                    <?= $order[5] ?>

                </td>
                <td>
                    <?= $order[6] ?>
                </td>
                <td>
                    <?= $order[7] ?>
                </td>
                <td>
                    <?php if ($order[8] == ''): ?>
                        <form action="../function/order/statusOrder.php" method="post">
                            <input type="hidden" name="orderId" value="<?= $order[0] ?>" readonly>
                            <select name="status" id="">
                                <option value="">Очікується</option>
                                <option value="1">Підтверджено</option>
                                <option value="0">Відхилено</option>
                            </select>
                            <button>Зберегти</button>
                        </form>
                    <?php elseif ($order[8] == 0): ?>
                        <p>Відхилено!</p>
                    <?php elseif ($order[8] == 1): ?>
                        <p>Заявка успішно виконана!</p>
                    <?php endif; ?>

                </td>
            </tr>
        <?php endforeach; ?>



    </table>
</div>
</div>
</body>

</html>