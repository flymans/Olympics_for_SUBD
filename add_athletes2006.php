<!DOCTYPE html>
<html>
<head>
  <title>Добавление спортсмена</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="background2">
  <center>
  <h1>Добавить спортсмена:</h1>
  <form class="add_athlete_block" action="add_athletes2006.php" method="post">
    <div class="left_div">
 ФИО:<br>
    <input  type="text" name="Name" value=""><br>
     Страна:<br>
    <input type="text" name="Country" value=""><br>
     Вид спорта:<br>
    <input type="text" name="Sport" value="">
  </div>
    <div class="right_div">
     Количество золота:<br>
    <input type="number" min="0"  name="Gold" value="0"><br>
    Количество серебра:<br>
    <input type="number"  min="0" name="Silver" value="0"><br>
    Количество бронзы:<br>
    <input type="number" min="0" name="Bronze" value="0"><br>
    </div>
    <div class="buttons_block">
    <a href="admin_athletes2006.php" class="button"><span>←</span>Назад</a>
    <a class="button"><span>✔</span><input class="input_button" type="submit" name="add" value="Добавить"></a><br>
</div>
  </form>
  <?php
  include 'database2006.php';
  if (!$cnct || !$dbselect) {
    mysql_error();
  }
  if (isset($_POST['add'])) {
    $name = strip_tags(trim($_POST['Name']));
    $country = strip_tags(trim($_POST['Country']));
    $sport= strip_tags(trim($_POST['Sport']));
    $gold = strip_tags(trim($_POST['Gold']));
    $silver = strip_tags(trim($_POST['Silver']));
    $bronze = strip_tags(trim($_POST['Bronze']));
    $all = "INSERT INTO athletes (Name, Country, Sport, Gold, Silver, Bronze) VALUES ('$name', '$country', '$sport', '$gold', '$silver', '$bronze')";
    $result = mysql_query($all);
    echo '<i> Спортсмен <b>'.$name.'</b> был добавлен.</i> <br />';
    mysql_close($cnct);
  }
  ?>
</center>
</body>
</html>
