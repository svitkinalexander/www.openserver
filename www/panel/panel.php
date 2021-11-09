<?php
session_start();
if($_SESSION['panel_admin.login']=='' || $_SESSION['panel_admin.password']==''){
	header("Location: index.php");
}
?>
<html>
<head>
<title>Панель управления</title>
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
input{background-color:white;
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
<li id="photo">Отзывы</li>
<li id="video">Услуги</li>
<li id="requests">Заявки</li>
</ul>
</div>
<div class="content" id="content">
<h1 class="content_title">Отзывы</h1>
<table class="content_table">
<tr class="tr_table"><td class="link" style="background-color:black;color:white;font-weight:1000;font-size: 3vh;">Имя</td><td class="link" style="background-color:black;color:white;font-weight:1000;    font-size: 3vh;">Текст</td><td class="link" style="background-color:black;color:white;font-weight:1000;    font-size: 3vh;">Действие</td></tr>
<?php

include('../connect.php');
if($_GET['action']=='delete'){
	$link1 = $_GET['link'];
	$query = "DELETE FROM `photo` WHERE `url` = '$link1'"; 
	$result = mysqli_query($link, $query);  
}
	
	$query = "SELECT * FROM `comment`"; 
			$result = mysqli_query($link, $query);  
		
		
while ($row = mysqli_fetch_assoc($result)){
            $name = $row["name"];
			$text = $row["text_comment"];
            echo'<tr class="tr_table"><td class="link">'.$name.'</td><td class="link">'.$text.'</td><td class="link" style="background-color:#FF8F00;cursor:pointer;color:white" onclick="delete_comment(\''.$name.'\',\''.$text.'\')">Удалить</td></tr>
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