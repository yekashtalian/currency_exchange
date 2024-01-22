<?php

require_once './component/nav.php';

require_once '../function/db.php';
$currency = mysqli_query($connect, "SELECT * FROM `location`");
$currency = mysqli_fetch_all($currency);
?>
<div class="admin-main">
    <div class="admin-main__header">
        <h3>Локації</h3>
        <div class="filter">
            <a href="./add-location.php" class="btn">Додати локацію</a>
        </div>
    </div>

    <table>
        <tr>
            <td>ID</td>
            <td>Назва</td>
            <td>Дія</td>
        </tr>
        <?php foreach ($currency as $cur): ?>
            <tr>
                <td>
                    <?= $cur[0] ?>
                </td>
                <td>
                    <?= $cur[1] ?>
                </td>
                <td>
                    <a href="../function/location/delete.php?id=<?= $cur[0] ?>">Удалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</body>

</html>