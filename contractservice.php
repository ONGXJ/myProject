<?php
include("config.php");
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$username = $_SESSION['username'];
$search = "";


 $sql="SELECT b.BookingID,b.serviceName,a.ServiceID,b.contract from bookingservice as a left join servicepackage as b on a.ServiceID = b.BookingID where a.customerID ='$username' and b.contract='yes' ";
            $result=$conn->query($sql); //run SQL
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $BookingID=$row['BookingID'];
                  $serviceName=$row['serviceName'];
                }
              }


 if(isset($_POST['bookingcontract'])){
    $username = $_POST['username'];
    $dateAdd = $_POST['dateAdd'];
    $dateEnd = $_POST['dateEnd'];
    $location = $_POST['location'];
    $servicetime = $_POST['servicetime'];

      if(empty($_REQUEST['item'])){
         }else{
          foreach ($_REQUEST['item'] as $ServiceID){
            $sql = "INSERT into bookingservice(ServiceID,dateAdd,dateEnd,customerID,location,servicetime) values ('$ServiceID','$dateAdd','$dateEnd','$username','$location','$servicetime')";
            $result = $conn ->query($sql);
          }
         }
      
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Booking Service</title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
<script>
  function BookSuccess(){
    var x = document.forms["myForm"]["dateAdd"]["dateEnd"].value;
    if(x == ""){
      alert("Please select the date!");
      return false;
    }else{
      return confirm("Booking Successful!");
    }

   
  }
</script>
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
  .custom{
    width: 160px!important;
    margin-left: 83%;
  }
  
  .personal{
    margin: 0 5% 0 1%;

  }
</style>
<body>

<nav class="nav p-2 bg-dark">
  <a class="nav-link active text-white" href="index.php">Home</a>
  <a class="nav-link text-white" href="service.php">Service</a>

  <a class="nav-link text-white" href="index.php#About">About</a>
<script>
  function btmFunction() {
    document.body.scrollTop = 1040;
    document.documentElement.scrollTop = 1040;
  }
</script>


<?php 
  if(isset($_SESSION['username'])){
    echo "<button class='btn btn-sm btn-danger personal' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><a class = 'nav-link text-white' href = '#'>".$_SESSION['username']."</a></button>";
          $username = $_SESSION['username'];
    
  }
  else{
      echo '<a class="nav-link text-white" href="register.php">  <i class="fa fa-fw fa-user"></i>Register</a>';
      echo '<a class = "nav-link text-white" href = "login.php">Login</a>';
  }
?>


<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="setting.php">Account Setting</a>
  <a class="dropdown-item" href="reset.php?username=<?php echo $username; ?>" name="username">Change Password</a>
  <a class="dropdown-item" href="bookingRecord.php">Book Record</a>
  <a class="dropdown-item" href="logout.php">Logout</a>
</div>


<form class="form-inline" action="service.php" method="post">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary my-2 my-sm-0 " type="submit" style="">Search</button>
</form>
      


</nav>


  <form method="post" action="contractservice.php" name="myForm">
  
  <div class="col-md-10" style="margin-left: 10%">
     <div class="card">
       <br>
     <h2  class="display-4" style="text-align:center">Booking Service</h2>
     <br>
     <ul class="nav">
  
  <li class="nav-item">
    <a class="nav-link" href="service.php">Services</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="contractservice.php">Contract Services</a>
  </li>
  </ul>
        <div class="row">
          <?php   

      // get search keyword
          $search = "";
          if(isset($_REQUEST['search'])){
            $search =" and serviceName like '%" .$_REQUEST['search']."%'";
          }

          if(isset($_POST["search"])){
            $search = $_POST["search"];
          
          }
         $sql="SELECT image,BookingID,serviceName,price,ServiceDetails,unit,GROUP_CONCAT(Detail SEPARATOR '<br>') as Details from servicepackage as a left join service_detail as b on a.ServiceDetails=b.DetailID where a.contract = 'yes' group by BookingID";
          $result = $conn -> query($sql);
          if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
              $BookingID = $row['BookingID'];
              $serviceName=$row['serviceName'];
              $image=$row['image'];
              $price=$row['price'];
                   
          ?>
      <div class="col-sm-4">
        <div class="card col-sm d-flex">
          <div class="card-body flex-fill">
            <input type="checkbox" name="item[]" value="<?php echo $row["BookingID"] ?>">
            <h5 class="card-title"><?php echo $serviceName;?></h5>
            <img src="admin/image/<?php echo $image; ?>" alt="" class="img-fluid" style="height: 100px;">
            <div class="card-heading">RM<?php echo $price; ?>
            
             
            </div>
            <a href="" data-toggle="modal" data-target="#Service_Detail<?php echo $row["BookingID"]?>" class="btn btn-success">View Details</a>
          </div>
        </div>
      </div>

<div class="modal fade bd-example-modal-lg" id="Service_Detail<?php echo $row["BookingID"]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $row['serviceName']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul>
            <li>Price for <b><?php echo $row['unit']; ?></b> in <?php echo $row['serviceName']; ?> : <?php echo $row['price']; ?></li>
            <?php echo $row['Details'] ?>

          </ul>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>

        <?php
            }
          }
        ?>
          </div>
<br>
<br>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <b>Location:*</b><br><textarea name="location" rows="3" cols="50" required></textarea>
                </div>

           </div>
<br>
            <div class="row">
                <br>
                <div class="col-md-3">
                <b>Date:*</b><input type="date" name="dateAdd" required>
                </div>
                <br>
                <div class="col-md-3">
                    <b>Date:*</b><input type="date" name="dateEnd" required>
                    </div>
            </div>
            <br>
                <div class="row">
                <div class="col-md-3">
                <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Service Time</label>
          <select class="custom-select" id="inputGroupSelect01" name="servicetime" id="servicetime">
            <option selected>Choose...</option>
            <option value="930-1130">Monday - Friday</option>
            <option value="1230-230">Monday , Wednesday , Friday</option>
            <option value="1230-230">Tuesday , Thursday</option>
            <option value="1230-230">Every Monday</option>
            <option value="1230-230">Every Tuesday</option>
            <option value="1230-230">Every Wednesday</option>
            <option value="1230-230">Every Thursday</option>
            <option value="330-530">Every Friday</option>
          </select>
          </div>       
           </div>

        </div>   
              
              
          </div>
<br><br>
          <input type="hidden" name="username" value="<?php echo $username; ?>">
          <input type="submit" name="bookingcontract" value="Book" onclick="BookSuccess()" class="btn btn-success custom">
          <br>
    </div>
    
  </div>

  
</form>
    

<br><br>
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