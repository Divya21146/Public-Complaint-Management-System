<?php
include("dbconnect.php");
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>user details</title>
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
      <a class="navbar-brand">Welcome <?php echo $_SESSION['aname']; ?> !</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="m_notify.php">dashboard</a></li>
    <li><a href="munipost.php">posts</a></li>
    <li><a href="a_muni.php">Complaint status</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Complaints<span class="caret"></span></a>
        <ul class="dropdown-menu">
      <li><a href="m_not.php">Not yet processed</a></li>
              <li><a href="m_inprogress.php"> In progress</a></li>
              <li><a href="m_close.php">Closed complaints</a></li>
            </ul>
          </li>
        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
        <ul class="dropdown-menu">
      <li><a href="m_add.php">add category</a></li>
              <li><a href="m_mcategory.php">manage category</a></li>
            </ul>
          </li>
          <li><a href="m_umanage.php">manage users</a></li>
          <li><a href="a_mfeed.php">feedback</a></li>
        </ul>
    <form method="get"><button class="back" name="logout">Logout</button></form>
  </div>  
  </nav>
   <?php
$id=$_GET['id'];
  $seen="seen";
  $qry=mysqli_query($conn,"select * from mfeed where id = '$id'");
  $update=mysqli_query($conn,"update mfeed set seen='$seen' where id = '$id'");
  $raw=mysqli_fetch_array($qry);
  $umail=$raw['umail'];
  ?>
  <div class="col-sm-6" style=" margin-bottom:10px;">
      <form style=" margin-left:150px; margin-right:100px;" class="mb-4" method="post">
    <h2 style="margin-bottom: 30px;" class="h1-responsive font-weight-bold text-center my-4">FEEDBACK</h2>
  
  <p><?php echo $raw['feedback']; ?></p><br><br><br>
</form>
</div>
<div class="col-sm-6" style="border-left: 1px solid black; ">
  <form class="mb-4" style=" margin-left:50px; margin-right:150px;" method="post">
    <h2 style=" margin-bottom: 30px;" class="h1-responsive font-weight-bold text-center my-4">USER DETAIL</h2>

  <?php

 $qry2=mysqli_query($conn,"select * from userreg where umail='$umail'");
 while ($row=mysqli_fetch_array($qry2)) 
 {
  ?>
 <p><b>User Name: </b><?php echo $row['uname']; ?></p><br>
 <p><b>District: </b><?php echo $row['district']; ?></p><br>
  <p><b>Place: </b><?php echo $row['place']; ?></p><br>
  <p><b>Contact: </b><?php echo $row['pno']; ?></p><br>
  <p><b>Address: </b><?php echo $row['address']; ?></p><br>
  <p><b>Reg Date: </b><?php echo $row['reg_date']; ?></p>
  <?php
}
  ?>
</form>
</div>	
<?php
        if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['amail']);
    header('location:adminlog.php');
}
if ($_SESSION['amail'] == "") {
  header('location:adminlog.php');
}
?>
    
</body>
</html>