<?php
include("config.php");
session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Cleaning Management System</title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	.description{
		background-color: lightgreen;
		width: 100%;
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
  #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
<body>

<nav class="nav p-2 bg-dark">
  <a class="nav-link active text-white" href="index.php">Home</a>
  <a class="nav-link text-white" href="service.php">Service</a>
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

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>
  var topButton = document.getElementById("myBtn");
  window.onscroll = function() {
    scrollFunction()
  };

  function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    topButton.style.display = "block";
  } else {
    topButton.style.display = "none";
  }
}

  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }

</script>
<div class="container">
<div class="row">


        <div class="col-md-12">

            <section class="jumbotron text-center" style="color: green">
                <div class="container">
                  <br>
                  <br>
                  <h1 class="jumbotron-heading">Bersih Cleaning Service </h1>
                  <p class="lead text-muted">We provide high quality housekeeping and cleaning in Johor Bahru!</p>
                  
                </div>
              </section>
<!-- Design UI -->
<br>

        <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
            <div class="how-section1">
                <div class="row">
                    <div class="col-md-6 how-img">
                        <img src="images/main2.jpg" class="rounded-circle img-fluid" width="300" height="300" alt=""/>
                    </div>
                    <div class="col-md-6">
                        <h4>Our local house cleaning</h4>
                    <p class="text-muted">At Bersih, our team of local maids will work with you to make a 
                      cleaning plan that accommodates your extraordinary needs. 
                      We offer a wide exhibit of maid services, house cleaning arrangements and costs. 
                      Regardless of how huge or little the activity, our cleaners can make the ideal housekeeping plan for your house or office. 
                    Our panel of professional cleaning maid team provides a 5-star house cleaning service.</p>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h4>What we specialize in?</h4>
                                    <p class="text-muted">We clean everything and places that you need us to clean. We cleans contract office, factory cleaning,
                                       and commercial building. Carpet and upholstery cleaning and shampooing. All types of floor cleaning and polishing.
                                    </p>
                    </div>
                    <div class="col-md-6 how-img">
                        <img src="images/main3.jpg" class="rounded-circle img-fluid"  width="304" height="236" alt=""/>
                    </div>
                </div>
                <br>
             
            </div>
            </div>
        <div class="col-md-2"></div>

            
        </div>
            


     
     
      </div>

      </div>
    </div>


<br>
<div class="container">
    <h2 style="text-align: center">Our Services</h2>
    <br>
    
    <div class="card-deck mb-3 text-center">
        
            <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                      <h3 class="my-0 font-weight-normal" id="#rcleaning">Residential Cleaning</h3>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title pricing-card-title">Basic home cleaning</h4>
                      <ul class="list-unstyled mt-3 mb-4" id="rcleaning">
                        <li>We don't ever clean around your personal belongings. We carefully move the items, clean them and put back them properly.</li>
                        <br>
                      </ul>
                      <button type="button" class="btn btn-lg btn-block btn-outline-success" data-toggle="modal" data-target="#rc">Job scope</button>
                    </div>
                  </div>
            
                  <div class="modal fade" id="rc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Residential Cleaning</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                    <ul class="list-unstyled mt-3 mb-4">
                                            <li>
                                                  Ceiling fans</li>
                                                <li>
                                                    Toilets</li>
                                                <li>
                                                    Ceiling fans</li>
                                                <li>
                                                    Vacuum carpets</li>
                                                <li>
                                                    Wash all floors</li>
                                                <li>
                                                     Vacuum furniture</li>
                                                <li>
                                                    Empty and clean wastebaskets</li>
                                                <li>
                                                    Window ledges and top</li>
                                                <li>
                                    </ul>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                              <h3 class="my-0 font-weight-normal">Office Cleaning</h3>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title pricing-card-title">Business cleaning</h4>
                              <ul class="list-unstyled mt-3 mb-4" id="ocleaning">
                                <li>Your customers, tenants and employees deserve only the best environment when they visit your office.</li>
                              </ul>
                              <br>
                              <button type="button" class="btn btn-lg btn-block btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">Job scope</button>
                            </div>
                          </div>
                    
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Office Cleaning</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <ul class="list-unstyled mt-3 mb-4">
                                                    <li>Vacuum carpets</li>
                                                    <li>Window ledges and top</li>
                                                    <li>Wash Toilets</li>
                                                    <li>Wash Floor</li>
                                                    <li>Vacuum furniture</li>
                                                    <li>Empty and clean dustbin</li>
                                                    <li>Clean mirrors</li>
                                            </ul>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="card mb-4 shadow-sm">
                                    <div class="card-header">
                                      <h3 class="my-0 font-weight-normal" id="#pcleaning">Project Cleaning</h3>
                                    </div>
                                    <div class="card-body">
                                      <h4 class="card-title pricing-card-title">Basic project cleaning</h4>
                                      <ul class="list-unstyled mt-3 mb-4" id="pcleaning">
                                        <li>We are also offering project cleaning to meet your individual requirements,our  project cleaning including show rooms, factory cleaning and workshops cleaning.</li>
                                      </ul>
                                      <button type="button" class="btn btn-lg btn-block btn-outline-success" data-toggle="modal" data-target="#pc">Job scope</button>
                                    </div>
                                  </div>
                            
                                  <div class="modal fade" id="pc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Project Cleaning</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                            <li> Furniture Cleaning</li>
                                                            <li> Odor Control</li>
                                                            <li> Wall Cleaning</li>
                                                            <li> Stain Removal Solutions</li>
                                                            <li> Resilient Floor Maintenance</li>
                                                            <li> Carpet Cleaning and Extraction</li>
                                                    </ul>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>



  
          
    </div>

<div class="container-fluid">
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row" id="About">
               
                  <div class="col-4 col-md">
                    <h5>Contact us</h5>
                    <ul class="list-unstyled text-small">
                      <li>Xiong Jie  <a class="text-muted" href="#">123456789</a></li>
                      <li>Jie Kang  <a class="text-muted" href="#">123456789</a></li>
                      <li>Kai Zhi  <a class="text-muted" href="#">123456789</a></li>
                    </ul>
                  </div>
                  <div class="col-4 col-md">
                    <h5>About us</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Team</a></li>
                      <li><a class="text-muted" href="#">Locations</a></li>
                      <li><a class="text-muted" href="#">Privacy</a></li>
                      <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                  </div>
                </div>
              </footer>
    </div>
    </div>

    <div class="container-fluid">
        <div class="copyright text-center">
          &copy; Copyright <strong>Cleaning Company</strong>. All Rights Reserved
        </div>
        <div class="credits text-center">
          Designed by <a href="https://ABC.com/">Cleaning Company</a>
        </div>
    </div>
</div>

   
</body>
</html>