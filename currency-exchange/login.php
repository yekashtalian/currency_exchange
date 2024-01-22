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
                    <section class="login-form">
                        <form class="main-form" action="./function/auth/login.php" method="post">
                            <h3>Авторизація Адміністратора</h3>
                            <input type="text" placeholder="Login" name="name" required>
                            <input type="password" placeholder="Password" name="password" required>
                            <button>Sign in</button>
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


</body>

</html>