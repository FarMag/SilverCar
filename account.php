<?php session_start();

    if (empty($_SESSION['user'])){
        header('Location: login.php');
    }

    if (isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css\style.css" type="text/css" rel="stylesheet"> -->
    <!--<link rel="stylesheet" type="text/css" href="css/main_window_style.css">-->
    <link rel="stylesheet" type="text/css" href="css/header_style.css">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="css/account_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- <style>
    <php include "css/account.css" ?>
    <php include "css/header_style.css" ?>
    <php include "css/footer_style.css" ?>
    </style> -->
</head>

<?php require "blocks/header.php" ?>

<form method="POST" action="">
    <body class="body">
        <ul>
            <li><?php echo "Почта - ". $_SESSION['user']['email']; ?></li>
            <li><?php echo "Пароль - ". $_SESSION['user']['password']; ?></li>
            <li><?php echo "Роль - ". $_SESSION['user']['role']; ?></li>
            <!--<li><php echo "Имя - ". $_SESSION['user']['name']; ?></li>                  это если использвать файл users.php -->
            <!--<li><a href="logout.php">Выйти из аккаунта</a></li> -->
            <input type="submit" name="logout" value="Выйти">
        </ul>
    </body>
</form>

<?php require "blocks/footer.php" ?>

</html>
