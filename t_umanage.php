<?php
include("dbconnect.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User details</title>
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
    body{
    counter-reset: serial;
    overflow-x: hidden;
    }
tr td:first-child:before{
      counter-increment: serial;
      content: counter(serial);
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
    <li><a href="t_notify.php">dashboard</a></li>
    <li><a href="transpost.php">posts</a></li>
    <li><a href="a_trans.php">Complaint status</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Complaints<span class="caret"></span></a>
        <ul class="dropdown-menu">
      <li><a href="t_not.php">Not yet processed</a></li>
              <li><a href="t_inprogress.php"> In progress</a></li>
              <li><a href="t_close.php">Closed complaints</a></li>
            </ul>
          </li>
        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
        <ul class="dropdown-menu">
      <li><a href="t_add.php">add category</a></li>
              <li><a href="t_mcategory.php">manage category</a></li>
            </ul>
          </li>
          <li><a href="t_umanage.php">manage users</a></li>
          <li><a href="a_tfeed.php">feedback</a></li>
        </ul>
    <form method="get"><button class="back" name="logout">Logout</button></form>
  </div>  
  </nav>
	<div>
<h2 style="text-align: center;">USER DETAILS</h2>
  <br>
  <table  style="margin: 0 auto; width: 95%; border: 1px solid #ccc;" class="table">
    <thead>
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">user name</th>
    <th scope="col">email</th>
    <th scope="col">contact</th>
    <th scope="col">address</th>
    <th scope="col">Registration Date</th>
  </tr>
</thead>
  <?php  
  
  $qry=mysqli_query($conn, "select  * from userreg");

  while ($row=mysqli_fetch_array($qry))
  {
  
  ?>
  
    <tbody>
      <tr>
      <td scope="row"></td>
    <td><?php   echo $row['uname'];  ?></td>
    <td><?php   echo $row['umail'];  ?></td>
    <td><?php   echo $row['pno'];  ?></td>
    <td><?php   echo $row['address'];  ?></td>
    <td><?php   echo $row['reg_date'];  ?></td>
    </tr>
  </tbody>
  <?php 
  }
  ?>
</table>
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