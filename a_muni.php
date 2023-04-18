<?php
include("dbconnect.php");
session_start();

$status="not yet processed";
$status1="inprogress";
$status2="closed";

  $qry=mysqli_query($conn,"select * from municipal WHERE status='$status'");
  if ($qry) {
    $count=mysqli_num_rows($qry);
  }
    $qry1=mysqli_query($conn,"select * from municipal WHERE status='$status1'");
    if ($qry1) {
    $count1=mysqli_num_rows($qry1);
  }
  $qry2=mysqli_query($conn,"select * from municipal WHERE status='$status2'");
    if ($qry2) {
    $count2=mysqli_num_rows($qry2);
  }

?>
<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipal dashboard</title>
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
  <div>
    
    <h2 style="text-align:center;">COMPLAINT STATUS COUNT</h2>
    <div style="margin-left: 230px; margin-top: 50px;">
<a href="m_not.php"><div class="card">Not yet processed<br><?php echo $count; ?></div></a>
<a href="m_inprogress.php"><div class="card">In progress<br><?php echo $count1; ?></div></a>
<a href="m_close.php"><div class="card">Closed complaint<br><?php echo $count2; ?></div></a>
</div>
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