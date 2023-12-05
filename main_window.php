<?php
$host = 'localhost';
$username = 'root'; 
$password = '';  
$dbname = 'SilverCarDB';  

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die('Ошибка соединения с MySQL: ' . mysqli_connect_error());
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        
    </style>

    <title>SilverCar - Салон поддержанных автомобилей</title>
</head>

<?php require "header.php" ?>

<body>
    
<?php
            $query = "SELECT * FROM CarInfo";
            // $query_c = "COUNT(*) FROM CarInfo";
            $result = mysqli_query($conn, $query);
            // $result_c = mysqli_query($conn, $query_c);
            while ($row = mysqli_fetch_assoc($result)) {
                
                $id = $row['ID'];           
                $name = $row['Name'];
                $price = $row['Price'];

                $query_pic = "SELECT Pic1 FROM CarPictures cp JOIN CarInfo ci ON ci.ID = cp.CarID WHERE ci.ID = $id";
                
                echo"<div class='container'>
                <div class='car'>
                <table border>
                    <tr>
                        <td width=700px; height=200px;>";
                        $result_pic = $conn->query($query_pic);
                        if ($result_pic->num_rows > 0) {
                            $row_pic = $result_pic->fetch_assoc();
                            $pic = $row_pic['Pic1'];
                        } else {
                        echo "Нет данных";
                        }

                        echo "<img src='$pic' alt='$name' />
                        </td>
                    </tr>
                    <tr><td><h2>$name</h2></td></tr>
                    <tr><td><h3>". number_format($price, 0, '.', ' '). " ₽</h3></td></tr>  
                
                </table>
                <br>
                
                
                </div>
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
    <?php require "footer.php" ?>
</body>
</html>

<?php
//Ваш PHP код для обработки данных и отправки заказа
?>