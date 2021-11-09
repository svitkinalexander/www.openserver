<?php
session_start();
if($_SESSION['email_user_gaika']=='' || $_SESSION['pass_user_gaika']==''){
	header("Location: index.php");
}
?>
<html>
<head>
<title>Кабинет пользователя</title>
<link rel="shortcut icon" href="../img/logogaika.png" type="image/x-icon">
<style>
body{
margin:0;
}
.header{
width:100%;
height:10%;
background-color:black;
position:fixed;
left:0;
top:0;
}
.menu{
position:fixed;
top:10%;
height:90%;
left:0;
width:20%;
background-color:#FF8F00;
transition:left 0.5s;
}
.content{
width:80%;
position:fixed;
overflow-y: auto;
overflow-x:hidden;
background-color:white;
right:0px;
top:10%;
height:90%;
transition:width 0.5s;
}
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
	background-color:black;
	height:10
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	}
.header table tr td{
color:white;
}
.header_table{
width:99%;
margin-left:0.5%;
margin-right:0.5%;
height:100%;
}
.header_pt{
width:33.3%;
font-size:5vh;
font-family:Arial;
}
.menu_ul{
list-style:none;
padding:0;
width:100%;
height:auto;
margin:0;
}
.menu_ul li{
color:white;
font-family:Arial;
font-size:5vh;
padding-left:15px;
padding-top:10px;
padding-bottom:10px;
}
.menu_ul li:hover{
background-color:white;
color:darkgray;
cursor:pointer;
}
.menu_icon:hover{
border:1px solid white;
border-radius:10px;
padding:0;
}
.content_title{
text-align:center;
font-family:Arial;
}
.content_title img{
vertical-align:middle;
margin-left:10px;
cursor:pointer;
}
.content_table{
height: auto;
    width: 90%;
	table-layout: fixed;
    position: relative;
    top: 10px;
	text-align:center;
    float: center;
    margin-left: 5%;
    border:2px solid black;
	border-spacing:0;
	overflow-y:auto;
	
}
.input_photo{
display:none;
position:fixed;
z-index:9998;
margin:auto;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
}
form{
background-color:white;
word-break: break-all;
width:40%;
height:120px;
margin:auto;
margin-top:calc(25% - 60px);
z-index:9999;
}
.form_button{
width:100%;
height:40px;
font-size:3vh;
}
input, select, textarea{background-color:white;
width:100%;
height:40px;
min-height:40px;
max-width:100%;
min-width:100%;
resize:none;
font-size:3vh;
}
.link{
width:auto;
word-break: break-all;
height:auto;
font-family:Arial;
padding:0;
margin:0;
border-spacing:0;
border:1px solid black;
}
.action_del{
padding:0;
border:1px solid black;
cursor:pointer;
}
.close_btn{
	position:relative;
	top:0px;
	background-color:black;
	float:right;
	cursor:pointer;
}
tr{
word-break: break-all;
}
</style>
</head>
<body>
<div class="header">
<table class="header_table">
<tr><td class="header_pt" align="left" style="padding-left:10px;"><img class="menu_icon" id="menu_butt" src="src/img/stop.png" height="9%" style="border-radius:50%;cursor:pointer;padding:10px;"></td><td class="header_pt" align="center"><div style="color: #FF8F00;line-height:55px">ГАЙКА<img src="../img/logogaika.png" /></div></td><td class="header_pt"></td></tr>
</table>
</div>
<div class="menu" id="menu">
<ul class="menu_ul">
<li id="requests">Заявки</li>
<li id="exit">Выйти</li>
</ul>
</div>
<div class="input_photo" id="add_photo">
<?php
    if (!empty($_POST)) {
       header('Location:panel.php');
    }
?>
<form method="POST" action="upload.php" >
<img  id="close_add" class="close_btn" src="src/img/stop.png" width="32px">
<input type="hidden" name="action" value="new_request">

<input type="text" name="number" placeholder="Номер авто">
<select name="serv" required>
	<option disabled selected value="Не указано">Услуга</option>
	<?php
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'comment');
          $result = mysqli_query($connect, "SELECT * FROM `services`"); 
		  
          while ( ($row = mysqli_fetch_assoc($result)) ) {
            $type = $row['type'];
	echo '<option value="'.$type.'">'.$type.'</option>';
		  }
	?>
	</select>
<textarea type="text" name="other_info" placeholder="Комментарий к заявке"></textarea><br>
<button class="form_button" style="z-index:9999">Добавить</button>
</form>
</div>
<div class="content" id="content">

<h1 class="content_title">Мои заявки <span style="cursor:pointer;color:#FF8F00;font-size:4vh" id="add_bt"> + </span></h1>
<table class="content_table">
<tr class="tr_table"><td class="link" style="background-color:black;color:white;font-weight:1000;font-size: 3vh;">Услуга</td><td class="link" style="background-color:black;color:white;font-weight:1000;    font-size: 3vh;">Номер авто</td><td class="link" style="background-color:black;color:white;font-weight:1000;    font-size: 3vh;">Статус</td><td class="link" style="background-color:black;color:white;font-weight:1000;    font-size: 3vh;">Действие</td></tr>
<?php

include('../connect.php');
if($_GET['action']=='cancel'){
	$link1 = $_GET['link'];
	$query = "DELETE FROM `photo` WHERE `url` = '$link1'"; 
	$result = mysqli_query($link, $query);  
}
	$email = $_SESSION['email_user_gaika'];
	$query = "SELECT * FROM `request` WHERE `user`='$email'"; 
			$result = mysqli_query($link, $query);  
		
		
while ($row = mysqli_fetch_assoc($result)){
            $good = $row["good"];
			$car = $row["car_id"];
			$state = $row["state"];
			$id = $row["id"];
			$state_string;
			switch($state){
				case 0: $state_string = "Принято";break;
				case 1: $state_string = "В очереди";break;
				case 2: $state_string = "Выполняется";break;
				case 3: $state_string = "Ожидает выдачи";break;
				case 4: $state_string = "Выдано";break;
				case 5: $state_string = "Завершено";break;
			}
            echo'<tr class="tr_table"><td class="link">'.$good.'</td><td class="link">'.$car.'</td><td class="link">'.$state_string.'</td><td class="link" style="background-color:#FF8F00;cursor:pointer;color:white" onclick="cancel_request(\''.$email.'\',\''.$id.'\')">Отменить</td></tr>
			';
}

echo'
</table>
</div>
</body>
<script src="src/js/menu.js"></script>
<script src="src/js/click-work.js"></script>
</html>';

?>