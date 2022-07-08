<?php 
  session_start(); 
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Личный кабинет</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2>Личный кабинет</h2>
</div>
<div class="content">

<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
		<img src="pictures/avatar.png" class='avatar'>
    	<p>Привет, <strong><?php echo $_SESSION['username']; ?> </strong></p>
		<p> <a href="index.php?logout='1'" style="color: blue;">Выход</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>