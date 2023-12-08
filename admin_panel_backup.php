<?php 
   if (!empty($_POST['subject'])){
      echo $_POST['subject'];
    } else{
      echo "Пусто";
    } 
?>

<form name="form" action="" method="POST">
    <input type="text" name="subject" id="subject" value="11111">
    <input type="submit">
</form>













<?php 
  if (!empty($_POST['id'])){
    $db_host = 'localhost';
    $db_user = 'root'; // Введите ваше имя пользователя базы данных
    $db_pass = ''; // Введите ваш пароль базы данных
    $db_name = 'SilverCarDB'; // Введите название вашей базы данных

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
      die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    }

    $post_id = $_POST["id"];
    $query = "SELECT * FROM CarInfo WHERE ID = $post_id";

    $result = $conn->query($query);
    if ($result->num_rows > 0){
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $_POST['id'];           
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

    
  }


   if (!empty($_POST['id'])){
      echo $_POST['id'];
    } else{
      echo "Пусто";
    } 
?>




<!DOCTYPE html>
<html>
<head>
  <title>Административная панель</title>
</head>
<body>
  <h1>Административная панель</h1>

  <form method="POST" action="">
    <input type="hidden" name="id" value="<?php if ($id != null) echo $id; ?>">
    <table>
      <tr>
        <td>ID:</td>
        <td><input type="text" name="id" id="id" value="<?php if ($id != null) echo $id; ?>"></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td><input type="text" name="name" value="<?php if ($name != null) echo $name; ?>"></td>
      </tr>
      <tr>
        <td>Price:</td>
        <td><input type="text" name="price" value="<?php if ($price != null) echo $price; ?>"></td>
      </tr>
      <tr>
        <td>Year:</td>
        <td><input type="text" name="year" value="<?php if ($year != null) echo $year; ?>"></td>
      </tr>
      <tr>
        <td>Mileage:</td>
        <td><input type="text" name="mileage" value="<?php if ($mileage != null) echo $mileage; ?>"></td>
      </tr>
      <tr>
        <td>Volume:</td>
        <td><input type="text" name="volume" value="<?php if ($volume != null) echo $volume; ?>"></td>
      </tr>
      <tr>
        <td>Power:</td>
        <td><input type="text" name="power" value="<?php if ($power != null) echo $power; ?>"></td>
      </tr>
      <tr>
        <td>Engine Type:</td>
        <td><input type="text" name="engine_type" value="<?php if ($engine_type != null) echo $engine_type; ?>"></td>
      </tr>
      <tr>
        <td>Transmission:</td>
        <td><input type="text" name="transmission" value="<?php if ($transmission != null) echo $transmission; ?>"></td>
      </tr>
      <tr>
        <td>Configuration:</td>
        <td><input type="text" name="configuration" value="<?php if ($configuration != null) echo $configuration; ?>"></td>
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
          <a href="delete.php?id=<?php echo $row['ID']; ?>">Удалить запись</a>
        </td>
      </tr>
    </table>
  </form>

  <?php $conn->close(); ?>






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
