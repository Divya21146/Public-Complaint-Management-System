<?php
include("dbconnect.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Info</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .back{
      position: relative;
      padding: 5px 15px;
      border-radius: 7px;
      border: 2px solid rgb(255, 99, 71);
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
      margin-left: 9px;
      margin-top: 9px;
    }
    .back:hover{
      background: rgb(255, 99, 71);
      box-shadow: 0 0 20px 5px rgba(236, 90, 0, 0.815);
      -webkit-transition: all 0.2s ease-out;
      -moz-transition: all 0.2s ease-out;
      transition: all 0.2s ease-out;
    }
button:hover::before {
      -webkit-animation: sh02 0.5s 0s linear;
      -moz-animation: sh02 0.5s 0s linear;
      animation: sh02 0.5s 0s linear;
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
    .log{
      position: relative;
      padding: 5px 15px;
      border-radius: 7px;
      border: 1px solid rgb(61, 106, 255);
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 2px;
      background: blue;
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
    .log:hover{
      color: #fff;
      background: rgb(61, 106, 255);
      box-shadow: 0 0 20px 5px rgba(0, 142, 236, 0.815);
      -webkit-transition: all 0.2s ease-out;
      -moz-transition: all 0.2s ease-out;
      transition: all 0.2s ease-out;
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
  </style>
  </head>
  <body style="background-color: #eaf6f6;">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Welcome <?php echo $_SESSION['uname']; ?> !</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="userdash.php">Dashboard</a></li>
    <li><a href="post.php">Posts</a></li>
    <li><a href="dep.php">Departments</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account Settings
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
      <li><a href="uprofile.php"> Profile</a></li>
      <li><a href="cpswd.php">Change Password</a></li>
    </ul>
  </li>
    <li><a href="cstatus.php">Complaint Status</a></li>
    <li><a href="chistory.php">Complaint History</a></li>
    </ul>
    <form method="get"><button class="back" name="logout">Logout</button></form>
</div>
</nav>
	<div>
		<?php 
    $umail=$_SESSION['umail'];
$qry=mysqli_query($conn,"select * from userreg where umail='$umail'");
  
$row=mysqli_fetch_array($qry);

$id=$row['id'];

if(isset($_POST['btn']))
{
extract($_POST);
$qry2 = mysqli_query($conn, "UPDATE userreg SET pno='$pno', address='$address', district='$district', place='$place' WHERE id='$id'");
if($qry2)
{
echo '<script>window.location.href="uprofile.php"</script>';

}
}  
?>
		<form style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); margin-top: 40px; margin-left:195px; margin-right:195px; border: 1px solid #ccc; padding: 30px; border-radius: 10px;" class="mb-4" method="post" autocomplete="off">
		<h2 style="margin: 10px; margin-bottom: 30px;" class="h1-responsive font-weight-bold text-center my-4">PROFILE INFORMATION</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="md-form mb-0">
          <label for="name" class="">User Name</label>
          <input type="text" id="disabledInput" name="name" class="form-control" value="<?php echo $row['uname'];?>" disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="md-form mb-0">
          <label for="email" class="">User Email</label>
            <input type="email" id="disabledInput" name="umail" class="form-control" value="<?php echo $row['umail'];?>" disabled>
              
        </div>
      </div>
    </div>
    <br>
    <div class="row">
    <div class="col-md-6">
      <div class="md-form mb-0">
         <label for="district" class="">District</label>
        <input type="text" id="district" name="district" class="form-control" value="<?php echo $row['district'];?>" required>
       
        </div>
      </div>
      <div class="col-md-6">
      <div class="md-form mb-0">
         <label for="place" class="">Place</label>
        <input type="text" id="place" name="place" class="form-control" value="<?php echo $row['place'];?>" required>
       
        </div>
      </div>
    </div>
    <br>
    <div class="form-group">

		<label>Contact</label>
		<input class="form-control" type="number" name="pno" pattern="[0-9]{10}" value="<?php echo $row['pno'];?>">
  </div>
  <br>
    <div class="form-group">
    <label for="address">Address</label>
   <input class="form-control" id="address" name="address" rows="3" value="<?php echo $row['address'];?>">
  </div><br>

		<button class="log" type="submit" name="btn" onclick="return msg()">update</button><br><br>
  </div>

	</form>
	
	</div>
	
<?php
        if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['umail']);
       unset($_SESSION['uname']);
    header('location:userlog.php');
}
if ($_SESSION['umail'] == "") {
  header('location:userlog.php');
}
?>
    
	<script type="text/javascript">function msg(){alert("updated successfully");
return true;}</script>

</body>
</html>