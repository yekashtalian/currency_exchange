<?php

require_once './component/nav.php';

require_once '../function/db.php';
$currency = mysqli_query($connect, "SELECT * FROM `currency`");
$currency = mysqli_fetch_all($currency);
?>
<div class="admin-main">
    <div class="admin-main__header">
        <h3>Валюти</h3>
        <div class="filter">
            <a href="./add-currency.php" class="btn">Додати валюту</a>
        </div>
    </div>

    <table>
        <tr>
            <td>ID</td>
            <td>Назва</td>
            <td>Коефіцієнт</td>
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
                    <form action="../function/currency/editCoefficient.php" method="post">
                        <input type="hidden" value="<?= $cur[0] ?>" name="idCurrency" readonly>
                        <input type="text" value="<?= $cur[2] ?>" name="coefficient">
                        <button>Зберегти</button>
                    </form>

                </td>
                <td>
                    <a href="../function/currency/delete.php?id=<?= $cur[0] ?>">Удалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</body>

</html>