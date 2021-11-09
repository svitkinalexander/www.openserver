<?php
error_reporting(0);
session_start();
if($_SESSION['panel_admin.login']=='' || $_SESSION['panel_admin.password']==''){
	header("Location: index.php");
}
?>
<html>
<head>
<title>Заявки - панель управления</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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

.form_button{
width:100%;
height:40px;
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
#title_table{
background-color:black;
color:white;
font-weight:1000;
font-size: 3vh;
}
.action_del{
padding:0;
border:1px solid black;
cursor:pointer;
}
.close_btn{
	position:relative;
	top:0px;
	background-color:#FF8F00;
	float:right;
	cursor:pointer;
}
tr{
word-break: break-all;
}
form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 20px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
form textarea,select,option,input{
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  max-width: 100%;
  min-width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
form button {
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
form button:hover,.form button:active,.form button:focus {
  background: #BC6700;
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
<tr><td class="header_pt" align="left" style="padding-left:10px;"><img class="menu_icon" id="menu_butt" src="src/img/stop.png" height="9%" style="border-radius:50%;cursor:pointer;padding:10px;"></td><td class="header_pt" align="center">Панель управления</td><td class="header_pt"></td></tr>
</table>
</div>
<div class="menu" id="menu">
<ul class="menu_ul">
<li id="photo">Отзывы</li>
<li id="video">Услуги</li>
<li id="requests">Заявки</li>
</ul>
</div>
<div class="content" id="content">
<div class="params">
<form class="login-form" id="form" method="post" action="requests.php">

	<input type="hidden" name="type" value="auth"/>
      <input type="number" name="id" placeholder="ID"/>
	  <select name="service">
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
	<select name="status">
	<option disabled selected value="Не указано">Статус</option>
	<option value="0">Принято</option>
	<option value="1">В очереди</option>
	<option value="2">Выполняется</option>
	<option value="3">Ожидает выдачи</option>
	<option value="4">Выдано</option>
	<option value="5">Завершено</option>
	
	</select>
      <button formaction="requests.php">Показать</button><p>
	  <button onclick="reset_bt();">Сбросить</button>
    </form>
</div>



<h1 class="content_title">Заявки</h1>
<table class="content_table">
<tr class="tr_table"><td class="link">ID</td><td class="link">Номер авто</td><td class="link">Услуга</td><td class="link">Статус</td><td class="link">Комментарий</td>
<?php
include('../connect.php');

if($_SESSION['panel_admin.login']!='' && $_SESSION['panel_admin.password']!=''){
	
	
			
		if($_POST['id']!="" || $_POST['service']!="" || $_POST['status']!=""){
		if($_POST['id']!=""){
			
		$id = $_POST['id'];
		$id = "`id` LIKE '$id%'";}
		else {$id = "1";}
		
		if($_POST['service']!=""){
		$service = $_POST['service'];$service = " AND `good` = '$service'";}else {$service = " AND 1";}
		if($_POST['status']!=""){
		$state = $_POST['status']; $state = " AND `state` = '$state'";}else {$state = " AND 1";}
	$query = "SELECT * FROM `request` WHERE  $id $service $state"; 
		
}else {
	$query = "SELECT * FROM `request`"; 
}
$result = mysqli_query($link, $query);  
		
while ($row = mysqli_fetch_assoc($result)){
            $id = $row["id"];
	$car_id = $row["car_id"];
	$good = $row["good"];
	$state = $row["state"];
	$other_info = $row["other_info"];
	$state_string;
			switch($state){
				case 0: $state_string = "Принято";break;
				case 1: $state_string = "В очереди";break;
				case 2: $state_string = "Выполняется";break;
				case 3: $state_string = "Ожидает выдачи";break;
				case 4: $state_string = "Выдано";break;
				case 5: $state_string = "Завершено";break;
			}
            echo'<tr><td class="link">'.$id.'</td><td class="link">'.$car_id.'</td><td class="link">'.$good.'</td><td class="link" style="cursor:pointer" onclick="update_state('.$id.','.$state.')">'.$state_string.'</td><td class="link">'.$other_info.'</td></tr>
			';
}

echo'
</table>
</div>
</body>
<script src="src/js/menu.js"></script>
<script src="src/js/click-work.js"></script>
</html>';
}
else {
	header ('Location: index.php');
	exit();
}

?>
<script>
function reset_bt(){
	document.getElementById("form").reset();
}
</script>