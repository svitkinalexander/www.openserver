<?php
  $name = $_POST["name"];
  $text_comment = $_POST["text_comment"];
  $name = htmlspecialchars($name);
  $text_comment = htmlspecialchars($text_comment);
  $mysqli = mysqli_connect("127.0.0.1", "root", "", "comment");
  mysqli_query($mysqli,"INSERT INTO `comment` (`name`, `text_comment`) VALUES ('$name', '$text_comment')");
  header("Location: ".$_SERVER["HTTP_REFERER"]);
?>