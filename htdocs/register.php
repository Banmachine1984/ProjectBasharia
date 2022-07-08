<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Регистрация</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Регистрация</h2>
  </div>
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <input type="text" name="username" placeholder="Имя пользователя" value="<?php echo $username;?>">
  	</div>
  	<div class="input-group">
  	  <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>">
  	</div>
  	<div class="input-group">
  	  <input type="password" name="password_1" placeholder="Пароль">
  	</div>
  	<div class="input-group">
  	  <input type="password" name="password_2" placeholder="Повторите пароль">
  	</div> <br>
      <div class="g-recaptcha" data-sitekey="6LcInr4gAAAAAAsurG_OCTQodA7iJLaq8zzoiSY-"></div>
  	<div class="input-group"> 
  	  <button type="submit" class="btn" name="reg_user">Регистрация</button>
  	</div>
  	<p>
  		Есть учетная запись? <a href="login.php" style="color: blue";>Войти</a>
  	</p>
  </form>

</body>
</html>