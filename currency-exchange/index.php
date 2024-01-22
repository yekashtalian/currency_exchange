<?php
require_once './function/db.php';
$location = mysqli_query($connect, "SELECT * FROM `location`");
$location = mysqli_fetch_all($location);

$currency = mysqli_query($connect, "SELECT * FROM `currency`");
$currency = mysqli_fetch_all($currency);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style/index.css">
</head>

<body>
    <div class="wrapper">
        <div class="wrapper__main">
            <!-- header -->
            <?php require_once './components/header.php'; ?>
            <!-- end header -->

            <!-- main -->
            <main>
                <div class="container">
                    <section class="order-form" id="order">
                        <form class="main-form" id="main-order" action="./function/order/orderCreate.php" method="post">
                            <div class="form__header">
                                <h2>Заявка на обмін валюти</h2>
                                <p>Швидкий та безпечний обмін валюти - подавайте заявку прямо зараз!</p>
                            </div>
                            <div class="form__fields">
                                <div class="form__field">
                                    <div class="select select-value">
                                        <div class="select-show__wrapper">
                                            <div class="select-show">
                                                <p>Ви даєте</p>

                                                <input type="text" id="giveCurrency" name="giveName" value="USD"
                                                    readonly>
                                                <div class="select-show__arrow">
                                                    <img src="./assets/img/arrow.svg" alt="arrow">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="text" id="giveInput" name="giveCount"
                                            placeholder="Введіть суму для обміну" value="100">
                                        <div class="select-list">
                                            <?php foreach ($currency as $cur): ?>
                                                <p><?= $cur[1] ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form__field">
                                    <div class="select select-value">
                                        <div class="select-show__wrapper">
                                            <div class="select-show">
                                                <p>Ви получаєте</p>

                                                <input type="text" id="receiveCurrency" name="receiveName" value="UAH"
                                                    readonly>
                                                <div class="select-show__arrow">
                                                    <img src="./assets/img/arrow.svg" alt="arrow">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="select-list">
                                            <?php foreach ($currency as $cur): ?>
                                                <p><?= $cur[1] ?></p>
                                            <?php endforeach; ?>
                                        </div>

                                        <input type="text" id="receiveInput" name="receiveCount" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form__field">
                                    <h3 id="advertising">Курс обміну 1 ___ = __.__ ___</h3>
                                </div>
                                <div class="form__field">
                                    <div class="select">
                                        <div class="select-show__wrapper">
                                            <div class="select-show">
                                                <p>Виберіть відділення</p>

                                                <input type="text" id="location" name="location"
                                                    value="<?= $location[0][1] ?>" readonly>
                                                <div class="select-show__arrow">
                                                    <img src="./assets/img/arrow.svg" alt="arrow">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="select-list">
                                            <?php foreach ($location as $loc): ?>
                                                <p><?= $loc[1] ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form__field">
                                    <input type="text" placeholder="Ваше ім'я" name="name" required>
                                </div>
                                <div class="form__field">
                                    <input type="text" placeholder="Контактний номер телефону" name="phone" required>
                                </div>
                            </div>
                            <button>Замовити Обмін Валюти</button>
                        </form>
                    </section>
                    <section class="reviews" id="reviews">
                        <h2 class="section-title">Відгуки</h2>
                        <div class="reviews__wrapper">
                            <div class="review">
                                <div class="reviews__header">
                                    <div class="name__wrapper">
                                        <div class="name">i</div>
                                        <div class="full-name">
                                            <p>Ira V.</p>
                                            <p>1 review</p>
                                            <div class="rating">
                                                <div class="rating__star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                </div>
                                                <p class="rating__date">4 month ago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="review__txt">
                                        Хочу подякувати валютному обміннику за високий рівень сервісу та зручні умови
                                        обміну. Обслуговування на висоті, а персонал завжди готовий допомогти та
                                        відповісти на всі питання. Швидка та безпечна обробка операцій, а курси валют
                                        завжди актуальні.
                                    </p>
                                </div>
                            </div>
                            <div class="review">
                                <div class="reviews__header">
                                    <div class="name__wrapper">
                                        <div class="name">i</div>
                                        <div class="full-name">
                                            <p>Ira V.</p>
                                            <p>1 review</p>
                                            <div class="rating">
                                                <div class="rating__star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                </div>
                                                <p class="rating__date">4 month ago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="review__txt">
                                        Хочу подякувати валютному обміннику за високий рівень сервісу та зручні умови
                                        обміну. Обслуговування на висоті, а персонал завжди готовий допомогти та
                                        відповісти на всі питання. Швидка та безпечна обробка операцій, а курси валют
                                        завжди актуальні.
                                    </p>
                                </div>
                            </div>
                            <div class="review">
                                <div class="reviews__header">
                                    <div class="name__wrapper">
                                        <div class="name">i</div>
                                        <div class="full-name">
                                            <p>Ira V.</p>
                                            <p>1 review</p>
                                            <div class="rating">
                                                <div class="rating__star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                    <img src="./assets/img/Star.svg" alt="Star">
                                                </div>
                                                <p class="rating__date">4 month ago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="review__txt">
                                        Хочу подякувати валютному обміннику за високий рівень сервісу та зручні умови
                                        обміну. Обслуговування на висоті, а персонал завжди готовий допомогти та
                                        відповісти на всі питання. Швидка та безпечна обробка операцій, а курси валют
                                        завжди актуальні.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="faq" id="faq">
                        <h2 class="section-title">FAQ</h2>
                        <div class="faq__wrapper">
                            <div class="faq_block">
                                <div class="faq_block-header faq-header">
                                    <div class="faq-header__plus">
                                        <p>+</p>
                                    </div>
                                    <p>Як відбувається процес обміну валюти на вашому сайті?</p>
                                </div>
                                <div class="faq_block-content">
                                    <p>
                                        Для початку обміну виберіть потрібні валюти в розділі "Обмін валюти".
                                        Введіть суму обміну та необхідні дані.
                                        Перегляньте інформацію про обмін та натисніть "Підтвердити".
                                        Дотримуйтесь інструкцій на екрані та відправте валюту для обробки.
                                    </p>
                                </div>
                            </div>
                            <div class="faq_block">
                                <div class="faq_block-header faq-header">
                                    <div class="faq-header__plus">
                                        <p>+</p>
                                    </div>
                                    <p>Скільки часу займає процес обробки обміну? </p>
                                </div>
                                <div class="faq_block-content">
                                    <p>
                                        Час обробки залежить від вибраного типу обміну та обсягу операції.
                                        Зазвичай обміни електронних валют виконуються миттєво, але інші можуть займати
                                        від кількох хвилин до годин.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </main>
            <!-- end main -->
        </div>
        <!-- footer -->
        <?php require_once './components/footer.php'; ?>
        <!-- end footer -->
    </div>
 
    <script src="./assets/script/index.js"></script>




</body>

</html>