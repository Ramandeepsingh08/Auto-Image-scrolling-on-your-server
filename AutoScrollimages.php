<!DOCTYPE html>
<html lang="en">
<head>
  <title>web server</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "t@ndon";
	$dbname = "db_sky";
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql= " select * from planet " ; 
$result = $conn->query($sql); 
?>

<body>

<div class="container">
  <h2>Welcome to sweet world</h2>
  Date:
  <?php
	echo Date('D M Y' ) ;
  ?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      
      <div class="item active">
        <img src="ocean.jpg" alt="ocean" style="width:100%;height:400px;">
        <div class="carousel-caption">
          <p>Great view of nature</p>
        </div>
      </div>

       <?php
 
	  $dir = "images";
	  // Sort in ascending order - this is default
	  $a = scandir($dir);
	  //print_r($a);
	  foreach ($a as $value) {
	    if 	(($value <> ".") && ($value <> "..")  ) {
	      //echo "$value <br>";
	      //echo "<img src=/$value>";
	?>      
	      
      <div class="item">
        <img src="images/<?php echo "$value"; ?>" alt="New York" style="width:100%;height:400px;">
        <div class="carousel-caption">
    <?php
	$row = $result->fetch_assoc() ;
	?>
          <h3><?php echo $row["NAME"] ; ?> </h3>
		  <h3><?php echo $row["rollno"] ; ?> </h3>
          <p>We love to serve humanity!</p>
		  
        </div>
      </div>
	      
	  <?php 
	    } // if ends   
	  }// foreach ends 
	  ?>

    
      
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Next</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Previous</span>
    </a>
  </div>
</div>




</body>
</html>