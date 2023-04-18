<?php 
include("dbconnect.php");
error_reporting(0);
session_start();

if(isset($_POST['btn']))
{
extract($_POST);
$_SESSION['umail']=$umail;
$qry=mysqli_query($conn,"select uname from userreg where umail='$umail'&& pswd='$pswd'");
$row=mysqli_fetch_array($qry);
$uname=$row['uname'];
if ($uname != null) {
$_SESSION['uname']=$uname;
echo '<script>window.location.href="loader.php"</script>';
}
else
{
echo'<script>alert("user mail or password is wrong")</script>';
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
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
		.bg input[type=password]{
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
		<h2>USER LOGIN</h2>
		<form class="container" method="post" action="userlog.php" autocomplete="off">
		<label>User mail</label>
		<input type="email" name="umail" placeholder="User mail" required> <br>
		<label>User Password</label>
		<input type="password" name="pswd" placeholder="password" required> <br>
		<p>If not registered click <a href="userreg.php">register</p>
		<button class="log" type="submit" name="btn">login</button>
		<button class="back" onclick="location.href='index.php'">Back</button>
	</form>
</div>

</body>
</html>