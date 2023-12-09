<!-- Проверка нажата ли кнопка "Добавить автомобиль" -->
<?php
  if(isset($_POST['add_car']) && !empty($_POST['ID']) && !empty($_POST['Name']) && !empty($_POST['Price']) && !empty($_POST['Year']) 
                          && !empty($_POST['Mileage']) && !empty($_POST['Volume']) && !empty($_POST['Power']) && !empty($_POST['Engine_Type']) 
                          && !empty($_POST['Transmission']) && !empty($_POST['Configuration']) ){
    
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

    $query_carInfo = "SELECT ID FROM CarInfo WHERE ID = $ID";
    $query_carPictures = "SELECT ID FROM CarPictures WHERE CarID = $ID";

    /*if ($conn->query($query_carInfo) != ''){
      $query = "INSERT INTO CarInfo (ID, Name, Price, Year, Mileage, Volume, Power, Engine_Type, Transmission, Configuration)
              VALUES ($ID, '$Name', $Price, $Year, $Mileage, $Volume, $Power, '$Engine_Type', '$Transmission', '$Configuration')";

      if ($conn->query($query)){
        echo "Данные успешно добавлены в таблицу CarInfo <br />";
      }
      else {
        echo "Ошибка, данные не добавлены в таблицу CarInfo <br />";
      }
    }
    else {
      echo "В БД уже существует машина с таким ID (CarInfo)<br />";
    }*/


    $query = "INSERT INTO CarInfo (ID, Name, Price, Year, Mileage, Volume, Power, Engine_Type, Transmission, Configuration)
              VALUES ($ID, '$Name', $Price, $Year, $Mileage, $Volume, $Power, '$Engine_Type', '$Transmission', '$Configuration')";

    if ($conn->query($query)){
      echo "Данные успешно добавлены в таблицу CarInfo <br />";
    }
    else {
      echo "В БД уже существует машина с таким ID (CarInfo) <br />";
    }














    $CarID = $_POST['ID'];

    if(!empty($_POST['Pic1']))
      $Pic1 = $_POST['Pic1'];
    else
      $Pic1 = NULL;

    if(!empty($_POST['Pic2']))
      $Pic2 = $_POST['Pic2'];
    else
      $Pic2 = NULL;

    if(!empty($_POST['Pic3']))
      $Pic3 = $_POST['Pic3'];
    else
      $Pic3 = NULL;

    if(!empty($_POST['Pic4']))
      $Pic4 = $_POST['Pic4'];
    else
      $Pic4 = NULL;

    if(!empty($_POST['Pic5']))
      $Pic5 = $_POST['Pic5'];
    else
      $Pic5 = NULL;

    /*if ($conn->query($query)){
      echo "Данные успешно добавлены в таблицу CarPictures <br />";
    }
    else {
      echo "Ошибка, данные не добавлены в таблицу CarPictures <br />";
    }*/





    /*if ($conn->query($query_carPictures) == ''){
      $query = "INSERT INTO CarPictures (CarID, Pic1, Pic2, Pic3, Pic4, Pic5) VALUES ($CarID, '$Pic1', '$Pic2', '$Pic3', '$Pic4', '$Pic5')";

        if ($conn->query($query)){
          echo "Данные успешно добавлены в таблицу CarPictures <br />";
        }
        else {
          echo "Ошибка, данные не добавлены в таблицу CarPictures <br />";
        }
    }
    else {
      echo "В БД уже существует машина с таким ID (CarPictures)<br />";
    }*/

    //$query = "INSERT INTO CarPictures (CarID, Pic1, Pic2, Pic3, Pic4, Pic5) VALUES ($CarID, '$Pic1', '$Pic2', '$Pic3', '$Pic4', '$Pic5')";
    $query_carPictures = "SELECT ID FROM CarPictures WHERE CarID = $ID";
    $result_carPictures = $conn->query($query_carPictures);
    if ($result_carPictures->num_rows > 0) {
      echo "В БД уже существует машина с таким ID (CarPictures) <br />";
    } else {
      $query = "INSERT INTO CarPictures (CarID, Pic1, Pic2, Pic3, Pic4, Pic5) VALUES ($CarID, '$Pic1', '$Pic2', '$Pic3', '$Pic4', '$Pic5')";
      if ($conn->query($query)){
        echo "Данные успешно добавлены в таблицу CarPictures <br />";
      }
      else {
        echo "Ошибка, данные не добавлены в таблицу CarPictures <br />";
      }
    }

    /*if ($conn->query($query)){
      echo "Данные успешно добавлены в таблицу CarPictures <br />";
    }
    else {
      echo "В БД уже существует машина с таким ID (CarPictures) <br />";
    }*/

    $conn->close();
  } 
  else if (isset($_POST['add_car'])){
    echo "Ошибка, вы ввели не все данные";
  }
?>







<!DOCTYPE html>
<html>
<head>
  <title>Панель администратора - добавление автомобиля</title>
</head>
<body>
  <h1>Добавление автомобиля</h1>

  <form method="POST" action="">
    <!-- <input type="hidden" name="ID" value="<php if ($ID != null) echo $id; ?>"> -->
    <table>
      <tr>
        <td>ID:</td>
        <td><input type="text" name="ID" id="ID" value="<?php if (!empty($_POST['ID'])) echo $_POST['ID']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td><input type="text" name="Name" value="<?php if (!empty($_POST['Name'])) echo $_POST['Name']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Price:</td>
        <td><input type="text" name="Price" value="<?php if (!empty($_POST['Price'])) echo $_POST['Price']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Year:</td>
        <td><input type="text" name="Year" value="<?php if (!empty($_POST['Year'])) echo $_POST['Year']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Mileage:</td>
        <td><input type="text" name="Mileage" value="<?php if (!empty($_POST['Mileage'])) echo $_POST['Mileage']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Volume:</td>
        <td><input type="text" name="Volume" value="<?php if (!empty($_POST['Volume'])) echo $_POST['Volume']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Power:</td>
        <td><input type="text" name="Power" value="<?php if (!empty($_POST['Power'])) echo $_POST['Power']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Engine Type:</td>
        <td><input type="text" name="Engine_Type" value="<?php if (!empty($_POST['Engine_Type'])) echo $_POST['Engine_Type']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Transmission:</td>
        <td><input type="text" name="Transmission" value="<?php if (!empty($_POST['Transmission'])) echo $_POST['Transmission']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Configuration:</td>
        <td><input type="text" name="Configuration" value="<?php if (!empty($_POST['Configuration'])) echo $_POST['Configuration']; else echo '' ?>"></td>
      </tr>
      <tr>
      <td>Picture 1:</td>
        <td><input type="text" name="Pic1" value="<?php if (!empty($_POST['Pic1'])) echo $_POST['Pic1']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 2:</td>
        <td><input type="text" name="Pic2" value="<?php if (!empty($_POST['Pic2'])) echo $_POST['Pic2']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 3:</td>
        <td><input type="text" name="Pic3" value="<?php if (!empty($_POST['Pic3'])) echo $_POST['Pic3']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 4:</td>
        <td><input type="text" name="Pic4" value="<?php if (!empty($_POST['Pic4'])) echo $_POST['Pic4']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td>Picture 5:</td>
        <td><input type="text" name="Pic5" value="<?php if (!empty($_POST['Pic5'])) echo $_POST['Pic5']; else echo '' ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="add_car" value="Сохранить">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
