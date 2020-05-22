<?php
include("config.php");
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$username = $_SESSION['username'];
$id = $_SESSION['id'];

if(isset($_POST['cancel'])){
    // $recordID = $_POST['recordID'];
    // $sql = "DELETE FROM bookingservice where ID = $recordID";
    //   $result = $conn -> query($sql);
      if(empty($_REQUEST['recordID'])){
         }else{
          foreach ($_REQUEST['recordID'] as $recordID){
            $sql = "DELETE FROM bookingservice where ID = $recordID";
            $result = $conn ->query($sql);
          }
         }
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
  function BookSuccess(){
    return confirm("Booking Success!");
  }
  function check(){
    return confirm("Success cancel the booking.");
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
  .list{
    
  }
  .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #e1e8e3;
   color: black;
   text-align: right;
  }
</style>
<body>

<nav class="nav p-2 bg-dark">
  <a class="nav-link active text-white" href="index.php">Home</a>
  <a class="nav-link text-white" href="service.php">Service</a>
  <a class="nav-link text-white" href="#">Support</a>
  <a class="nav-link text-white" href="#">FAQ</a>
  <a class="nav-link text-white" onclick="btmFunction()" style="cursor:pointer">About</a>
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

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<br>
<h2  class="display-4" style="text-align:center">Booking List</h2>
<div class="col-md-10">
  <?php
            $sql="SELECT b.BookingID,b.serviceName,b.image,b.price,a.dateAdd,a.location,a.ID as recordID from bookingservice as a left join servicepackage as b on a.serviceID=b.BookingID where a.customerID='$username'";
            $result=$conn->query($sql); //run SQL
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $recordID = $row['recordID'];
                  $BookingID=$row['BookingID'];
                  $serviceName=$row['serviceName'];
                  $image=$row['image'];
                  $price=$row['price'];
                  $dateAdd=$row['dateAdd'];
                  $location=$row['location'];


              
                           
    ?>
<tr>
  <td>
    <div class="row list" style="margin:5% 10% 2% 30%" >
        <div class="col-md-1">
          
          <?php
            echo '<input type="checkbox" name="recordID[]" value= "'.$recordID.'" />';                        
          ?> 
          
        </div>

        <div class="col-md-4">
          <img src="admin/image/<?php echo $image; ?>" class="img-fluid" />
        </div>

        <div class="col-md-5">
            <h5><?php echo $serviceName; ?></h5>
            <br><b>Date:</b> <?php echo $dateAdd; ?>
            <br><b>Location:</b> <?php echo $location; ?>
        </div>

        <div class="col-md-2">
            RM <?php echo $price; ?> 
        </div>

    </div>

  </td>

</tr>
          <?php
              }
            }
          ?>

          <div style="float: right;">
            <label>RM</label>
            <input type="number" name="price" id="price" class="form-control"><br>
            <div id="paypal-button"></div>
            <input type="submit" name="cancel" value="Cancel Booking Service" class="btn btn-md btn-success">
          </div>

        

</div>
</form>
    

<br><br><br><br><br><br><br><br><br><br><br><br>

<div class="footer">
  <div class="copyright text-center">
    &copy; Copyright <strong>Cleaning Company</strong>. All Rights Reserved
  </div>
  <div class="credits text-center">
    Designed by <a href="https://ABC.com/">Cleaning Company</a>
  </div>
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'medium',
      color: 'white',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
        var data = document.getElementById('price').value;
      return actions.payment.create({
        transactions: [{
          amount: {
            total: data,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
        <?php
          if(empty($_REQUEST['recordID'])){

          }else{
          foreach ($_REQUEST['recordID'] as $recordID){
            
            $sql = "UPDATE `bookingservice` SET payment = 'Paid' WHERE ID = $recordID";
            $result = $conn -> query($sql);

          }
        }
        ?>
      });
    }
  }, '#paypal-button');

</script>
</body>
</html>