<?php 
include ("dbconnect.php");
if(isset($_POST['btn']))
{
extract($_POST);
$qry=mysqli_query($conn,"select * from userreg where umail='$umail'");
$count=mysqli_num_rows($qry);
if($count>0)
{
echo '<script>alert("user mail already exists enter different user mail")</script>';
}
elseif ($pswd != $cpswd) {
	echo '<script>alert("password and confirm password doesnot match.please re-enter the same password!")</script>';
}
elseif (strlen($pno) != 10) {
	echo '<script>alert("Phone number must contain 10 digits")</script>';
}
else
{
	$district="select";
	$place="none";
	$reg_date = date('Y-m-d H:i:s');
$qry2=mysqli_query($conn,"insert into userreg values('','$uname','$umail','$pswd','$cpswd','$pno','$address','$reg_date','$district','$place')");
if($qry2)
{
echo '<script>alert("registered successfully")
window.location.href="userlog.php"</script>';
}
else
{
  echo '<script>alert("something went wrong.registeration failed! ")</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
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
			height: 575px;
			padding: 40px 30px;
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
		p{
			color: #fff;
		}
		a{
			color: gray;
			font-style: italic;
			font-weight: bold;

		}
		a:hover{
			color: royalblue;
		}
		.bg input{
			width: 100%;
			margin-bottom: 20px;
		}
		.bg input[type=email],
		.bg input[type=password],
		.bg input[type=text],
		.bg input[type=number]{
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			height: 35px;
			color: #fff;
			font-size: 15px;
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
      margin-top: 15px;
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
      margin-top: 15px;
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
		<h2>USER REGISTRATION</h2>
		<form class="container" method="post" action="userreg.php" autocomplete="off">
		<label>User Name</label>
		<input type="text" name="uname" placeholder="user name" required> <br>
		<label>User Email</label>
		<input type="email" name="umail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="user email" required> <br>
		<label>User Password</label>
		<input type="password" name="pswd" placeholder="user password" required> <br>
		<label>Confirm Password</label>
		<input type="password" name="cpswd" placeholder="confirm password" required> <br>
		<label>Contact</label>
		<input type="number" name="pno" placeholder="10 digit phone number" pattern="[0-9]{10}$s" required> <br>
				<label>Address</label>
		<input type="text" name="address" placeholder="Type your address" required> <br>
		<p>Already registered?click <a href="userlog.php">login</a></p>
		<button class="log" type="submit" name="btn" onclick="validate()">create</button>
				<button class="back" onclick="location.href='index.php'">Back</button>
	</form>
</div>

</body>
</html>