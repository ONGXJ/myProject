<?php
include("config.php");
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cleaning Service UI</title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Include CSS files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/calendar.css">
<link rel="stylesheet" href="assets/css/calendar_full.css">
<link rel="stylesheet" href="assets/css/calendar_compact.css">

<!-- Include Language file -->
<script src="assets/languages/lang.js"></script>

<!-- Include JS files -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/calendar.js"></script>

<style>
	.description{
		background-color: lightgreen;
		width: 100%;
	}
  table{
    width: 80%;
    margin-left: 10%;
  }
  .title{
    text-align: center;
  }
</style>
<body>

<nav class="nav p-2 bg-dark">
  <a class="nav-link active text-white" href="index.php">Home</a>
  <a class="nav-link text-white" href="service.php">Service</a>
  <a class="nav-link text-white" href="#">Support</a>
  <a class="nav-link text-white" href="#">FAQ</a>
  <a class="nav-link text-white" href="#">About</a>
<form class="form-inline" action="service.php" method="post">
<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
<button class="btn btn-primary my-2 my-sm-0 " type="submit">Search</button>
</form>

   <a class="nav-link text-white" href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
  <a href="logout.php" class="btn btn-danger">Sign Out</a>
</nav>

<table>
  
</table>


<div class="container-fluid">
            <div class="copyright text-center">
              &copy; Copyright <strong>Cleaning Company</strong>. All Rights Reserved
            </div>
            <div class="credits text-center">
              Designed by <a href="https://ABC.com/">Cleaning Company</a>
            </div>
    </div>
</body>
</html>