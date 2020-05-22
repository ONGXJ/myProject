<?php
include("config.php");
session_start();


?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
$sql = "SELECT * FROM customer_detail";
      $result = $conn -> query($sql);
      if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
          
          $username = $row['username'];
          $password = $row['password'];
          $phoneNo = $row['phoneNo'];
          $ic = $row['ic'];
          $email = $row['email'];
        
?>
<div><?php echo $password;?></div>
<?php
  }
      }
?>
</body>
</html>