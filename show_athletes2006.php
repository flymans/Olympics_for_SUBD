<!DOCTYPE html>
<html>
<head>
  <title>Участники Олимпийских игр 2006</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="background3">
  <center><h1>Список участников:</h1></center>
  <form class="sorting_buttons" method="POST">
    <input  class="button1" type="submit" name="sort_by_name" value="Сортировка по имени" /><br>
    <input  class="button1" type="submit" name="sort_by_medals" value="Сортировка по медалям" /><br>
    <input  class="button1" type="submit" name="sort_by_country" value="Сортировка по стране" /><br>
    <center><input type="submit" class="button1" value="Назад" name="back"></center>
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
  include 'database2006.php';
  $query = "SELECT * FROM athletes ORDER BY gold desc, silver desc, bronze desc";
  $result = mysql_query($query) or die(mysql_error());
  echo '<div>';
  echo '<center>';
  echo '<table class="table_dark"><caption></caption><tr><th><b>Имя</b></th><th><b>Страна</b></th><th><b>Вид спорта</b></th><th><b>Золото</b></th><th><b>Серебро</b></th><th><b>Бронза</b></th></tr>';
	echo '</center>';
  echo '</div>';
  if( isset( $_POST['sort_by_country'] ) )
  {
    $query3 = "SELECT * FROM athletes ORDER BY country";
      $result3 = mysql_query($query3) or die(mysql_error());

      while ($row = mysql_fetch_array($result3))
      {
        echo '<tr align="center"><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
      }

      exit;
  }


    if( isset( $_POST['sort_by_name'] ) )
    {
        $query1 = "SELECT * FROM athletes ORDER BY name";
        $result1 = mysql_query($query1) or die(mysql_error());

        while ($row = mysql_fetch_array($result1))
        {
          echo '<tr align="center"><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
        }
        exit;
    }
    if( isset( $_POST['sort_by_medals'] ) )
    {
        $query2 = "SELECT * FROM athletes ORDER BY gold desc, silver desc, bronze desc";
        $result2 = mysql_query($query2) or die(mysql_error());

        while ($row = mysql_fetch_array($result2))
        {
          echo '<tr align="center"><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
        }
        exit;
    }

  while ($row = mysql_fetch_array($result))
  {
    echo '<tr align="center"><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
  }
  ?>

</body>
</html>
