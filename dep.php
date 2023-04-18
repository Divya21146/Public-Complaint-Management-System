<?php
include("dbconnect.php");
session_start();

$umail=$_SESSION['umail'];
?>

<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint status</title>
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
    .card {
  box-sizing: border-box;
  width: 190px;
  height: 254px;
  background: rgba(217, 217, 217, 0.58);
  border: 1px solid white;
  box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
  content-visibility: blur(6px);
  border-radius: 17px;
  text-align: center;
  padding: 110px 10px;
  cursor: pointer;
  transition: all 0.5s;
  display: flex;
  align-items: center;
  justify-content: center;
  user-select: none;
  font-weight: bolder;
  display: inline-block;
  margin-left: 70px;
  margin-top: 30px;
  margin-bottom: 10px;
}

.card:hover {
  border: 1px solid black;
  transform: scale(1.05);
}

.card:active {
  transform: scale(0.95) rotateZ(1.7deg);
}
  </style>
  </head>
  <body style="background-color: #eaf6f6;">
    <div class="bg">
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
  <div class="container">
    <h2 style="text-align: center;">COMPLAINT DEPARTMENTS</h2>
    <div style="display: flex; flex-wrap: wrap;">
<a href="agri.php"><div class="card">Agriculture and Farmer Welfare</div></a>
<a href="envi.php"><div class="card">Environment and Forest</div></a>
<a href="edu.php"><div class="card">Education</div></a>
<a href="muni.php"><div class="card">Municipal and Water supply</div></a>
<a href="health.php"><div class="card">Health</div></a>
<a href="trans.php"><div class="card">Transport</div></a>
<a href="general.php"><div class="card">General</div></a>
</div>
  </div>
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