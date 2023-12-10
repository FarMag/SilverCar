<?php
session_start();
$host = 'localhost';
$username = 'root'; 
$password = '';  
$dbname = 'SilverCarDB';  

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die('Ошибка соединения с MySQL: ' . mysqli_connect_error());
}

$brandQuery = "SELECT DISTINCT Brand FROM CarInfo";
$brandResult = mysqli_query($conn, $brandQuery);
$brands = [];
// $result_brand = $conn->query($brandQuery);

if ($brandResult && mysqli_num_rows($brandResult) > 0) {
    while ($row = mysqli_fetch_assoc($brandResult)) {
        $brands[] = $row['Brand'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css\style.css" type="text/css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="css/main_window_style.css">
    <link rel="stylesheet" type="text/css" href="css/header_style.css">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <!-- <car onclick="location.href='car_window.php';">Redirect to another site</div> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        
    </style>

    <title>SilverCar - Салон поддержанных автомобилей</title>
</head>

<?php require "blocks/header.php" ?>

<body>
    
<!-- <select id="sort" style='    text-align: left;
    font-size: 18px;
    background-color: #FFCF40;
    color: #000000;
    font-family: "Roboto", sans-serif;
    border-redius: 10px;'>
    <option value="">Сначала старые публикации</option>
    <option value="">Сначала новые публикации</option>
    <option value="">Сначала дешевле</option>
    <option value="">Сначала дороже</option>
</select><br> -->

 <form  action="main_window.html">
 <div class="selectWrapper">
  <select class="selectBox">
  <option>Сначала старые публикации</option>
  <option>Сначала новые публикации</option>
  <option>Сначала дешевле</option>
  <option>Сначала дороже</option>
</select>
</div>

<button class='btn' id='open-modal-btn'>Фильтры</button>
            <div id="modal" class="modal">
                <div class="modal-content">
                <span class="close">&times;</span><br><br>
                <h4>Заполните заявку на обратную связь</h4>
                <form>
                    <input type="text" placeholder="Имя*" required>
                    <!-- <input type="tel" pattern="+7-[0-9]{3}-[0-9]{3}" required> -->

                    <input type="text" placeholder="Телефон*" required>
                    <button type="submit">Отправить</button>
                </form>
                </div>
            </div>
 </form>
 

<?php
    $query = "SELECT * FROM CarInfo";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
        $brand = $row['Brand'];
        $model = $row['Model'];
        $price = $row['Price'];
        $query_pic = "SELECT Pic1 FROM CarPictures cp JOIN CarInfo ci ON ci.ID = cp.CarID WHERE ci.ID = $id";
        echo "<div class='container'>
                <a href='car_window.php? id=$id' style='text-decoration: none;'> <!-- Добавляем ссылку с параметром id -->
                <div class='car' id='$id'>
                    <table>
                        <tr>
                            <td width='700px' height='200px'>";
        $result_pic = $conn->query($query_pic);
        if ($result_pic->num_rows > 0) {
            $row_pic = $result_pic->fetch_assoc();
            $pic = !empty($row_pic['Pic1']) ? $row_pic['Pic1'] : 'images\дефолт\(1).jpg';
            echo "<img src='$pic' alt='$name' />";
        } 
        // else {
        //     echo "<img src='images\дефолт\(1).jpg' alt='$name' />";
        // }

        echo 
                        "</td>
                        </tr>
                        <tr><td><h2>$brand $model</h2></td></tr>
                        <tr><td><h3>" . number_format($price, 0, '.', ' ') . " ₽</h3></td></tr>  
                    </table>
                    <br>
                </div>
            </a>
        </div>";
    }
            
    mysqli_close($conn);
?>


    <!-- <div class="container">
        <div class="car">
            
            <h2>Posrche Cayenne S</h2>
            <h3>2 520 000 ₽</h3>
            <table border=1>
                <tr>
                    <td width=700px; height=200px;>
                        <img src="porsche cayenne 2010 (1).jpg" alt="Porsche Cayenne S" />
                    </td>
                        <td width=460px;>
                            <div class="info_table">
                            <table width=100%; border=1>
                            <tr><td>Год:</td><td>2010</td></tr>
                            <tr><td><margin-left=40px;>Пробег:</td><td> км</td></tr>
                            <tr><td>Объем двигателя:</td><td>4.8 л</td></tr>
                            <tr><td>Мощность:</td><td>400 л.с.</td></tr>
                            <tr><td>Тип двигателя:</td><td>Бензин</td></tr>
                            <tr><td>Коробка передач:</td><td>Автомат</td></tr>
                            <tr><td>Комплектация:</td><td>S Tiptronic</td></tr>
                            </table>
                            </div>
                        </td>
                    </td>
                </tr>   
            
            </table>
        <br>
        <button>Связаться</button>
        <a href="connect-modal.php" class="btn-modal-conn">Связаться</a>
        </div>
    </div> -->
    
    <?php require "blocks/footer.php" ?>
</body>
</html>

<?php
//Ваш PHP код для обработки данных и отправки заказа
?>

<script>
    window.onload = function() {
  var modal = document.getElementById("modal");
  var openModalBtn = document.getElementById("open-modal-btn");
  var closeModalBtn = document.getElementsByClassName("close")[0];

  openModalBtn.onclick = function() {
    modal.style.display = "block";
  }

  closeModalBtn.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
};
</script>
