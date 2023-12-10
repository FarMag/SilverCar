<?php
session_start();

if (isset($_POST['send_data'])){
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

    $Name = $_POST['modal-name'];
    $Email = $_POST['modal-email'];
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }

    $query = "INSERT INTO Request (CarID, User_Name, User_Email)
              VALUES ($id, '$Name', '$Email')";

    if ($conn->query($query)){
        header('Location: main_window.php');
    }
    else {
        echo "error";
    }
    $conn->close(); 
}

$host = 'localhost';
$username = 'root'; 
$password = '';  
$dbname = 'SilverCarDB';  

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die('Ошибка соединения с MySQL: ' . mysqli_connect_error());
}
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css\style.css" type="text/css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="css/car_window_style.css">
    <link rel="stylesheet" type="text/css" href="css/header_style.css">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <title>SilverCar - Салон поддержанных автомобилей</title>
</head>

<?php require "blocks/header.php" ?>

<body>
    
<?php
            $query = "SELECT * FROM CarInfo WHERE ID = '$id'";
            // $query_c = "COUNT(*) FROM CarInfo";
            $result = mysqli_query($conn, $query);
            // $result_c = mysqli_query($conn, $query_c);
            while ($row = mysqli_fetch_assoc($result)) {          
                $brand = $row['Brand'];
                $model = $row['Model'];
                $price = $row['Price'];
                $year = $row['Year'];
                $mileage = $row['Mileage'];
                $volume = $row['Volume'];
                $power = $row['Power'];
                $engine_type = $row['Engine_Type'];
                $transmission = $row['Transmission'];
                $configuration = $row['Configuration'];
                
                $query_pic = "SELECT Pic1, Pic2, Pic3, Pic4, Pic5 FROM CarPictures cp JOIN CarInfo ci ON ci.ID = cp.CarID WHERE ci.ID = $id";
                
                echo"<div class='container'>
                <div class='car' id_2 = '$id'>
                <table class='table'>
                    <tr>
                        <td width=700px;>";
                        // $array_pic = ['images\дефолт\(1).jpg', 'images\дефолт\(1).jpg', 'images\дефолт\(1).jpg', 'images\дефолт\(1).jpg', 'images\дефолт\(1).jpg'];
                        $result_pic = $conn->query($query_pic);
                        
                        if ($result_pic->num_rows > 0) {
                            $row_pic = $result_pic->fetch_assoc();
                            $pic1 = !empty($row_pic['Pic1']) ? $row_pic['Pic1'] : 'images\дефолт\(1).jpg';
                            $pic2 = !empty($row_pic['Pic2']) ? $row_pic['Pic2'] : 'images\дефолт\(1).jpg';
                            $pic3 = !empty($row_pic['Pic3']) ? $row_pic['Pic3'] : 'images\дефолт\(1).jpg';
                            $pic4 = !empty($row_pic['Pic4']) ? $row_pic['Pic4'] : 'images\дефолт\(1).jpg';
                            $pic5 = !empty($row_pic['Pic5']) ? $row_pic['Pic5'] : 'images\дефолт\(1).jpg';
                            // $pic1 = $row_pic['Pic1'];
                            // $pic2 = $row_pic['Pic2'];
                            // $pic3 = $row_pic['Pic3'];
                            // $pic4 = $row_pic['Pic4'];
                            // $pic5 = $row_pic['Pic5'];
                            // $array_pic = [$row_pic['Pic1'], $row_pic['Pic2'], $row_pic['Pic3'], $row_pic['Pic4'], $row_pic['Pic5']];
                            // for ($i = 0; $i < 5; $i++){
                            //     if($array_pic[i] == null){
                            //         $array_pic[i] = 'images\дефолт\(1).jpg';
                            //     }
                            // }
                            echo "<section id='slider_bl'>
                        <div class='wrapper'>
                            <input checked type=radio name='slider' id='slide1' />
                            <input type=radio name='slider' id='slide2' />
                            <input type=radio name='slider' id='slide3' />
                            <input type=radio name='slider' id='slide4' />
                            <input type=radio name='slider' id='slide5' />
                            <div class='slider-wrapper'>
                                <div class=inner>
                                <article>
                                    <img src='$pic1' alt='$brand $model'/>
                                </article>
                                <article>
                                    <img src='$pic2' alt='$brand $model'/>
                                </article>
                                <article>
                                    <img src='$pic3' alt='$brand $model'/>
                                </article>
                                <article>
                                    <img src='$pic4' alt='$brand $model'/>
                                </article>
                                <article>
                                    <img src='$pic5' alt='$brand $model'/>
                                </article>
                                </div>
                            </div>
                            <div class='slider-prev-next-control'>
                                <label for=slide1></label>
                                <label for=slide2></label>
                                <label for=slide3></label>
                                <label for=slide4></label>
                                <label for=slide5></label>
                            </div>
                            <div class='slider-dot-control'>
                                <label for=slide1></label>
                                <label for=slide2></label>
                                <label for=slide3></label>
                                <label for=slide4></label>
                                <label for=slide5></label>
                            </div>
                        </div>
                    </section>";
                        } else {
                        echo "<section id='slider_bl'>
                        <div class='wrapper'>
                            <input checked type=radio name='slider' id='slide1' />
                            <div class='slider-wrapper'>
                                <div class=inner>
                                <article>
                                    <img src='images\дефолт\(1).jpg' alt='$name'/>
                                </article></div>
                                </div>";
                                
                        }

                        
                    echo "</td>
                            <td width=460px;>
                            
                                <div class='info_table'>
                                <table margin-bottom=20px;>
                                <tr class='info tr'></td><h2>$brand $model</h2></td></tr>
                                <tr></td><h3>". number_format($price, 0, '.', ' '). " ₽</h3></td></tr>
                                <tr><td width=250px>Год:</td><td>$year</td></tr>
                                <tr><td>Пробег:</td><td>". number_format($mileage, 0, '.', ' '). " км</td></tr>
                                <tr><td>Объем двигателя:</td><td>$volume л</td></tr>
                                <tr><td>Мощность:</td><td>$power л.с.</td></tr>
                                <tr><td>Тип двигателя:</td><td>$engine_type</td></tr>
                                <tr><td>Коробка передач:</td><td>$transmission</td></tr>
                                <tr><td>Комплектация:</td><td>$configuration</td></tr>
                                <tr><th colspan='2'><button class='btn' id='open-modal-btn'>Связаться</button></th></tr>
                                </table>
                                </div>
                            </td>
                        </td>
                    </tr>   
                
                </table>
                <br>
                
                
                </div>
            </div>";
            }
            mysqli_close($conn);
            ?>
            






            <!-- <div id="modal" class="modal">
                <div class="modal-content">
                <span class="close">&times;</span><br><br>
                <h4>Заполните заявку на обратную связь</h4>
                <form>
                    <input type="text" placeholder="Имя*" required>
                    <-- <input type="tel" pattern="+7-[0-9]{3}-[0-9]{3}" required> ->

                    <input type="text" placeholder="Телефон*" required>
                    <button type="submit">Отправить</button>
                </form>
                </div>
            </div> -->


            <form action="" method="POST">
                <div id="modal" class="modal">
                    <div class="modal-content">
                    <span class="close">&times;</span><br><br>
                    <h4>Заполните заявку на обратную связь</h4>
                    <form>
                        <input type="text" placeholder="Имя*" name="modal-name" required>
                        <!-- <input type="tel" pattern="+7-[0-9]{3}-[0-9]{3}" required> -->

                        <input type="text" placeholder="Email*" name="modal-email" required>
                        <button type="submit" name="send_data">Отправить</button>
                    </form>
                    </div>
                </div>
            </form>




            <p class="p1">Описание</p>
            <p class="p2">Миссия компании SilverCar – сделать ваш автомобильный опыт незабываемым. Мы тщательно отбираем каждый автомобиль, чтобы уверенно предложить вам идеальные варианты из богатого ассортимента премиальных марок.
                Вы можете быть уверены, что каждое предложение прошло тщательную проверку, чтобы удовлетворить самые высокие стандарты качества и надежности. Наша команда экспертов поможет вам выбрать автомобиль, отвечающий вашим потребностям и стилю жизни.
                Мы предлагаем персонализированное обслуживание, чтобы удовлетворить все ваши ожидания и предоставить решение, идеально соответствующее вашим предпочтениям.
                Кроме того, в SilverCar мы гарантируем, что каждый автомобиль прошел тщательное техническое обслуживание и диагностику. Мы заботимся о вашей безопасности и комфорте, поэтому каждый автомобиль находится в отличном техническом состоянии.</p>


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
