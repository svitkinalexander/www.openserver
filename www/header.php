<link href="https://fonts.googleapis.com/css?family=Stalinist+One" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<style>
header{
margin:0;
position:fixed;
height:70px;
width:100%;
background-color:black;
top:0px;
}
table{
	width:90%;
	margin-left:5%;
	height:70px;
}
.navbar-brand{
	text-align:left;
	height:70px;
}
#menu_el{
	font-size:26px;
	color:white;
	width:150px;
	text-align:center;
	transition: color 0.25s;
}
#menu_el:hover{
	color:#FF8F00;
	cursor:pointer;
	transition: color 0.25s;
}
.menu_hide{
	display:none;
	width:150px;
	right:calc(5% + 40px);
	z-index:9999;
	top:70px;
	background-color:black;
	position:absolute;
	}
#menu_el:hover .menu_hide{
	display:block;
	
}
.cont{
	text-decoration:none;
	width:150px;
}
.hide_punct{
	text-decoration:none;
	color:white;
	width:150px;
	height:70px;
}
.menu_ul{
	list-style:none;
	text-color:white;
	width:150px;
    padding-left: 0px;
	margin-bottom:0px;

}
.hide_punct:hover{
	text-decoration:none;
	color:white;
}
.menu_ul li{
	width:100%;
	transition: background-color 0.25s;

}
.menu_ul li:hover{
	background-color:#282828;
	transition: background-color 0.25s;
}
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
	background-color:black;
}
 
::-webkit-scrollbar-thumb {
	background-color:white;
	height:10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	}
.title_text{
	color: #FF8F00;
	line-height:40px;
}
#mobile_menu{
	 margin-left: 0px;
    right: 5%;
    top: 10px;
    filter: invert(1);
    position: fixed;
}
#mobile_menu:hover{
	cursor:pointer;
	background-color:lightgray;
	border-radius:10px;
}
.menu_div_mobile{
	width:70%;
	height:calc(100% - 70px);
	background-color:black;
	position:fixed;
	display:none;
	top:70px;
	
}

ul{
 list-style-type: none;
 padding:0;
 text-align:center;
}

.accordion {
  width: 100%;
  border-radius: 4px;
}

.accordion .link {
  cursor: pointer;
  display: block;
  padding: 15px 15px 15px 15px;
  color: white;
  font-size: 2.5vh;
  font-weight: 700;
  border-bottom: 1px solid #CCC;
  position: relative;
  transition: all 0.4s ease;
}

.accordion li:last-child .link { border-bottom: 0; }

.accordion li i {
  position: absolute;
  top: 2.5vh;
  left: 12px;
  font-size: 2.5vh;
  color: white;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
  right: 12px;
  left: auto;
  font-size: 2.5vh;
}

.accordion li:hover .link { color: #FF8F00; }

.accordion li:hover i { color: #FF8F00; }

.accordion li.open i.fa-chevron-down {
  transform: rotate(180deg);
}

.submenu {
  display: none;

  font-size: 2.5vh;
}

.submenu li { border-bottom: 1px solid white; }

.submenu a {
  display: block;
  text-decoration: none;
  color: white;
  padding: 12px;
  transition: all 0.25s ease;
}

.submenu a:hover {
  background: #FF8F00;
  color: white;
}
.reg_btn{
	border-radius:0px;
	background-color:black;
	transition:all 0.5s;
}
.reg_btn:hover{
	border-radius:35px;
	background-color:white;
	transition:all 0.5s;
}
#mobile_btn{
	position:absolute;
	bottom:0px;
	cursor: pointer;
  display: block;
  width:100%;
  text-align:center;
  padding: 15px 15px 15px 15px;
  color: white;
  border-top: 1px solid white;
  font-size: 2.5vh;
  font-weight: 700;
  border-bottom: 1px solid #CCC;
  transition: all 0.4s ease;
	
}
#mobile_btn:hover{
  color: #FF8F00;
  transition: all 0.4s ease;
	
}
</style>
 <header>
    <table>
	<tr>
	<td colspan="2"><a class="navbar-brand" href="index.php" ><div class="title_text">ГАЙКА<img src="img/logogaika.png"/></div></td>
	<td id="menu_el"  onclick="window.location = 'index.php';">Главная</td>
	<td id="menu_el" onclick="window.location = 'services.php';">Услуги</td>
	<td id="menu_el" onclick="window.location = 'reviews.php';">Отзывы</td>
	<td id="menu_el" class="cont" onclick="window.location = 'about.php';">О нас<div class="menu_hide" ><ul class="menu_ul"><li><a class="hide_punct" href="contacts.php">Контакты</a></li>
	<li ><a class="hide_punct" href="map.php">Проезд</a></li>
	</ul>
	</div></td>
	<td id="menu_el"  style="width:40px" onclick="window.location = 'user/index.php';"><img class="reg_btn" src="img/login.png" width="35" height="35"/></td>
	</tr>
	
	</table>
	<img id="mobile_menu" src="img/menu.png" height="50px" width="50px">
	<div class="menu_div_mobile" id="menu_div"><ul id="accordion" class="accordion">
  <li>
    <div class="link" onclick="window.location = 'index.php';">Главная</div>
  </li>
  <li>
    <div class="link" onclick="window.location = 'services.php';">Услуги</div>
  </li>
  <li>
    <div class="link" onclick="window.location = 'reviews.php';">Отзывы</div>
   
  </li>
  <li>
    <div class="link" >О нас<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
	<li><a href="about.php">О нас</a></li>
      <li><a href="contacts.php">Контакты</a></li>
      <li><a href="map.php">Проезд</a></li>
    </ul>
  </li>
  
</ul>
<div class="link" id="mobile_btn" onclick="window.location = '/user/index.php';">Авторизация</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
var menu_butt = document.getElementById("mobile_menu");
var menu = document.getElementById("menu_div");
menu_butt.onclick = function(){
	if(menu_butt.src.indexOf('img/close.png')>0){
	menu.style.display = 'none';
	menu_butt.src = 'img/menu.png';
	}else if(menu_butt.src.indexOf('img/menu.png')>0){
		menu.style.display = 'block';
	menu_butt.src = 'img/close.png';
	}

}
</script>
</header>
