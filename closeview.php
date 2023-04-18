<?php
include("dbconnect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complaint details</title>
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
		<form style="box-shadow: 3px 3px 7px rgba(143, 0, 255, 0.8); margin-top: 40px; margin-left:400px; margin-right:400px; border: 1px solid blueviolet; padding: 30px; border-radius: 30px 10px;" class="mb-4">
    <h2 style="margin: 10px; margin-bottom: 30px;" class="h1-responsive font-weight-bold text-center my-4">VIEW DETAILS</h2>
  <?php  
  
  $umail=$_SESSION['umail'];
  $id=$_GET['id'];
  $cseen="seen";
  $folder="upload/";
  
  $qry=mysqli_query($conn,"select * from regcomplaint where umail='$umail' && id='$id'");
  $update=mysqli_query($conn,"update regcomplaint set cseen='$cseen' where umail='$umail' && id='$id'");
  
  while ($row=mysqli_fetch_array($qry))
  { 
  ?>
  <p><b>Category: </b><?php echo $row['cat']; ?></p><br>
  <p><b>Complaint Title: </b><?php echo $row['ctitle']; ?></p><br>
  <p><b>Complaint Details: </b><?php echo $row['cdetail']; ?></p><br>
  <p><b>Related Document: </b><a href="<?php echo "$folder".$row['cdoc']; ?>" download >Download File</a></p><br>
  <p><b>District: </b><?php echo $row['district']; ?></p><br>
  <p><b>Place: </b><?php echo $row['place']; ?></p><br>
  <p><b>Reg Date: </b><?php echo $row['date']; ?></p>
<?php
}
?>
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
     
</body>
</html>