<?php
session_start();
		if($_POST["action"]=="new_request"){
	
				include('../connect.php');
				$type = $_POST["serv"];
				$num = $_POST["number"];
				
				$info = $_POST["other_info"];
				$name = $_SESSION['email_user_gaika'];
				$query = "INSERT INTO `request` (`id`,`user`,`car_id`,`good`,`state`,`other_info`) VALUES (NULL,'$name','$num','$type','0','$info')"; 
				$result = mysqli_query($link, $query);
				
		}
		else if($_GET["action"]=="delete_service"){
			include('../connect.php');
			$type = $_GET["name"];
			$deadline = $_GET["deadline"];
			$price = $_GET["price"];
			$query = "DELETE FROM `services` WHERE `type`='$type' AND `deadline` = '$deadline' AND `price` = '$price'";
			$result = mysqli_query($link, $query);
		}
		else if($_GET["action"]=="delete_comment"){
			include('../connect.php');
				$name = $_GET["name"];
				$text_n = $_GET["text"];
				$query = "DELETE FROM `comment` WHERE `name` = '$name' AND `text_comment` = '$text_n'"; 
				$result = mysqli_query($link, $query);
		
		
		}
		
?>
<script type="text/jscript">
self.history.go(-1);
</script>