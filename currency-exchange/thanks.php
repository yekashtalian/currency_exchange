
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
                        <form class="main-form">
                            <div class="form__header">
                                <h2>Заявка на обмін валюти успішно прийнята</h2>
                                <p>В найближчий час наші менеджери зв'яжуться з вами ,очікуйте відповіді!</p>
                            </div>
                        </form>
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