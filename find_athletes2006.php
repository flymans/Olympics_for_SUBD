<!DOCTYPE html>
<html>
<head>
  <title>Поиск спортсмена</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="background3">
  <br>
  <form action="find_athletes2006.php" method="post">
<center>
    <aside>
    <input type="text" name="Name" placeholder="Введите имя/фамилию">
    <select name="Country">
      <option value="">Выберите страну...</option>
    <?php
    include 'database2006.php';
    $query= "SELECT * from countries limit 5";
    $result=mysql_query($query);
    while ($row = mysql_fetch_object($result)) {
    echo '<option value="'.$row->Country_name.'">'. $row->Country_name. '</option>';
    }
    ?>
  </select>
    <select name="Sport">
    <option value="">Выберите спорт...</option>
    <?php
    $query= "SELECT * from sports";
    $result=mysql_query($query);
    while ($row = mysql_fetch_object($result)) {
    echo '<option value="'.$row->Sport_name.'">'. $row->Sport_name. '</option>';
    }
    ?>
    </select>
  </aside>
</center>
      <a class="button" ><span>✔</span><input class="input_button" type="submit" name="find" value="Найти"></a><br>
  </form>
  <?php
  session_start();
  if (isset($_POST['back'])) {
    if ($_SESSION['admin']==1) {
      header("Location: admin_athletes2006.php");
  }
  else{
      header("Location: athletes2006.php");
  }
}
  echo '<center>';
  echo '<table class="table_dark"><caption></caption><tr><th><b>Имя</b></th><th><b>Страна</b></th><th><b>Вид спорта</b></th><th><b>Золото</b></th><th><b>Серебро</b></th><th><b>Бронза</b></th></tr>';
  echo '</center>';

  if( isset( $_POST['find'] ) )
  {
    $name = mysql_real_escape_string(trim($_POST['Name']));
    $country = trim($_POST['Country']);
    $sport = trim($_POST['Sport']);
    $query = "SELECT * FROM athletes where Name like '%$name%' and Country like '%$country%' and Sport like '%$sport%' order by gold desc,silver desc, bronze desc" ;
      $result = mysql_query($query) or die(mysql_error());

      while ($row = mysql_fetch_array($result))
      {
        echo '<tr align="center"><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
      }

}
  ?>

</select>
  <form action="find_athletes2006.php" method="post">
<input type="submit" class="button1" value="Назад" name="back">
<a  href="menu2006.php" class="button"><span>⌂</span>В главное меню</a>
  </form>
  </center>
</body>
</html>
