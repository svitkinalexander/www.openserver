<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Услуги</title>
<link rel="shortcut icon" href="img/gaika_nizkaja_nerzh-ico.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
<link href="css/table.css" rel="stylesheet">
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
	.simple-little-table{
		margin-left:10%;
		width:80%;
	
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
  <div class="panel-body">
      <center><h2><b><span style="color:#FF8F00">Услуги</span> нашей СТО</b></h2></center>
      <br>
      <br>
      <table class="simple-little-table table">
          <tr><td><b>Вид услуги</b></td>
              <td><b>Срок выполнения</b></td>
              <td><b>Стоимость(в рублях)</b></td></tr>

           <?php
      
          $connect = mysqli_connect('127.0.0.1', 'root', '', 'comment');
          $result = mysqli_query($connect, "SELECT * FROM `services`"); 
		  
          while ( ($row = mysqli_fetch_assoc($result)) ) {
            $type = $row['type'];
            $deadline = $row['deadline'];
              $price = $row['price'];
            echo "<tr><td>$type</td><td>$deadline</td><td>$price</td></tr>";
          }
        ?>   
</table>   
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