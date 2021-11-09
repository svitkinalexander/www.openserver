<html>
<head>
<title>Авторизация</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #FF8F00;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #AD5F00;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #FF8F00;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #FF8F00; /* fallback for old browsers */
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form" method="POST" action="process.php">
      <input type="text" name="name" placeholder="Ваше имя" required/>
	  <input type="email" name="email" placeholder="E-mail" required/>
      <input type="password" name="password" placeholder="Пароль" required/>
	  <input type="hidden" name="action" value="reg">
      <button>Создать</button>
      <p class="message">Уже зарегистрированы? <a href="#">Войти</a></p>
    </form>
    <form class="login-form" method="POST" action="process.php">
	  <input type="hidden" name="action" value="log">
      <input type="text" name="email" placeholder="E-mail" required/>
      <input type="password" name="password" placeholder="Пароль" required/>
      <button>Войти</button>
	  <?
	  if($_GET['error']=="invalid"){
	  echo "<p style=\"color:red\">Неверный логин или пароль</p>";
	  }
	  if($_GET['error']=="user_contain"){
		echo "<p style=\"color:red\">Такой пользователь уже зарегистрирован!</p>";
	  }
	  ?>
      <p class="message">Не зарегистрированы? <a href="#">Создать аккаунт</a></p>
    </form>
  </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
<script>
$(document).ready(function(){
var currentLocation = window.location.toString();
if(currentLocation.substring(currentLocation.indexOf("?")+1,currentLocation.length) == "reg"){
$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
}else {

}
});


</script>
</html>