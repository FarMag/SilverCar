<!-- <php 
   if (!empty($_POST['subject'])){
      echo $_POST['subject'];
    } else{
      echo "Пусто";
    } 
?>

<form name="form" action="" method="POST">
    <input type="text" name="subject" id="subject" value="11111">
    <input type="submit">
</form> -->












<!-- Проверка нажата ли кнопка "Сохранить" -->
<?php
  if(isset($_POST['save']) && !empty($_POST['ID']) && !empty($_POST['Name']) && !empty($_POST['Price']) && !empty($_POST['Year']) 
                          && !empty($_POST['Mileage']) && !empty($_POST['Volume']) && !empty($_POST['Power']) && !empty($_POST['Engine_Type']) 
                          && !empty($_POST['Transmission']) && !empty($_POST['Configuration']) ){
  // if (isset($_POST['save'])){
    echo "Есть подключение к БД";
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = ''; 
    $db_name = 'SilverCarDB';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
      die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    }

    /*$query = "UPDATE CarInfo SET [ID] = $_POST['ID'], SET [Name] = $_POST['Name'], SET [Price] = $_POST['Price'], SET [Year] = $_POST['Year'], 
              SET [Mileage] = $_POST['Mileage'], SET [Volume] = $_POST['Volume'], SET [Power] = $_POST['Power'], SET [Engine_Type] = $_POST['Engine_Type'], 
              SET [Transmission] = $_POST['Transmission'], SET [Configuration] = $_POST['Configuration'], WHERE ID = $_POST['ID']";*/



    /*$query = "UPDATE CarInfo SET ID = $_POST['ID'], Name = $_POST['Name'], Price = $_POST['Price'], Year = $_POST['Year'], 
    Mileage = $_POST['Mileage'], Volume = $_POST['Volume'], Power = $_POST['Power'], Engine_Type = $_POST['Engine_Type'], 
    Transmission = $_POST['Transmission'], Configuration = $_POST['Configuration'] WHERE ID = $_POST['ID']";*/








    // РАБОТАЕТ !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /*$query = "UPDATE CarInfo SET ID = 9, Name = 'Porsch', Price = 100000, Year = 2000, 
    Mileage = 100000, Volume = 3.5, Power = 450, Engine_Type = 'Бензин', 
    Transmission = 'АКПП', Configuration = 'Base' WHERE ID = 9";*/









    /*$ID = 9;
    $Name = "Pors";
    $Price = 111111;
    $Year = 2003;
    $Mileage = 111;
    $Volume = 3.5;
    $Power = 450;
    $Engine_Type = "Бензин";
    $Transmission = "АКПП";
    $Configuration = "База";*/

    // Работает !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /*$ID1 = 9;
    $Name1 = 'Pors';
    $Price1 = 111111;
    $Year1 = 2003;
    $Mileage1 = 111;
    $Volume1 = 3.5;
    $Power1 = 450;
    $Engine_Type1 = 'Бензин';
    $Transmission1 = 'АКПП';
    $Configuration1 = 'База';
    $ID1 = 9;
    $query = "UPDATE CarInfo SET ID = $ID1, Name = '$Name1', Price = $Price1, Year = $Year1, 
    Mileage = $Mileage1, Volume = $Volume1, Power = $Power1, Engine_Type = '$Engine_Type1', 
    Transmission = '$Transmission1', Configuration = '$Configuration1' WHERE ID = $ID1";*/

    $id = $_POST['ID'];
    $ID1 = $_POST['ID'];
    $Name1 = $_POST['Name'];
    $Price1 = $_POST['Price'];
    $Year1 = $_POST['Year'];
    $Mileage1 = $_POST['Mileage'];
    $Volume1 = $_POST['Volume'];
    $Power1 = $_POST['Power'];
    $Engine_Type1 = $_POST['Engine_Type'];
    $Transmission1 = $_POST['Transmission'];
    $Configuration1 = $_POST['Configuration'];
    $query = "UPDATE CarInfo SET ID = $ID1, Name = '$Name1', Price = $Price1, Year = $Year1, 
    Mileage = $Mileage1, Volume = $Volume1, Power = $Power1, Engine_Type = '$Engine_Type1', 
    Transmission = '$Transmission1', Configuration = '$Configuration1' WHERE ID = $ID1";



    /*$query = "UPDATE CarInfo SET ID = " . $_POST['ID'] . ", Name = " . Porsche . ", Price = " . $_POST['Price'] . ", Year = " . $_POST['Year'] . ", 
    Mileage = " . $_POST['Mileage'] . ", Volume = " . $_POST['Volume'] . ", Power = " . $_POST['Power'] . ", Engine_Type = " . $_POST['Engine_Type'] . ", 
    Transmission = " . $_POST['Transmission'] . ", Configuration = " . $_POST['Configuration'] . " WHERE ID = " . $_POST['ID'] . ""; */
  
    if ($conn->query($query)){
      echo "Данные успешно обновлены";
    }
    else {
      echo "Ошибка, данные не добавлены";
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

    $post_id = $_POST["ID"];
    $query = "SELECT * FROM CarInfo WHERE ID = $post_id";

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
        // $pic1 = $row['Pic1'];
        // $pic2 = $row['Pic2'];
        // $pic3 = $row['Pic3'];
        // $pic4 = $row['Pic4'];
        // $pic5 = $row['Pic5'];
      }
    }
    else{
      echo "0 Rows was found";
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
      echo "<div>Есть подключение к БД</div>";
    }

    $post_id = $_POST["ID"];
    $query = "DELETE FROM CarInfo WHERE ID = $post_id";

    if ($conn->query($query)){
      echo "Данные успешно удалены";
    }
    else {
      echo "Ошибка, данные не удалены";
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
        <td><input type="text" name="Name" value="<?php if (!empty($name)) echo $name; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Price:</td>
        <td><input type="text" name="Price" value="<?php if (!empty($price)) echo $price; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Year:</td>
        <td><input type="text" name="Year" value="<?php if (!empty($year)) echo $year; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Mileage:</td>
        <td><input type="text" name="Mileage" value="<?php if (!empty($mileage)) echo $mileage; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Volume:</td>
        <td><input type="text" name="Volume" value="<?php if (!empty($volume)) echo $volume; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Power:</td>
        <td><input type="text" name="Power" value="<?php if (!empty($power)) echo $power; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Engine Type:</td>
        <td><input type="text" name="Engine_Type" value="<?php if (!empty($engine_type)) echo $engine_type; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Transmission:</td>
        <td><input type="text" name="Transmission" value="<?php if (!empty($transmission)) echo $transmission; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Configuration:</td>
        <td><input type="text" name="Configuration" value="<?php if (!empty($configuration)) echo $configuration; else echo '' ?>"></td>
      </tr>
      <tr>
        <!-- <td>Picture 1:</td>
        <td><input type="text" name="pic1" value="<php echo $row_carpictures['Pic1']; ?>"></td>
      </tr>
      <tr>
        <td>Picture 2:</td>
        <td><input type="text" name="pic2" value="<php echo $row_carpictures['Pic2']; ?>"></td>
      </tr>
      <tr>
        <td>Picture 3:</td>
        <td><input type="text" name="pic3" value="<php echo $row_carpictures['Pic3']; ?>"></td>
      </tr>
      <tr>
        <td>Picture 4:</td>
        <td><input type="text" name="pic4" value="<php echo $row_carpictures['Pic4']; ?>"></td>
      </tr>
      <tr>
        <td>Picture 5:</td>
        <td><input type="text" name="pic5" value="<php echo $row_carpictures['Pic5']; ?>"></td>
      </tr> -->
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







  <!-- <form>
  <input type="hidden" name="id" value="1">
    <table>
      <tr>
        <td>ID:</td>
        <td>1</td>
      </tr>
      <tr>
        <td>Name:</td>
        <td><input type="text" name="name" value="merc"></td>
      </tr>
      <tr>
        <td>Price:</td>
        <td><input type="text" name="price" value="123000"></td>
      </tr>
      <tr>
        <td>Year:</td>
        <td><input type="text" name="year" value="2010"></td>
      </tr>
      <tr>
        <td>Mileage:</td>
        <td><input type="text" name="mileage" value="10000"></td>
      </tr>
      <tr>
        <td>Volume:</td>
        <td><input type="text" name="volume" value="3.0"></td>
      </tr>
      <tr>
        <td>Power:</td>
        <td><input type="text" name="power" value="200 лс"></td>
      </tr>
      <tr>
        <td>Engine Type:</td>
        <td><input type="text" name="engine_type" value="Бензин"></td>
      </tr>
      <tr>
        <td>Transmission:</td>
        <td><input type="text" name="transmission" value="АКПП"></td>
      </tr>
      <tr>
        <td>Configuration:</td>
        <td><input type="text" name="configuration" value="База"></td>
      </tr>
      <tr>
        <td>Picture 1:</td>
        <td><input type="text" name="pic1" value=""></td>
      </tr>
      <tr>
        <td>Picture 2:</td>
        <td><input type="text" name="pic2" value=""></td>
      </tr>
      <tr>
        <td>Picture 3:</td>
        <td><input type="text" name="pic3" value=""></td>
      </tr>
      <tr>
        <td>Picture 4:</td>
        <td><input type="text" name="pic4" value=""></td>
      </tr>
      <tr>
        <td>Picture 5:</td>
        <td><input type="text" name="pic5" value=""></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="save" value="Сохранить">
          <a href="delete.php?id=1">Удалить запись</a>
        </td>
      </tr>
    </table>
  </form> -->

  
  
</body>
</html>
