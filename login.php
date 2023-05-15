<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT*FROM login WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION["username"] = $user["username"];
	header("location: formregist.php");
}else{
	header("location: index.php");	
}
?>