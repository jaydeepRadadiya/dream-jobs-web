<?php
session_start();
if(!isset($_SESSION['email_id']))
{
	header('Location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body background="back.jpg">

<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="Home.php">Home</a></li>
       
        <li><a href="Exam_Generation.php">Exam Generation</a></li>
        <li class="active" ><a href="Add_Student.php">Add Student</a></li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Conduct Exam<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Online</a></li>
            <li><a href="#">Offline</a></li>
            
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="Details.php"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $_SESSION['name']; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container" style="margin:100px;">
 <?php
 
 $connect=mysqli_connect('localhost','root','','internship');
	   // $record=mysqli_query( $connect,"SELECT exam_id,exam_name FROM exam where email_id='$_SESSION[email_id]' ");
	echo '<p>hiii'.$_POST['add'].'<p>';
 ?>
</div>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
       <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="#">About us</a></li>
      <li><a href="#">Contact us</a></li>
      <li><a href="#">FAQ</a></li>
      <li><a href="#">Feedback</a></li>
    </ul>
  </div>
</nav>
</body>
</html>
