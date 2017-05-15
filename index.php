<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
<meta charset="utf-8">
	<title>Авторизация</title>
</head>
<body class="background2">
<center><form action="index.php" method="POST">
  <h1>Авторизация</h1>
  <br><br>
	<input  class="input1" type="text" name="login" placeholder="Логин"><br><br>
	<input  class="input1" type="password" name="password" placeholder="Пароль"><br><br>
  <a class="button"><span>✔</span><input class="input_button" type="submit" name="enter" value="Войти"></a><br>
	<a class="button1" href="registration.php">Зарегистрироваться</a><br><br>
	<?php
	include"database2006.php";
if (isset($_POST['enter'])) {
      if (!$cnct || !$dbselect) {
       mysql_error();
      }
       if (isset($_POST['login']))
        {
          $login = $_POST['login'];
          if ($login == '')
          {
            unset($login);
          }
        }
        if (isset($_POST['password']))
        {
          $password=$_POST['password'];
          if ($password =='')
          {
            unset($password);
          }
        }

        if (empty($login) and empty($password)) {
          exit ('<script>alert("Вы не ввели логин и пароль!");</script>');
        }

        if (empty($login)) {
          exit ('<script>alert("Вы не ввели логин!");</script>');
        }

        if (empty($password)) {
          exit ('<script>alert("Вы не ввели пароль!");</script>');
        }
      }
	  if (isset($_POST['enter'])) {
        session_start();
    		$result = mysql_query("SELECT * FROM users WHERE login='$login'");
    		$myrow = mysql_fetch_array($result);
    		if (empty($myrow['password']))
    		{
          exit ('<script>alert("Введенный Вами логин или пароль неверный!");</script>');
       }
       else
       {
          if ($myrow['password']==$password)
          {
            if ($myrow['admin']==1) {
             $_SESSION['login']=$myrow['login'];
             $_SESSION['user_id']=$myrow['user_id'];
             $_SESSION['admin']=$myrow['admin'];
             header("Location: menu2006.php");
            }
            else {
             $_SESSION['login']=$myrow['login'];
             $_SESSION['user_id']=$myrow['user_id'];
             $_SESSION['admin']=$myrow['admin'];
             header("Location: menu2006.php");
            }
          }
          else
          {
          exit ('<script>alert("Введенный Вами логин или пароль неверный!");</script>');
          }
       }
     }
     ?>
</form>
<center>
</body>
</html>
