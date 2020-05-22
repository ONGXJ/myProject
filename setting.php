<?php
include("config.php");
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Define variables and initialize with empty values


$username = $_SESSION['username'];
$id = $_SESSION['id'];
if(isset($_POST['Edit'])){

   $contact = $_POST['contact'];
   $NEmail = $_POST['NEmail'];
   
      $sql = "UPDATE `customer_detail` SET `phoneNo` = '$contact', `email` = '$NEmail' WHERE `customer_detail`.`ID` = $id;";
      $result = $conn -> query($sql);
      }



?>
<!DOCTYPE html>
<html>
<head>
  <title>Booking Record</title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
<script>
  function EditSuccess(){
    return confirm("Edit Success!");
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
  .footer{
    position: fixed;
    bottom: 0;

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

</nav>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<br>
<h2  class="display-4" style="text-align:center">Account Setting</h2>
<div class="col-md-10">
      

<div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action list-group-item-dark active" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Personal Details</a>
        
      </div>
    </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <?php
              $sql="SELECT * from customer_detail where ID='$id'";
              $result=$conn->query($sql); //run SQL
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $username = $row['username'];
                    $password=$row['password'];
                    $phoneNo=$row['phoneNo'];
                    $email=$row['email'];

            ?>
                    <table>
                      <thead>
                        <tr>
                          <th scope="row">Name</th> 
                          <td><input type="text" value="<?php echo $username;?>" disabled></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Contact</th> 
                          <td><input type="text" name="contact" value="<?php echo $phoneNo?>"></td> 
                          
                        </tr>
                        <tr>
                          <th scope="row">Email</th> 
                          <td><input type="text" name="NEmail" value="<?php echo $email;?>"></td> 
                          
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                          <td></td> 
                          <td><input type="submit" class="btn btn-dark" name="Edit" value="Edit" onclick="EditSuccess()"></td>
                        </tr>
                      </thead>
                    </table>

            <?php
                }
              }
            ?>
        </div>
      </div>
    </div>
    </form>
      
  

          
</div>

</div>  


<br><br>
<div class="container-fluid footer">
            <div class="copyright text-center">
              &copy; Copyright <strong>Cleaning Company</strong>. All Rights Reserved
            </div>
            <div class="credits text-center">
              Designed by <a href="https://ABC.com/">Cleaning Company</a>
            </div>
    </div>
</body>
</html>