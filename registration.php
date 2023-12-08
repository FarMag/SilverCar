<?php session_start();

    if (!empty($_SESSION['user'])){
        header('Location: account.php');
    }
?>



<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/registration_style.css">
    <link rel="stylesheet" type="text/css" href="css/header_style.css">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- <style>
    <php include "css/registration.css" ?>
    <php include "css/header.css" ?>
    <php include "css/footer.css" ?>
    </style> -->
</head>

<title class="registration-title">Зарегистрироваться</title>

<?php require "blocks/header.php"?>

<body class="register-body">
    <div class="container">
        <h1 class="registration-registration">Регистрация</h1>
        <form id="register" class="input-group">
            <input class="input-registration-name" type="text" placeholder="Имя" required>
            <input class="input-registration-email" type="text" placeholder="Email" required>
            <input class="input-registration-password" type="password" placeholder="Пароль" required>
            <input class="input-registration-accept_password" type="text" placeholder="Подтверждение пароля" required>
            <button class="register-button" type="submit" onclick="window.location.href='/account.php'">Зарегистрироваться</button>
        </form>
    </div>
</body>

<?php require "blocks/footer.php" ?>

</html>
