<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<style>
		body{
			background-image: url("cimage.jpg");
			font-family: sans-serif;
			height: 100%;
			background-repeat: no-repeat;
			background-size: cover;
			overflow-x: hidden;
		}
		h2{
			text-align: center;
			font-size: 60px;
			font-family: sans-serif;

		}
		p{
			margin: auto;
			color: papayawhip;
			line-height: 1.5;
			font-style: italic;
			max-width: 600px;
			border: 2px solid #000;
			text-align: justify;
			font-size: 20px;
			padding: 40px;
			background: #888 .8;
			border-radius: 15px;
		}
		.bg{
			background: rgba(0,0,0,.6);
		}
		h2:hover {
  		transform: scale(1.05);
		}

		h2:active {
  		transform: scale(0.95) rotateZ(1.7deg);
		}

		.topnav{
			overflow: hidden;
  			background-color: transparent;
		}
		.topnav a {
  			float: left;
  			color: #f2f2f2;
  			text-align: center;
  			padding: 14px 16px;
  			text-decoration: none;
  			font-size: 17px;
  		}
  		.topnav a:hover{
		  background-color: rgba(0, 0, 0, 0.615);
		  border-radius: 5px;
		}
	</style>
  		
</head>
<body>
	<div class="topnav">
		<a class="active" href="#home">Home</a>
		<a href="userlog.php"> User Login</a>
		<a href="userreg.php"> User registration</a>
		<a href="adminlog.php"> Admin</a>
	</div>

	<h2>Complaint Management System</h2>
	<p class="bg">"Welcome to our Complaint Management System! Our goal is to provide a seamless and efficient way for you to report and track any issues or complaints you may have. With our user-friendly interface, you can easily submit a complaint and view the status of your complaint. Whether you're a customer, employee, or member of the public, we're here to help you and ensure that your voice is heard. Let's work together to make things better!"</p>

</body>
</html>