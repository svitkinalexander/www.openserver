<?php
	session_start();
	include('../connect.php');
	$what = $_POST['action'];
	if($what=="reg"){
		//
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$result = mysqli_query($link, "SELECT `password` FROM `users` WHERE `email`='$email'"); 
		if(mysqli_fetch_assoc($result)){
		
			header ('Location: index.php?error=user_contain');  
			exit();
		}
		else {
			$result = mysqli_query($link, "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
			mail($email,'Cпасибо за регистрацию, $name!','\nВаш логин: $email\nВаш пароль: $password\nТак же мы вам дарим лицензию на использование нашего ПО.\nВаш код активации: 446-039-505');
			$_SESSION['email_user_gaika'] = $email;
			$_SESSION['pass_user_gaika'] = $password;
				header ('Location: panel.php');
				exit();
		
		}			
			
		
	}
	else if($what=="log"){
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		$result = mysqli_query($link, "SELECT `name` FROM `users` WHERE `email`='$email' AND `password`='$password'"); 
		if($email == "admin" && $password == "admin"){
			session_start();
			$_SESSION['panel_admin.login']= $email;
			$_SESSION['panel_admin.password']= $password;
			header ('Location: ../panel/panel.php');  
			exit();
		}
		if(mysqli_fetch_assoc($result)){
				$_SESSION['email_user_gaika'] = $email;
				$_SESSION['pass_user_gaika'] = $password;
				header ('Location: panel.php');
				exit();
		}else {
			header ('Location: index.php?error=invalid');
			exit();
		}
		
			
	}
	else if($_GET['action']=="exit"){
		unset($_SESSION['email_user_gaika']);
				unset($_SESSION['pass_user_gaika']);
				header ('Location: index.php');
				exit();
	}
	else if($_GET['action']=="cancel_request"){
			$user = $_GET['email'];
			$id = $_GET['id'];
			$query = "DELETE FROM `request` WHERE `id` = '$id' AND `user`='$user'";
			$result = mysqli_query($link, $query);
			header ('Location: panel.php');
			exit();
			}
?>