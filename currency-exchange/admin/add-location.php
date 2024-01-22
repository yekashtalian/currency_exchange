<?php

require_once './component/nav.php';




?>
<div class="admin-main">
    <div class="admin-main__header">
        <h3>Додавання локації</h3>
        <div class="filter">
            <a href="./location.php" class="btn">Список всіх локацій</a>
        </div>
    </div>

    <form class="main-form add" action="../function/location/add.php" method="post">
        <h3>Додавання валюти</h3>
        <input type="text" placeholder="Назва локації" name="name" required> 
        <button>Додати локацію</button>
    </form>
</div>
</div>
</body>

</html>