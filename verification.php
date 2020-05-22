<?php
session_start();
include("config.php");



$u=$_POST['username'];
$p=$_POST['password'];
$sql= "SELECT * from customer_detail where username = '$u' and password='$p'";
$result= $conn->query($sql);

// if($result->num_rows>0){
// 	while($row=$result->fetch_assoc()){
// 		$_SESSION['user']=$u;
// 		echo $_SESSION['user']."login Successful";
// 	}
// }
// else{
// 	echo "Login Failed";
// }
if($stmt = $conn->prepare("SELECT username,password from customer_detail where username=? and password=?")){
	$stmt->bind_param("ss",$u,$p);
	$stmt->execute();
	$stmt->bind_result($user,$password);
	if($stmt->fetch()){
		$_SESSION['user']=$u;
		echo $_SESSION['user']."login Successful";
		echo "<script>window.location.assign('adminIndex.php');</script>";
	}
	else{
		echo "login fail";
		echo "<script>window.location.assign('adminlogin.php');</script>";
	}
	$stmt->close();
}
?>
<!-- aa' or 'x' ='x -->