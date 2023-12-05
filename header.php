<header>
        <?php
            // Проверяем, авторизован ли пользователь
            $isLoggedIn = false;  // здесь должен быть код для проверки авторизации

            if ($isLoggedIn) {
                echo '<a href="logout.php" class="login-button">Выйти</a>';
            } else {
                echo '<a href="login.php" class="login-button">Войти</a>';
                echo '<a href="login.php" class="regist-button">Регистрация</a>';
            }
        ?>
    <a href="#top" class="Top-Logo" title="Back to top">SilverCar</a>
    <!-- <a href="#top" class="top-link" title="Back to top">SilverCar</a> -->
    <h2>Салон поддержанных автомобилей</h2>
</header>