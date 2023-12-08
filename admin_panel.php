
<!-- Проверка нажата ли кнопка "Сохранить" -->
<?php
  if(isset($_POST['save']) && !empty($_POST['ID']) && !empty($_POST['Name']) && !empty($_POST['Price']) && !empty($_POST['Year']) 
                          && !empty($_POST['Mileage']) && !empty($_POST['Volume']) && !empty($_POST['Power']) && !empty($_POST['Engine_Type']) 
                          && !empty($_POST['Transmission']) && !empty($_POST['Configuration']) && !empty($_POST['Pic1']) && !empty($_POST['Pic2'])
                          && !empty($_POST['Pic3']) && !empty($_POST['Pic4']) && !empty($_POST['Pic5']) ){
    
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

    $id = $_POST['ID'];
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Year = $_POST['Year'];
    $Mileage = $_POST['Mileage'];
    $Volume = $_POST['Volume'];
    $Power = $_POST['Power'];
    $Engine_Type = $_POST['Engine_Type'];
    $Transmission = $_POST['Transmission'];
    $Configuration = $_POST['Configuration'];

    $query = "UPDATE CarInfo SET ID = $ID, Name = '$Name', Price = $Price, Year = $Year, 
    Mileage = $Mileage, Volume = $Volume, Power = $Power, Engine_Type = '$Engine_Type', 
    Transmission = '$Transmission', Configuration = '$Configuration' WHERE ID = $ID";

    if ($conn->query($query)){
      echo "Данные успешно обновлены в таблице CarInfo <br />";
    }
    else {
      echo "Ошибка, данные не обновлены в таблице CarInfo <br />";
    }


    $Pic1 = $_POST['Pic1'];
    $Pic2 = $_POST['Pic2'];
    $Pic3 = $_POST['Pic3'];
    $Pic4 = $_POST['Pic4'];
    $Pic5 = $_POST['Pic5'];
    $query = "UPDATE CarPictures SET CarID = $ID, Pic1 = '$Pic1', 
    Pic2 = '$Pic2', Pic3 = '$Pic3', Pic4 = '$Pic4', Pic5 = '$Pic5' WHERE CarID = $ID";

    if ($conn->query($query)){
      echo "Данные успешно обновлены в таблице CarPictures <br />";
    }
    else {
      echo "Ошибка, данные не обновлены в таблице CarPictures <br />";
    }

    $conn->close(); 
    }
    else if (isset($_POST['save'])){
      echo "Ошибка, вы ввели не все данные";
    }
?>









<!-- Проверка нажата ли кнопка "Найти автомобиль" -->
<?php 
  if (isset($_POST['find_car']) && !empty($_POST['ID'])){
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = ''; 
    $db_name = 'SilverCarDB';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
      die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    }
    else{
      echo "Есть подключение к БД <br />";
    }

    $post_id = $_POST["ID"];
    $query = "SELECT * FROM CarInfo ci JOIN CarPictures cp ON ci.ID = cp.carID WHERE ci.ID = $post_id";

    $result = $conn->query($query);
    if ($result->num_rows > 0){
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $_POST['ID'];           
        $name = $row['Name'];
        $price = $row['Price'];
        $year = $row['Year'];
        $mileage = $row['Mileage'];
        $volume = $row['Volume'];
        $power = $row['Power'];
        $engine_type = $row['Engine_Type'];
        $transmission = $row['Transmission'];
        $configuration = $row['Configuration'];
        $pic1 = $row['Pic1'];
        $pic2 = $row['Pic2'];
        $pic3 = $row['Pic3'];
        $pic4 = $row['Pic4'];
        $pic5 = $row['Pic5'];
      }
      echo "Автомобиль был найден <br />";
    }
    else{
      echo "Автомобиль не был найден";
    }
    $conn->close();  
  }
?>






<!-- Проверка нажата ли кнопка "Удалить автомобиль" -->
<?php
  if (isset($_POST['delete_car'])){
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = ''; 
    $db_name = 'SilverCarDB';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
      die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    }
    else{
      echo "Есть подключение к БД <br />";
    }

    $post_id = $_POST["ID"];
    $query = "DELETE FROM CarInfo WHERE ID = $post_id";

    if ($conn->query($query)){
      echo "Данные успешно удалены <br />";
    }
    else {
      echo "Ошибка, данные не удалены <br />";
    }
    $conn->close(); 
  }
?>







<!DOCTYPE html>
<html>
<head>
  <title>Панель администратора</title>
</head>
<body>
  <h1>Панель администратора</h1>

  <form method="POST" action="">
    <input type="hidden" name="ID" value="<?php if ($id != null) echo $id; ?>">
    <table>
      <tr>
        <td>ID:</td>
        <td><input type="text" name="ID" id="ID" value="<?php if (!empty($id)) echo $id; else echo 'ID не найден' ?>"></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td><input type="text" name="Name" value="<?php if (!empty($name)) echo $name; elseif(!empty($Name)) echo $Name; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Price:</td>
        <td><input type="text" name="Price" value="<?php if (!empty($price)) echo $price; elseif(!empty($Price)) echo $Price; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Year:</td>
        <td><input type="text" name="Year" value="<?php if (!empty($year)) echo $year; elseif(!empty($Year)) echo $Year; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Mileage:</td>
        <td><input type="text" name="Mileage" value="<?php if (!empty($mileage)) echo $mileage; elseif(!empty($Mileage)) echo $Mileage; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Volume:</td>
        <td><input type="text" name="Volume" value="<?php if (!empty($volume)) echo $volume; elseif(!empty($Volume)) echo $Volume; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Power:</td>
        <td><input type="text" name="Power" value="<?php if (!empty($power)) echo $power; elseif(!empty($Power)) echo $Power; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Engine Type:</td>
        <td><input type="text" name="Engine_Type" value="<?php if (!empty($engine_type)) echo $engine_type; elseif(!empty($Engine_Type)) echo $Engine_Type; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Transmission:</td>
        <td><input type="text" name="Transmission" value="<?php if (!empty($transmission)) echo $transmission; elseif(!empty($Transmission)) echo $Transmission; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Configuration:</td>
        <td><input type="text" name="Configuration" value="<?php if (!empty($configuration)) echo $configuration; elseif(!empty($Configuration)) echo $Configuration; else echo '' ?>"></td>
      </tr>
      <tr>
      <td>Picture 1:</td>
        <td><input type="text" name="Pic1" value="<?php if (!empty($pic1)) echo $pic1; elseif(!empty($Pic1)) echo $Pic1; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 2:</td>
        <td><input type="text" name="Pic2" value="<?php if (!empty($pic2)) echo $pic2; elseif(!empty($Pic2)) echo $Pic2; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 3:</td>
        <td><input type="text" name="Pic3" value="<?php if (!empty($pic3)) echo $pic3; elseif(!empty($Pic3)) echo $Pic3; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 4:</td>
        <td><input type="text" name="Pic4" value="<?php if (!empty($pic4)) echo $pic4; elseif(!empty($Pic4)) echo $Pic4; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 5:</td>
        <td><input type="text" name="Pic5" value="<?php if (!empty($pic5)) echo $pic5; elseif(!empty($Pic5)) echo $Pic5; else echo '' ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="save" value="Сохранить">
          <input type="submit" name="find_car" value="Найти автомобиль">
          <input type="submit" name="delete_car" value="Удалить автомобиль">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
