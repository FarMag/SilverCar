<header>
        <!-- <php
            // Проверяем, авторизован ли пользователь
            $isLoggedIn = false;  // здесь должен быть код для проверки авторизации

            if ($isLoggedIn) {
                echo '<a href="logout.php" class="login-button">Выйти</a>';
            } else {
                echo '<a href="login.php" class="login-button">Войти</a>';
                echo '<a href="login.php" class="regist-button">Регистрация</a>';
            }
        ?> -->


        <?php 
            $current_file = basename($_SERVER['PHP_SELF']);
            if (isset($_SESSION["user"]["role"]) && !empty($_SESSION["user"]["role"])){
                echo '<a href="/account.php" class="login-button">Кабинет пользователя</a>';
            }
            elseif ($current_file != 'login.php' && $current_file != 'registration.php'){
                echo '<a href="/registration.php" class="regist-button">Регистрация</a>
                <a href="/login.php" class="login-button">Войти</a>';
            }


           
            

        

        if ($current_file == 'main_window.php') {
            // Код, выполняющийся только в файле admin_panel.php
            echo'<a href="#top" class="Top-Logo2">SilverCar</a>';
        }elseif($current_file == 'car_window.php'){
            echo'<a href="/main_window.php" class="Top-Logo2">SilverCar</a>';
        } 
        else{
            // Код, выполняющийся в других файлах
            echo'<a href="/main_window.php" class="Top-Logo1">SilverCar</a>';
        }
        
        ?>
    <h2>Салон поддержанных автомобилей</h2>
</header>