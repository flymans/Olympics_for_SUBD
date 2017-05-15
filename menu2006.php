<!DOCTYPE html>
<html>
<head>
  <title>Зимние Олимпийские игры 2006</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<?php
  session_start();
  echo "<center><h1>Здравствуйте, ".$_SESSION['login']."</h1></center>";
  if (isset($_POST['sports'])) {
    if ($_SESSION['admin']==1) {
      header("Location: admin_athletes2006.php");
  }
  else{
      header("Location: athletes2006.php");
  }
}
?>
<body class="background2" >
  <center><h1>Зимние Олимпийские игры 2006 в Турине, Италия</h1>
  <form action="menu2006.php" method="POST">
<input type="submit" class="button1" value="Спортсмены" name="sports">
<a class="button1" href="countries2006.php">Страны</a>
<a class="button1" href="sports2006.php">Виды спорта</a>
<a class="button1" href="information2006.php">Об Олимпиаде</a>
</form>
</center>
</body>
</html>
