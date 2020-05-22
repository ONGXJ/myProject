<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}

// Include config file
require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty(trim($_POST["username"]))){
		$username_err = "Please enter username.";
	}else{
		$username = trim($_POST["username"]);
	}

	if(empty(trim($_POST["password"]))){
		$username_err = "Please enter password";
	}else{
		$password = trim($_POST["password"]);
	}

	if(empty($username_err) && empty($password_err)){
		$sql = "SELECT id, username, password, approveRequest FROM customer_detail WHERE username = ? AND approveRequest = '1'";

		if($stmt = mysqli_prepare($conn, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $param_username);

			// Set parameters
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$approveRequest);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to index page
                            header("location: index.php");
                        }else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
					}
				}else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  
  background-image: url("login.webp");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

	.login-form {
		width: 340px;
    	margin: -600px auto;
	}
    .login-form form {
    	margin-bottom: 30px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 50px;
    }
    .login-form h2 {
        margin: 0 0 50px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
		<div class="bg"></div>
		<div class="login-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<h2 class="text-center">Customer Log in</h2>
			
				<div class="form-group">
			<div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
				<input type="text" class="form-control" name="username" placeholder="Username" required="">
				<?php echo $username_err; ?>
			</div>
		</div>
			
		<div class="form-group">
			<div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
				<p><input type="password" class="form-control" name="password" placeholder="Password" required=""></p>
				<?php echo $password_err; ?>
			</div>
			</div>

			<div class="clearfix">
			<button type="submit" class="btn btn-primary btn-block">Login</button>
            <br>
            <p><a href="register.php">Create an account</a></p>
            <p><a href="index.php">Main page</a></p>
			</div>
		</form>
	</div>
	


</body>
</html>