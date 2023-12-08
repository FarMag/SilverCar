 <?php 
    session_start();

    $errors = [];
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
        <form id="login" class="input-group" method="POST">
            <!-- <input type="text" class="login-email" placeholder="Email" id="email" name="email" required /> -->
            <input type="email" class="login-email" placeholder="Email" id="email" name="email" />
            <input type="password" class="input-login-password" placeholder="Пароль" id="password" name="password" required />
            <button class="login-button1" type="submit" onclick="window.location.href='/account.php'">Войти</button>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <a class="register" href="/registration.php">Нет аккаунта? Создайте его!</a>
        </form>
        
    </div>
    
</body>

<?php require "blocks/footer.php" ?>

</html>
