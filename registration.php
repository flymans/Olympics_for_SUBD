<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
<meta charset="utf-8">
<title>Регистрация</title>
</head>
<body class="background2">
<center><form action="registration.php" method="POST">
	<h1>Регистрация</h1>
	<br><br>
	<input class="input1" type="text" name="login" placeholder="Логин"><br><br>
	<input class="input1" type="password" name="password" placeholder="Пароль"><br><br>
  <a class="button"><span>✔</span><input class="input_button" type="submit" name="registration" value="Зарегистрироваться"></a><br><br>
<?php
include"database2006.php";
if (isset($_POST['registration'])) {
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
      if (empty($login) or empty($password)) {
				 exit ('<script>alert("Вы заполнили не все поля!");</script>');
      }
    }
    if (isset($_POST['registration'])) {
      $result = mysql_query("SELECT User_id FROM users WHERE login='$login'");
  		$myrow = mysql_fetch_array($result);
  		if (!empty($myrow['User_id']))
  		{
				exit ('<script>alert("Введенный вами логин уже зарегистрирован. Введите другой логин!");</script>');
  		}

      $result2 = mysql_query("INSERT INTO users(login,password) VALUES('$login', '$password')");
      if ($result2=='TRUE')
      {
        echo'<script>alert("Вы успешно зарегистрированы!\nСейчас Вы будете перенаправлены на страницу авторизации");</script>';
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
      }
       else
      {
        echo '<script>alert("Ошибка, вы не зарегистрированы!");</script>';
      }
    }
?>
</form>
</body>
</html>
