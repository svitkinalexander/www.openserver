<?php
		if($_POST["action"]=="add_services"){
	
				include('../connect.php');
				$type = $_POST["name"];
				$deadline = $_POST["deadline"];
				$price = $_POST["price"];
				$query = "INSERT INTO `services` (`type`,`deadline`,`price`,`empty`) VALUES ('$type','$deadline','$price',1)"; 
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