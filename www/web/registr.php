<html>

<head>
<link rel="shortcut icon" href="img/gaika_nizkaja_nerzh-ico.png" type="image/x-icon">
<title>
Заявка на активацию 
</title>
<style>
body{
	margin:0;
	background-color:lightgray;
}
.container{
   width:100%;
   
	
}
.reg_form{
	
	width:34%;
	margin-left:33%;
	background-color:white;
}
.reg_form input{
	width:90%;
	margin-left:5%;
	font-family:Arial;
	font-size:28px;
	
	
	
}
h1{
	font-family:Arial;
	text-align:center;
}
.butt_reg{
	width:90%;
	margin-left:5%;
	font-family:Arial;
	font-size:28px;
	margin-bottom:5%;
}
</style>
</head>

<body>

<div class="container">
<h1>Заявка на программу</h1>
<form class="reg_form" action="registr.php" method="post">
		<input type="hidden" name="action" value="send">
		<input class="text_field" style="margin-top:5%"  type="text" name="name" value="" placeholder="Имя"><Br>
		<input class="text_field"  type="text" name="subname" value="" placeholder="Фамилия"><br>
		<input class="text_field" type="email" name="email" value="" placeholder="E-mail"><Br>
		<button class="butt_reg" >Зарегистрироваться</button><p>
 
	</form>
 </div>
</body>

</html>
<?php
if($_POST["action"]=="send"){
	
if($_POST["name"]!="" && $_POST["subname"]!="" && $_POST["email"]!=""){
	$name = $_POST["name"];
	$subname = $_POST["subname"];
	$email = $_POST["email"];
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'comment');
          $result = mysqli_query($connect, "INSERT INTO `users` (`name`, `subname`, `email`) VALUES ('$name', '$subname', '$email');"); 
		  mail($email,'Активация программы','Ваш код активации: 446-039-505');
}else echo "Введите все данные";

}
?>