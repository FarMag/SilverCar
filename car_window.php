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
                $name = $row['Name'];
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
                        $result_pic = $conn->query($query_pic);
                        if ($result_pic->num_rows > 0) {
                            $row_pic = $result_pic->fetch_assoc();
                            $pic1 = $row_pic['Pic1'];
                            $pic2 = $row_pic['Pic2'];
                            $pic3 = $row_pic['Pic3'];
                            $pic4 = $row_pic['Pic4'];
                            $pic5 = $row_pic['Pic5'];
                        } else {
                        echo "Нет данных";
                        }

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
                                    <img src='$pic1' />
                                </article>
                                <article>
                                    <img src='$pic2' />
                                </article>
                                <article>
                                    <img src='$pic3' />
                                </article>
                                <article>
                                    <img src='$pic4' />
                                </article>
                                <article>
                                    <img src='$pic5' />
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
                    </section>
                    </td>";
                    echo 
                            "<td width=460px;>
                            
                                <div class='info_table'>
                                <table margin-bottom=20px;>
                                <tr class='info tr'></td><h2>$name</h2></td></tr>
                                <tr></td><h3>". number_format($price, 0, '.', ' '). " ₽</h3></td></tr>
                                <tr><td width=250px>Год:</td><td>$year</td></tr>
                                <tr><td>Пробег:</td><td>". number_format($mileage, 0, '.', ' '). " км</td></tr>
                                <tr><td>Объем двигателя:</td><td>$volume л</td></tr>
                                <tr><td>Мощность:</td><td>$power л.с.</td></tr>
                                <tr><td>Тип двигателя:</td><td>$engine_type</td></tr>
                                <tr><td>Коробка передач:</td><td>$transmission</td></tr>
                                <tr><td>Комплектация:</td><td>$configuration</td></tr>
                                <tr><th colspan='2'><button>Связаться</button></th></tr>
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
