<?php 
include("dbconnect.php");
error_reporting(0);
session_start();

extract($_POST);
if(isset($_POST['btn']))
{
    $_SESSION['amail']=$amail;
    $dep1="Agriculture and Farmer Welfare";
    $dep2="Environment and Forest";
    $dep3="Education";
    $dep4="Municipal and Water Supply";
    $dep5="Health";
    $dep6="Transport";
    $dep7="General";
    $qry1=mysqli_query($conn,"select * from adminlog where department='$dep1' && (amail='$amail'&& pswd='$pswd')");
  
    $row1=mysqli_fetch_array($qry1);
    $dt1=$row1['department'];
    $qry2=mysqli_query($conn,"select * from adminlog where department='$dep2' && (amail='$amail'&& pswd='$pswd')");
    $row2=mysqli_fetch_array($qry2);

    $dt2=$row2['department'];
      $qry3=mysqli_query($conn,"select * from adminlog where department='$dep3' && (amail='$amail'&& pswd='$pswd')");
    $row3=mysqli_fetch_array($qry3);
    $dt3=$row3['department'];

    $qry4=mysqli_query($conn,"select * from adminlog where department='$dep4' && (amail='$amail'&& pswd='$pswd')");
    $row4=mysqli_fetch_array($qry4);
    $dt4=$row4['department'];
    $qry5=mysqli_query($conn,"select * from adminlog where department='$dep5' && (amail='$amail'&& pswd='$pswd')");
    $row5=mysqli_fetch_array($qry5);
    $dt5=$row5['department'];
        $qry6=mysqli_query($conn,"select * from adminlog where department='$dep6' && (amail='$amail'&& pswd='$pswd')");
    $row6=mysqli_fetch_array($qry6);
    $dt6=$row6['department'];
    $qry7=mysqli_query($conn,"select * from adminlog where department='$dep7' && (amail='$amail'&& pswd='$pswd')");
    $row7=mysqli_fetch_array($qry7);
    $dt7=$row7['department'];

    if ($dt1 != null) {
      $_SESSION['aname']=$dt1;
      echo '<script>window.location.href="aloader.php"</script>';
    }
    elseif($dt2 != null) {
    $_SESSION['aname']=$dt2;
    echo '<script>window.location.href="enloader.php"</script>';
    }
    elseif ($dt3 != null) {
    $_SESSION['aname']=$dt3;
    echo '<script>window.location.href="edloader.php"</script>';
    }
    elseif ($dt4 != null) {
    $_SESSION['aname']=$dt4;
    echo '<script>window.location.href="mloader.php"</script>';
    }
 
    elseif ($dt5 != null) {
    $_SESSION['aname']=$dt5;
    echo '<script>window.location.href="hloader.php"</script>';
    }
    elseif ($dt6 != null) {
    $_SESSION['aname']=$dt6;
    echo '<script>window.location.href="tloader.php"</script>';
    }
  
    elseif ($dt7 != null) {
    $_SESSION['aname']=$dt7;
    echo '<script>window.location.href="gloader.php"</script>';
    }
    
else
{
echo'<script>alert("admin mail or password wrong")</script>';
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style>
    *{
      font-family: sans-serif;
    }
    body{
      margin: 0;
      padding: 0;
    }
    body:before{
      content: '';
      position: fixed;
      width: 100vw;
      height: 100vh;
      background-image: url(cimage.jpg);
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      -webkit-filter: blur(10px);
      -moz-filter: blur(10px);
    }
    .bg{
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%,-50%);
      -moz-transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
      -o-transform: translate(-50%,-50%);
      width: 350px;
      height: 275px;
      padding: 50px 30px;
      background: rgba(0,0,0,.6);
      border-radius: 10px;
    }
    .bg h2{
      margin: 0;
      padding: 0 0 20px;
      color: #fff;
      text-align: center;
      text-transform: uppercase;
    }
    .bg label{
      margin: 0;
      padding: 0;
      color: #fff;
    }
    .bg input{
      width: 100%;
      margin-bottom: 20px;
    }
    .bg input[type=email],
    .bg input[type=password]{
      border: none;
      border-bottom: 1px solid #fff;
      background: transparent;
      outline: none;
      height: 35px;
      color: #fff;
      font-size: 15px;
    }
    select{
      background: transparent;
      color: #ccc;
    }
    .log{
      position: relative;
      padding: 10px 20px;
      border-radius: 7px;
      border: 1px solid rgb(61, 106, 255);
      font-size: 14px;
      text-transform: uppercase;
      font-weight: 600;
      letter-spacing: 2px;
      background: transparent;
      color: #fff;
      overflow: hidden;
      box-shadow: 0 0 0 0 transparent;
      -webkit-transition: all 0.2s ease-in;
      -moz-transition: all 0.2s ease-in;
      transition: all 0.2s ease-in;
      float: right;
      margin-left: 10px;
      margin-top: 25px;
    }
    .back{
      position: relative;
      padding: 10px 20px;
      border-radius: 7px;
      border: 1px solid rgb(255, 99, 71);
      font-size: 14px;
      text-transform: uppercase;
      font-weight: 600;
      letter-spacing: 2px;
      background: transparent;
      color: #fff;
      overflow: hidden;
      box-shadow: 0 0 0 0 transparent;
      -webkit-transition: all 0.2s ease-in;
      -moz-transition: all 0.2s ease-in;
      transition: all 0.2s ease-in;
      float: right;
      margin-left: 10px;
      margin-top: 25px;
    }
    .back:hover{
      background: rgb(255, 99, 71);
      box-shadow: 0 0 20px 5px rgba(236, 90, 0, 0.815);
      -webkit-transition: all 0.2s ease-out;
      -moz-transition: all 0.2s ease-out;
      transition: all 0.2s ease-out;
    }

    .log:hover{
      background: rgb(61, 106, 255);
      box-shadow: 0 0 20px 5px rgba(0, 142, 236, 0.815);
      -webkit-transition: all 0.2s ease-out;
      -moz-transition: all 0.2s ease-out;
      transition: all 0.2s ease-out;
    }

    button:hover::before {
      -webkit-animation: sh02 0.5s 0s linear;
      -moz-animation: sh02 0.5s 0s linear;
      animation: sh02 0.5s 0s linear;
    }

    .log::before {
      content: '';
      display: block;
      width: 0px;
      height: 86%;
      position: absolute;
      top: 7%;
      left: 0%;
      opacity: 0;
      background: #fff;
      box-shadow: 0 0 50px 30px #fff;
      -webkit-transform: skewX(-20deg);
      -moz-transform: skewX(-20deg);
      -ms-transform: skewX(-20deg);
      -o-transform: skewX(-20deg);
      transform: skewX(-20deg);
    }
    .back::before {
      content: '';
      display: block;
      width: 0px;
      height: 86%;
      position: absolute;
      top: 7%;
      left: 0%;
      opacity: 0;
      background: #fff;
      box-shadow: 0 0 50px 30px #fff;
      -webkit-transform: skewX(-20deg);
      -moz-transform: skewX(-20deg);
      -ms-transform: skewX(-20deg);
      -o-transform: skewX(-20deg);
      transform: skewX(-20deg);
    }

    @keyframes sh02 {
      from {
        opacity: 0;
        left: 0%;
      }

      50% {
        opacity: 1;
      }

      to {
        opacity: 0;
        left: 100%;
      }
    }

    button:active {
      box-shadow: 0 0 0 0 transparent;
      -webkit-transition: box-shadow 0.2s ease-in;
      -moz-transition: box-shadow 0.2s ease-in;
      transition: box-shadow 0.2s ease-in;
    }
    
  </style>

</head>
<body>
		<div class="bg">
		<h2>ADMIN LOGIN</h2>
        <form class="container" method="post" autocomplete="off">
    <label>Department</label>
    <select type="select" name="dep" id="dep" class="form-control">
      <option value="Agriculture and Farmer Welfare">Agriculture and Farmer Welfare</option>
      <option value="Environment and Forest">Environment and Forest</option>
      <option value="Education">Education</option>
      <option value="Municipal and Water Supply">Municipal and Water Supply</option>
      <option value="Health">Health</option>
      <option value="Transport">Transport</option>
      <option value="General">General</option>
    </select><br><br>
		<label>Mail</label>
		<input type="email" name="amail" placeholder="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required> <br>
		<label>Password</label>
		<input type="password" name="pswd" placeholder="password" required> <br>
		<button class="log" type="submit" name="btn">login</button>
		<button class="back" onclick="location.href='index.php'">Back</button>
	</form>
</div>

</body>
</html>