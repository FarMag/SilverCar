 <?php 
    session_start();
    $errors = [];

    /*$errors = [];
    if (!empty($_SESSION['user'])){
        header('Location: account.php');
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])){
        if ($_POST['email'] == '123@mail.com' && $_POST['password'] == '123'){                          // Здесь вместо 123@mail.com и 123 будет запрос в бд для поиска клиента в бд
            $_SESSION['user'] = ['email' => $_POST['email'], 'password' => $_POST['password'], 'role' => 'user'];         // Занесение информации о пароле, почте, роли в сессию
            header('Location: account.php');
            die;
        }
        else{
            $errors[] = 'Неверный логин или пароль';
        }
    }*/

    if (!empty($_SESSION['user'])){
        header('Location: account.php');
    }

    if(isset($_POST['log-but'])){
        if ($_POST['email'] == '' || $_POST['password'] == ''){
            $errors[] = 'Вы ввели не все данные';
        }
        else{
            $db_host = 'localhost';
            $db_user = 'root';
            $db_pass = ''; 
            $db_name = 'SilverCarDB';

            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

            if (!$conn) {
                die('Ошибка подключения к базе данных:' . mysqli_connect_error());
            }
            else{
                echo "Есть подключение к БД <br />";
            }

            $Email = $_POST['email'];
            $Password = $_POST['password'];
            $md5pass = md5($Password);

            $query = "SELECT ID FROM Users where Email = '$Email' AND Password = '$md5pass'";

            $result = $conn->query($query);
            if ($result->num_rows == 1) {
                header('Location: main_window.php');
                $_SESSION['user'] = ['email' => $_POST['email']];
            } else {
                $errors[] = 'Пользователь не найден';
            }
            $conn->close(); 

            /*if ($conn->query($query)){
                echo "Вы успешно зарегистрировались на сайте <br />";
                header('Location: main_window.php');
                $_SESSION['user']['email'] = $Email;
            }
            else {
                $errors[] = 'Произошла ошибка при регистрации';
            }*/
        }
    }
?>





<!-- Здесь принцип работы с условной "БД", где данные о пользователях хранятся в файле users.php, но на практике это отстой !!!!!!!!!!!-->

<!--<php 
    session_start();

    $users = require_once 'users.php';

    $errors = [];
    if (!empty($_SESSION['user'])){
        header('Location: account.php');
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])){
        foreach ($users as $user){
            if ($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']) { 
                $_SESSION['user'] = $user;
                header('Location: account.php');
                die;
            }
        }
        $errors[] = 'Неверный логин или пароль';
    }
?>-->



<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title class="login-title">Войти</title>

    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <link rel="stylesheet" type="text/css" href="css/header_style.css">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- <style>
    <php include "css/login.css" ?>
    <php include "css/header_style.css" ?>
    <php include "css/footer_style.css" ?>
    </style> -->

</head>


<?php require "blocks/header.php" ?>


<body class="login-body">
    <div class="container">
        <h1 class="login-text">Вход</h1>
        <a class="register" href="/registration.php">Регистрация</a>
        <form id="login" class="input-group" method="POST" action="">
            <!-- <input type="text" class="login-email" placeholder="Email" id="email" name="email" required /> -->
            <input type="text" class="login-email" placeholder="Email" id="email" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; else echo '' ?>"/>
            <input type="password" class="input-login-password" placeholder="Пароль" id="password" name="password" value="<?php if(!empty($_POST['password'])) echo $_POST['password']; else echo '' ?>"/>
            <button class="login-button1" type="submit" name="log-but" onclick="window.location.href='/account.php'">Войти</button>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </form>
        
    </div>
    
</body>

<?php require "blocks/footer.php" ?>

</html>
