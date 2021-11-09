<!DOCTYPE html>
<html>
  <head>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Отзывы</title>
<link rel="shortcut icon" href="img/gaika_nizkaja_nerzh-ico.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
       <link href="css/style.css" rel="stylesheet"  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
	body{
		margin:0;
	}
	header{
		width:100%;
		position:fixed;
		z-index:999;
		margin-top:0px;
	}
	.carousel slide{
	margin-top:71px;
	}
	.container-fluid{
		padding:0;
	}
	.row{
		margin:0;
	}
	.col-md-8{
		min-height: none;
		width:100%;
		padding:0;
	}
	.collapse navbar-collapse{
		float:right;
	}
	#ipad{
		float:right;
	}
	#md_10{
		width:100%;
	}
	#carousel-example-generic{
	margin-top:80px;
	}
	.panel{
	width:90%;
	margin-left:5%;
	border:none;
	margin-top:80px;
	}
	textarea{
		resize: none;
	}
	</style> 
  </head>
    
    <body>
      <div class="container-fluid">
          <div class="row">
                  <div class='col-md-2'></div>
                          <div class="col-md-8">
                                          <?php
    include('header.php');
 ?>  
         
                <div class="panel panel-default">
                      <div class="panel-body" >
					<h2>Отзывы о нашем СТО</h2>					  
               
                <div style="width: 100%; height: 250px;" >
          				  <form name="comment" action="comment.php" method="post">
          				  
          				      <div class="col-md-4 col-sm-12"> 
          				  <label>Имя:</label>
          				          <br>
          				  <input type="text" name="name" class="form-control" placeholder="Введите ваше имя" rows=10 cols=9/>
          				  
          				  <label>Комментарий:</label>
          				  <br>
          				  <textarea class="form-control" name="text_comment" placeholder="Ваш отзыв" rows=5 cols=5></textarea>

          				  <input type="submit" value="Отправить" class="btn btn-success" style="background-color: #FF8F00; margin-top: 10px;" />
          				      </div>
          				  </form>
            </div>
                    Коментарии:
                  <?php
                
                    $connect = mysqli_connect('127.0.0.1', 'root', '', 'comment');
                    $result = mysqli_query($connect, "SELECT * FROM `comment`"); 
                    while ( ($row = mysqli_fetch_assoc($result)) ) {
                      echo "<br>";
                      $comment_name = $row['name'];
                      $comment = $row['text_comment'];

                      echo "<div class = 'well'>$comment_name : <br> $comment</div>";
                    }
                    ?> 
</div>
                  </div>
       </div> 
                  <div clas= 'col-md-2'></div>
    </div>
</div>

<?
include('footer.php');
?>
     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    
  </body>
</html>