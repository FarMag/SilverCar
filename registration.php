<?php session_start();
    $errors = [];

    if (!empty($_SESSION['user'])){
        header('Location: account.php');
    }

    if(isset($_POST['reg-but'])){
        if($_POST['reg-name'] == '' || $_POST['reg-email'] == '' || $_POST['reg-pass'] == '' || $_POST['reg-pass-acc'] == ''){
            $errors[] = 'Вы ввели не все данные';
        }
        else if($_POST['reg-pass'] != $_POST['reg-pass-acc']){
            $errors[] = 'Пароли не совпадают';
        }
        else if($_POST['reg-name'] != '' && $_POST['reg-email'] != '' && $_POST['reg-pass'] != '' && $_POST['reg-pass-acc'] != '' && ($_POST['reg-pass'] == $_POST['reg-pass-acc'])){
            $db_host = 'localhost';
            $db_user = 'root';
            $db_pass = ''; 
            $db_name = 'SilverCarDB';

            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

            if (!$conn) {
                die('Ошибка подключения к базе данных:' . mysqli_connect_error());
            }

            $Email = $_POST['reg-email'];

            $query = "SELECT ID FROM Users where Email = '$Email'";

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $errors[] = 'Пользователь с такой почтой уже существует';
            } else {
                $Name = $_POST['reg-name'];
                $Email = $_POST['reg-email'];
                $Password = $_POST['reg-pass'];
                $md5pass = md5($Password);
                $Role_ID = 2;

                $query = "INSERT INTO Users (Name, Email, Password, Role_ID)
                VALUES ('$Name', '$Email', '$md5pass', $Role_ID)";

                if ($conn->query($query)){
                    echo "Вы успешно зарегистрировались на сайте <br />";
                    header('Location: main_window.php');
                    $_SESSION['user'] = ['email' => $_POST['reg-email']];
                }
                else {
                    $errors[] = 'Произошла ошибка при регистрации';
                }
                $conn->close(); 
            }

            /*$Name = $_POST['reg-name'];
            $Email = $_POST['reg-email'];
            $Password = $_POST['reg-pass'];
            $md5pass = md5($Password);
            $Role_ID = 2;

            $query = "INSERT INTO Users (Name, Email, Password, Role_ID)
              VALUES ('$Name', '$Email', '$md5pass', $Role_ID)";

            if ($conn->query($query)){
                echo "Вы успешно зарегистрировались на сайте <br />";
                header('Location: main_window.php');
                $_SESSION['user'] = ['email' => $_POST['reg-email']];
            }
            else {
                $errors[] = 'Произошла ошибка при регистрации';
            }
            $conn->close(); */
        }
        else{
            $errors[] = 'Произошла неизвестная ошибка';
        }
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

<?php require "blocks/header.php" ?>

<body class="body">
    <div class="container">
        <h1 class="registration-registration">Регистрация</h1>
        <form id="register" class="input-group" method="POST" action="">
            <input class="input-registration-name" name="reg-name" type="text" placeholder="Имя" value="<?php if(!empty($_POST['reg-name'])) echo $_POST['reg-name']; else echo '' ?>">
            <input class="input-registration-email" name="reg-email" type="text" placeholder="Email" value="<?php if(!empty($_POST['reg-email'])) echo $_POST['reg-email']; else echo '' ?>">
            <input class="input-registration-password" name="reg-pass" type="password" placeholder="Пароль" value="<?php if(!empty($_POST['reg-pass'])) echo $_POST['reg-pass']; else echo '' ?>">
            <input class="input-registration-accept_password" name="reg-pass-acc" type="password" placeholder="Подтверждение пароля" value="<?php if(!empty($_POST['reg-pass-acc'])) echo $_POST['reg-pass-acc']; else echo '' ?>">
            <button type="submit" class="register-button" name="reg-but">Зарегистрироваться</button>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <a class="register" href="/login.php">Уже есть аккаунт? Войдите!</a>
        </form>
    </div>
</body>

<?php require "blocks/footer.php" ?>

</html>
