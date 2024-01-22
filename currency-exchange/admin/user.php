<?php
require_once './component/nav.php';
require_once '../function/db.php';
$admins = mysqli_query($connect, "SELECT * FROM `admin`");
$admins = mysqli_fetch_all($admins);
?>
<div class="admin-main">
    <div class="admin-main__header">
        <h3>Адміністратори</h3>
        <div class="filter">
            <a href="./add-user.php" class="btn">Додати адміністратора</a>
        </div>
    </div>

    <table>
        <tr>
            <td>ID</td>
            <td>Логін</td>
            <td>Пароль</td>
            <td>Дія</td>
        </tr>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?=$admin[0]?></td>
                <td><?=$admin[1]?></td>
                <td><?=$admin[2]?></td>
                <td>
                    <a href="../function/admin/delete.php?id=<?=$admin[0]?>">Удалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</body>

</html>