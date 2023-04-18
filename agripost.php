<?php
include("dbconnect.php");
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>posts</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .card {
  width: 300px;
  background: white;
  padding: .4em;
  border-radius: 6px;
  margin-left: 10px;
  
}

.card-image {
  background-color: rgb(236, 236, 236);
  width: 100%;
  height: 60%;
  border-radius: 6px 6px 0 0;
}

.category {
  text-transform: uppercase;
  font-size: 0.7em;
  font-weight: 600;
  color: rgb(63, 121, 230);
  padding: 10px 7px 0;
  white-space: nowrap; 
  text-overflow: ellipsis;

}

.category:hover {
  cursor: pointer;
}

.heading {
  font-weight: 400;
  color: rgb(88, 87, 87);
  padding: 7px;
  padding-bottom: 0;
}

.heading:hover {
  cursor: pointer;
}
.scroll{

  max-height: 300px; /* set a maximum height for the card */
  overflow-y: auto; /* enable vertical scrolling */
  box-sizing: border-box; /* include padding and border in container size */
}

.author {
  color: gray;
  font-weight: 400;
  font-size: 11px;
  padding-top: 20px;
}

.name {
  font-weight: 600;
}

.name:hover {
  cursor: pointer;
}
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
    <li><a href="a_notify.php">dashboard</a></li>
    <li><a href="agripost.php">posts</a></li>
    <li><a href="a_agri.php">Complaint status</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Complaints<span class="caret"></span></a>
        <ul class="dropdown-menu">
      <li><a href="a_not.php">Not yet processed</a></li>
              <li><a href="a_inprogress.php"> In progress</a></li>
              <li><a href="a_close.php">Closed complaints</a></li>
            </ul>
          </li>
        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
        <ul class="dropdown-menu">
      <li><a href="a_add.php">add category</a></li>
              <li><a href="a_mcategory.php">manage category</a></li>
            </ul>
          </li>
          <li><a href="a_umanage.php">manage users</a></li>
          <li><a href="a_afeed.php">feedback</a></li>
        </ul>
    <form method="get"><button class="back" name="logout">Logout</button></form>
      </div>  
</nav>
<div style="display: flex;
  flex-wrap: wrap;
  margin-left: 50px;
  margin-right: 50px;">
<?php

$status="not yet processed";
$department="Agriculture and Farmer Welfare";
 
// Query the database to get the items for the current page
$items_query = mysqli_query($conn, "SELECT * FROM regcomplaint where status='$status' && department='$department'");

// Loop through the items and display them
while ($item = mysqli_fetch_array($items_query)) {
    // Display the item here
  
  $folder="images/";
?>
<br>
<div class="card" style="margin-bottom: 20px;   overflow-y: auto;">
  <div class="card-image"><img id="myBtn" class="button" src="<?php echo "$folder".$item['cimage']; ?>" style="width: 100%; height: 100%;"></div>
  <div class="heading">
    <div class="category"><p> <?= $item['department'] ?></p></div>
    <div class="scroll">
    <p><b> <?= $item['umail'] ?></b></p>
    <p><b>location: </b><?= $item['district'] ?></p>
    <p><b>Category: </b><?= $item['cat'] ?></p>
    <p><b>Title: </b><?= $item['ctitle'] ?></p>
    <p><b>Detail: </b><?= $item['cdetail'] ?></p>
    
  </div>

  </div>

</div>

<?php 

}

?>
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
