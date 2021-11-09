<?php
if($_POST["username"]==""){
echo'
<html>
<head>
	<meta charset="UTF-8">
	<title>Авторизация - Панель Управления</title>
	
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>

<body>
  <div class="content" style="height:100%;">
  <div class="form-wrapper" style="margin-top:calc(50% - 120px);">
    <div class="linker"> 
      <span class="ring"></span>
      <span class="ring"></span>
      <span class="ring"></span>
      <span class="ring"></span>
      <span class="ring"></span>
    </div>
    <form class="login-form" action="index.php" method="POST">
      <input type="text" name="username" placeholder="Логин" />
      <input type="password" name="password" placeholder="Пароль" />
      <button type="submit">ВОЙТИ</button>
    </form>
  </div>
</div>

  <script src="http:"></script>

</body>

</html>';
}
else {
$login = $_POST["username"];
$password = $_POST["password"];	
if($login == "admin" & $password == "admin"){ //Первые кавычки - логин, вторые - пароль
	session_start();
	$_SESSION['panel_admin.login']= $login;
	$_SESSION['panel_admin.password']= $password;
	header ('Location: panel.php');  
	exit();
}else {
	header ('Location: index.php');  
	exit();
}
}
?>