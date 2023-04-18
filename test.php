<?php 
include("dbconnect.php");
session_start();
extract($_POST);
if(isset($_POST['btn1']))
{
$qry=mysqli_query($conn,"select * from admin login where admin='$admin'&& psw1='$psw1'");
$count=mysqli_num_rows($qry);
if($count>0)
{
header("location:home.php");
}
else
{
echo '<script>alert("user name or passwod wrong")</script>';
}
}
extract($_POST);
if(isset($_POST['btn']))
{
$qry=mysqli_query($conn,"select * from register where uname='$uname'&& psw='$psw'");
$count=mysqli_num_rows($qry);
if($count>0)
{
$_SESSION['uname']=$uname;
header("location:userlogin.php");
}

else
{
echo '<script>alert("user name or passwod wrong")</script>';
}
}
?>
<html>
<head>
<title> login</title>

  <link rel="stylesheet" href="style.css">


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border: none;
        transition: all 0.3s ease-in-out;
    }
    
    .button:hover {
        background-color: #fff;
        color: #333;
        transform: scale(1.1);
    }
    
    .button:active {
        transform: translateY(3px);
    }

.btn-3 {
  background: rgb(0,172,238);
background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%);
  width: 130px;
  height: 40px;
  line-height: 42px;
  padding: 0;
  border: none;
  
}
.btn-3 span {
  position: relative;
  display: block;
  width: 100%;
  height: 100%;
}
.btn-3:before,
.btn-3:after {
  position: absolute;
  content: "";
  right: 0;
  top: 0;
   background: rgba(2,126,251,1);
  transition: all 0.3s ease;
}
.btn-3:before {
  height: 0%;
  width: 2px;
}
.btn-3:after {
  width: 0%;
  height: 2px;
}
.btn-3:hover{
   background: transparent;
  box-shadow: none;
}
.btn-3:hover:before {
  height: 100%;
}
.btn-3:hover:after {
  width: 100%;
}
.btn-3 span:hover{
   color: rgba(2,126,251,1);
}
.btn-3 span:before,
.btn-3 span:after {
  position: absolute;
  content: "";
  left: 0;
  bottom: 0;
   background: rgba(2,126,251,1);
  transition: all 0.3s ease;
}
.btn-3 span:before {
  width: 2px;
  height: 0%;
}
.btn-3 span:after {
  width: 0%;
  height: 2px;
}
.btn-3 span:hover:before {
  height: 100%;
}
.btn-3 span:hover:after {
  width: 100%;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
/*
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.bg {
  background-image: url("upload/bg1.png");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.bg2 {
background-image:url("upload/bg2.png");
}
*/
.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
}

.right {
  right: 0;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}


h1
{
color:#FFFFFF;
text-align:center
}
h2
{
color:#FFFFFF;
text-align:center;
}
p
{
color: #FFFFFF;
text-align:center
}

</style>

</head>
<body>




<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>
<div class="bg">
<div class="split left">
<div class="centered">
<h2> admin login </h2>

<form method="post" action="#">
<p>
user name : 
</br>
<input type="text" placeholder="enter the user name" name="admin" />
</br>
password :
</br>
<input type="password" placeholder="enter the password " name="psw1" />
</br>
</p>
</hr>
<div style="text-align:center"><abbr title="login page for admin">  
    <button class="custom-btn btn-3" class="button" type="submit" name="btn1"><span>login</span></button>  </abbr>
	
</div>  
</div>
</div>
<div class="split right">
<div class="centered">

<div class=".bg2">

<h2> user login </h2>
<form method="post" action="#">
<p>
user name : 
</br>
<input type="text" placeholder="enter the user name" name="uname" />
</br>
password :
</br>
<input type="password" placeholder="enter the password " name="psw" />
</p>
<div style="text-align:center">  
   <abbr title="login page for user"> <button class="custom-btn btn-3" class="button" type="submit" name="btn"><span>login</span></button> </abbr>  
</div>
</br>
<p>if you are a new user click the signin button bellow </p>
</form>

<div style="text-align:center">  
<button id="myBtn" class="button">
<?php 
include("dbconnect.php");
extract($_POST);
if(isset($_POST['btn2']))
{
$qry=mysqli_query($conn,"select * from register where uname='$uname'");
$count=mysqli_num_rows($qry);
if($count>0)
{
echo '<script>alert("user name already exists enter different user name")</script>';
}
else
{
$qry2=mysqli_query($conn,"insert into register values('','$name','$psw','$age','$email','$phone','$location','$reg_num','$uname')");
if($qry2)
{
echo '<script>alert("registered succesfully")</script>';
}
}
}
?>
signin</button>

</div>
</div>



</div

></div>
</div>


<div id="myModal" class="modal">
  <div class="modal-content" >
    <span class="close">&times;</span>
    <p><h1>regesterationn forum </h1>
<form method="post" action="#" style="background-image:url(bg2.png);height: 100%; background-position: center;background-repeat: no-repeat;background-size: cover;" >
<p>
your name : 
</br>
<input type="text" placeholder="enter your name" name="name" required />
</br>
age :
</br>
<input type="text" placeholder="enter your age" name="age" required />
</br>
e-mail id :
</br>
<input type="text" placeholder="enter your email address " name="email" required />
</br>
phone-number : 
</br>
<input type="text" placeholder="enter your phone-number " name="phone" required />
</br>
state:
</br>
<input type="text" placeholder="enter the state you live in " name="location" required />
</br>
register number:
</br>
<input type="text" placeholder="enter your register number " name="reg_num" required />
</br>
user name : 
</br>
<input type="text" placeholder="enter the user name" name="uname" required />
</br>
password :
</br>
<input type="password" placeholder="enter the password " name="psw" required />
</br>
</p>
<div style="text-align:center">  
<input class="button" type="submit" name="btn2" />
</div>
</form>

</p>
  </div>

</div>






<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


</body>
</html>