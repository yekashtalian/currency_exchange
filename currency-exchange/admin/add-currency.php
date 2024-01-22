<?php

require_once './component/nav.php';




?>
<div class="admin-main">
    <div class="admin-main__header">
        <h3>Додавання валюти</h3>
        <div class="filter">
            <a href="./currency.php" class="btn">Список всіх валют</a>
        </div>
    </div>

    <form class="main-form add" action="../function/currency/add.php" method="post">
        <h3>Додавання валюти</h3>
        <input type="text" placeholder="Назва валюти" name="name" required>
        <input type="text" placeholder="Відсоток обміну (1=100%)" name="coefficient" required>
     
        <button>Додати валюту</button>
    </form>
</div>
</div>
</body>

</html>