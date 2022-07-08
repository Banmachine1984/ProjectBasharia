<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Введите имя пользователя"); }
  if (empty($email)) { array_push($errors, "Введите Email"); }
  if (empty($password_1)) { array_push($errors, "Введите пароль"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Повторите пароль");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Имя пользователя занято");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Этот Email занят");
    }
  }

  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $key = '6LcInr4gAAAAAPf4w6mgHOvLBLw2ak9AdfvsFRIY';
  $query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];

  $data = json_decode(file_get_contents($query));

  if( $data -> success == false) {
    array_push($errors, "Заполните капчу");
  }

  if (count($errors) == 0) {
  	$password = $password_1;

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Вы зарегистрировались";
  	header('location: index.php');
  }

}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Не введено имя пользователя");
  }
  if (empty($password)) {
  	array_push($errors, "Не введён пароль");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Добро пожаловать";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Неверный логин или пароль");
  	}
  }
}

?>