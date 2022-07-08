<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Авторизация</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Авторизация</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<input type="text" name="username" placeholder="Имя пользователя" >
  	</div>
  	<div class="input-group">
  		<input type="password" name="password" placeholder="Пароль">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Войти</button>
  	</div>
  	<p>
  		Нет учетной записи? <a href="register.php" style="color: blue;" >Регистрация</a>
  	</p>
  </form>
</body>
</html>