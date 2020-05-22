<?php
// Include config file
require_once "config.php";
 session_start();

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $phoneNo = $ic = "";
$username_err = $password_err = $confirm_password_err = $email_err = $phoneNo_err = $ic_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
$icAddress = $_POST['ic'];
$image = $icAddress .".jpg";


    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM customer_detail WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 4){
        $password_err = "Password must have at least 4 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM customer_detail WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $email = trim($_POST["email"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

     // Validate ic
    if(empty(trim($_POST["ic"]))){
        $ic_err = "Please enter your ic.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM customer_detail WHERE ic = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ic);
            
            // Set parameters
            $param_ic = trim($_POST["ic"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $ic = trim($_POST["ic"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate contact number
    if(empty(trim($_POST["phoneNo"]))){
        $phoneNo_err = "Please enter your phone number.";
    } elseif(strlen(trim($_POST["phoneNo"])) > 12 ||strlen(trim($_POST["phoneNo"])) < 9){
        $phoneNo_err = "Please enter correct phone number.";
    }
    else{
        // Prepare a select statement
        $sql = "SELECT ID FROM customer_detail WHERE phoneNo = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phoneNo);
            
            // Set parameters
            $param_phoneNo = trim($_POST["phoneNo"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $phoneNo = trim($_POST["phoneNo"]);
                // if(mysqli_stmt_num_rows($stmt) == 1){
                //     $username_err = "This username is already taken.";
                // } else{
                //     $username = trim($_POST["username"]);
                // }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate image
//     $target_dir = "images/";
//   $target_file = $target_dir . $image;
//   $uploadOk = 1;
//   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//   // Check if image file is a actual image or fake image
  
//     $check = getimagesize($_FILES["FileUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
  
//   // Check if file already exists
//   if (file_exists($target_file)) {
//       echo "Sorry, file already exists.";
//       $uploadOk = 0;
//   }
//   // Check file size
//   if ($_FILES["FileUpload"]["size"] > 500000) {
//       echo "Sorry, your file is too large.";
//       $uploadOk = 0;
//   }
//   // Allow certain file formats
//   if($imageFileType != "jpg") {
//       echo "Sorry, only JPG";
//       $uploadOk = 0;
//   }
//   // Check if $uploadOk is set to 0 by an error
//   if ($uploadOk == 0) {
//       echo "Sorry, your file was not uploaded.";
//   // if everything is ok, try to upload file
//   } else {
//       if (move_uploaded_file($_FILES["FileUpload"]["tmp_name"], $target_file)) {
//           echo "The file ". basename( $_FILES["FileUpload"]["name"]). " has been uploaded.";
//       } else {
//           echo "Sorry, there was an error uploading your file.";
//     }
// }

//     // Check input errors before inserting in database
//     if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($phoneNo_err)&& empty($ic_err)){
        
//         // Prepare an insert statement
//         $sql = "INSERT INTO customer_detail (username, password, email, phoneNo, ic,image) VALUES (?, ?, ?, ?, ?,?)";
         
//         if($stmt = mysqli_prepare($conn, $sql)){
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_email, $param_phoneNo, $param_ic,$param_image);
            
//             // Set parameters
//             $param_username = $username;
//             $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
//             $param_email = $email;
//             $param_phoneNo = $phoneNo;
//             $param_ic = $ic;
//             $param_image = $image;

//             // Attempt to execute the prepared statement
//             if(mysqli_stmt_execute($stmt)){
//                 // Redirect to login page
//                 header("location: login.php");
//             } else{
//                 echo "Something went wrong. Please try again later.";
//             }
//         }
         
//         // Close statement
//         mysqli_stmt_close($stmt);
//     }
    
//     // Close connection
//     mysqli_close($conn);
// }



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</head>
<body>
    <div class="row">
    <div class="col-md-3"></div>

    <div class="col-md-6">

    <div class="wrapper">
        <br>
        <br>

    <h2  class="display-4" style="text-align:center">Customer Registration Form</h2>
    <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                <span class="error"><?php echo $username_err; ?></span>
            </div>    
            <br>
            <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                <span class="error"><?php echo $password_err; ?></span>
            </div>
            <br>
            <div <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>>
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" value="<?php echo $confirm_password; ?>">
                <span class="error"><?php echo $confirm_password_err; ?></span>
            </div>
            <br>

            <div <?php echo (!empty($ic_err)) ? 'has-error' : ''; ?>>
                <label>IC</label>
                <input type="text"  class="form-control" name="ic" value="<?php echo $ic; ?>">
                <span class="error"><?php echo $ic_err; ?></span>
            </div>
            <br>

            <div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="error"><?php echo $email_err; ?></span>
            </div>
            <br>
            <div <?php echo (!empty($phone_No_err)) ? 'has-error' : ''; ?>>
                <label>Phone number</label>
                <input type="tel" name="phoneNo" class="form-control" value="<?php echo $phoneNo; ?>">
                <span class="error"><?php echo $phoneNo_err; ?></span>
            </div>

            <!-- <div class="form-group">
                <label>IC image</label>
                <input type="file" name="FileUpload" id="FileUpload">
            </div>
 -->
            <br>

            <button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
            <br>    
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            
            

        </form>
        </div>
        <div class="col-md-3"></div>

    </div> 
</div>   
</body>
</html>
