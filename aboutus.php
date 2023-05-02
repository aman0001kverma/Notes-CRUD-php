<?php 
$servername="localhost";
$username="root";
$password="";
$database="notesdb";
$insert=false;
  $conn=mysqli_connect($servername,$username,$password,$database);
  if(!$conn)
  {
    die("Database not found". mysqli_connect_error());
  }

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $title=$_POST["title"];
    $desc=$_POST["description"];
    $sql="INSERT INTO `notes` (`title`, `description`, `Timestamp`) VALUES ('$title', '$desc', current_timestamp());";
    $result=mysqli_query($conn, $sql);
    if($result)
    {
      $insert=true;
    }
    else{
      echo "not inserted";

    }
  }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" class="css">
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <title>BeMyNotes-AboutUs</title>
  </head>
  <body>
    

<!-- naivagation bar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php"> <img src="logo1.png" width=40px alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
          
        </li>
          <li class="nav-item active">
            <a class="nav-link" href="aboutus.php">About Us</a>
            
          </li>
     
        
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
<div class="container">
  <header class="text-center">
		<h1 >About Us</h1>
	</header>
	<main>
		<section>
			<h2>Who We Are</h2>
			<p>We are a team of passionate note-takers who believe that taking notes should be an easy and enjoyable experience. We created Note Maker to help people organize their thoughts and ideas in a simple and efficient way.</p>
		</section>
		<section>
			<h2>Our Mission</h2>
			<p>Our mission is to empower people to take better notes and improve their productivity. We believe that everyone should have access to a powerful note-taking tool that helps them stay organized and focused.</p>
		</section>
		<section>
			<h2>Our Team</h2>
			<ul>
				<li>Aman Kumar Verma - Designer</li>
				<li>Aman Kumar Verma - Developer
                </li>
			</ul>
		</section>
		<section class="text-center">
			<h2>Contact Us</h2>
			<p>If you have any questions or feedback about Be My Notes, please don't hesitate to contact us. You can reach us by email at <a href="mailto:kumarvermaaman0001.com">info@bemynotes.com</a>, or by phone at +91-7084195433.</p>
		</section>
	</main>
	<footer >
		<p class="text-center fixed-bottom">&copy; 2023 Be My Notes. All rights reserved.</p>
	</footer>
 

  




    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
  
  
  
  </body>


  
 

</html>