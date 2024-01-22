<?php

require_once './component/nav.php';

require_once '../function/db.php';
$location = mysqli_query($connect, "SELECT * FROM `location`");
$location = mysqli_fetch_all($location);


?>
<div class="admin-main">
    <div class="admin-main__header">
        <h3>Додавання адміністратора</h3>
        <div class="filter">
            <a href="./user.php" class="btn">Список всіх адміністраторів</a>
        </div>
    </div>

    <form class="main-form add" action="../function/admin/add.php" method="post">
        <h3>Додавання адміністратора</h3>
        <input type="text" placeholder="Login" name="username" required>
        <input type="text" placeholder="Password" name="password" required>
        <select name="locationId" id="">
            <?php foreach ($location as $loc): ?>
                <option value="<?=$loc[0]?>"><?=$loc[1]?></option>
            <?php endforeach; ?>
        </select>
        <button>Додати адміністратора</button>
    </form>
</div>
</div>
</body>

</html>