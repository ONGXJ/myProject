<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
include "config.php";

$input = filter_input_array(INPUT_POST);

// Define variables and initialize with empty values
$new_password = $confirm_password = $old_password = "";
$new_password_err = $confirm_password_err = $old_password_error = "";

$sql = "SELECT * FROM customer_detail where username = '".$_REQUEST['username']."'";
$result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $password = $row['password'];
            $phoneNo = $row['phoneNo'];
            $ic = $row['ic'];
            $email = $row['email'];
            
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validate old password
            $hash = $password;
                
                        if(empty(trim($_POST["old_password"]))){
                            $old_password_error = "Please insert your old password.";
                        } else{
                            $old_password = trim($_POST["old_password"]);
                            
                             
                            if(empty($old_password_error)&&(!password_verify($old_password, $hash))){
                                $old_password_error = "Password did not match.";
                            }
                            
                        }

                
            

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Confirm password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err) && empty($old_password_error)){
        // Prepare an update statement
        $sql = "UPDATE customer_detail SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
     mysqli_close($conn);
}
?>
<?php
//getting id from url
 $username = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
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

    <div class="container-fluid">
        <div class="row">
           
            <div class="col-md-4"></div>
            <div class="wrapper">
                <h2 class="display-6" style="text-align:center">Reset Password</h2>
                <p>Please fill out this form to reset your password.</p>
                <form action="<?php $_PHP_SELF ?>" method="post"> 
                    
                    <div class="form-group <?php echo (!empty($old_password_error)) ? 'has-error' : ''; ?>">
                        <label>Old Password</label>
                        <input type="password" name="old_password" class="form-control" value="<?php echo $old_password; ?>">
                        <span class="help-block"><?php echo $old_password_error; ?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                        <span class="help-block"><?php echo $new_password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit">
                        <a class="btn btn-link" href="index.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>