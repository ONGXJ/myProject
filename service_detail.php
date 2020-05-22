<?php
include("config.php");
session_start();
$ID = "C1";
if(isset($_GET['ID'])){
	$ID = " and ID = '".$_GET['ID']."'";
}

$sql = "SELECT ID,title,description,image,price from service_detail";

$result=$conn->query($sql); //run SQL

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $ID=$row['ID'];
      $title=$row['title'];
      $description=$row['description'];
      $image=$row['image'];
      $price=$row['price'];
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Service Detail</title>
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="nav p-2 bg-dark">
  <a class="nav-link active text-white" href="index.php">Home</a>
  <a class="nav-link text-white" href="service.php">Service</a>
  <a class="nav-link text-white" href="#">Support</a>
  <a class="nav-link text-white" href="#">FAQ</a>
  <a class="nav-link text-white" href="#">About</a>
  

  <?php
  	$user = "";
  	if(isset($_GET['u'])){
                    if($_GET['u']=='logout'){
                    session_destroy(); //clear $user value
                    echo "<script>window.location.assign('index.html');</script>";
                    }
                }
                                   

            if(isset($_SESSION['user'])){
                        echo "<a class = 'nav-link text-white' href = '#'>".$_SESSION['user']."</a>";
                        $user = $_SESSION['user'];
                    }
 	 if($user ==""){
                      echo '<a class="nav-link text-white" href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>';
                    }
                    else{
                        echo '<a class = "nav-link text-white" href = "product_detail.php?u=logout">Logout</a>';
                    }

  ?>
</nav>

<div class="container-fluid">
	<form method="post" action="service_detail.php?ID=<?php echo $_GET['ID']?>">
		<div class="col-md-8" style="text-align: center;">
			<div class="card">
				<div class="row">

					<div class="col-sm-6">
						<img src="images/<?php echo $image; ?>" alt="" class="img-fluid">

					</div>
					<div class="col-sm-6">
						<div class="card border-0">
							<div class="card-body">
								<h5 class="card-title"><?php echo $title;?></h5><br>
								<div style="height: 100px"><?php echo $description;?></div><br/>
								<div style="height: 100px">RM <?php echo $price; ?><button style="float: right;" class="btn btn-danger btn-xs">Book</button>
									
								</div><br/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</form>
</div>


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