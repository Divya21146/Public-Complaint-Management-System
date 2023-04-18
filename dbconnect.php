<?php 
$servername="localhost";
$username = "root";
$password = "";
$mydb ="complaint";

  $conn = mysqli_connect($servername,$username,$password,$mydb);
if(!$conn){
die("can't reach database" .mysqli_connect_error());
}
?>