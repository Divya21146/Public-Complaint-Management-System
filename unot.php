<?php
include("dbconnect.php");
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>not process</title>
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
</nav>
	<div>
			<h2 style="text-align: center;">NOT YET PROCESSED</h2>
    <table style="margin: 0 auto; width: 95%; border: 1px solid #ccc; " class="table">
    <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Department</th>
      <th scope="col">Category</th>
      <th scope="col">Title</th>
      <th scope="col">Details</th>
      <th scope="col">District</th>
      <th scope="col">Place</th>
      <th scope="col">Status</th>
      <th scope="col">File</th>
      <th scope="col">Image</th>
      <th scope="col">Registration Date</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
		<tr>
		
   <?php  
   $umail=$_SESSION['umail'];
  $status="not yet processed";
  $folder="upload/";
  $folder1="images/";
  
  $qry=mysqli_query($conn,"select * from regcomplaint WHERE status='$status'&& umail='$umail'");
  
  while ($row=mysqli_fetch_array($qry))
  { 
  ?>
      <tbody>
      <td scope="row"></td>
      <td><?php   echo $row['department'];  ?></td>
      <td><?php   echo $row['cat'];  ?></td>
      <td><?php   echo $row['ctitle'];  ?></td>
      <td><?php   echo $row['cdetail'];  ?></td>
      <td><?php   echo $row['district'];  ?></td>
      <td><?php   echo $row['place'];  ?></td>
      <td><a type="button" class="btn btn-success btn-sm" disabled ><?php   echo $row['status'];  ?></a></td>
      <td><a type="button" class="btn btn-info btn-sm" href="<?php echo "$folder".$row['cdoc']; ?>" download >Download File</a></td>
      <td><img width="100px" height="100px" src="<?php echo "$folder1". $row['cimage']; ?>" ></td>
      <td><?php  echo $row['date'] ; ?></td>
      <td>
        <?php
        $status = $row['status'];

            if ($status == "not yet processed") {
              ?>
            
            <a type="button" class="btn btn-danger btn-sm" href='?id=<?php echo $row['id']?>'>delete </a>
            <?php
          }
          ?>
          </td>
          <td>
        <?php
        $status = $row['status'];

            if ($status == "not yet processed") {
              ?>
            
            <a type="button" class="btn btn-success btn-sm" href='edit.php?id=<?php echo $row['id']?>'>edit </a>
            
            <?php
          }
          ?>
          </td>
      <?php
      if(isset($_GET['id'])){
        $id=$_GET['id'];
        
    $qry1=mysqli_query($conn, "delete from regcomplaint WHERE id='$id'");
    $select=mysqli_query($conn,"select * from regcomplaint where id='$id'");
        $fetch=mysqli_fetch_array($select);
        $mail=$fetch['umail'];

        $dep=$fetch['department'];
    $del1=mysqli_query($conn,"delete from agriculture where umail='$mail' && department='$dep'");
    $del2=mysqli_query($conn,"delete from environment where umail='$mail' && department='$dep'");
    $del3=mysqli_query($conn,"delete from education where umail='$mail' && department='$dep'");
    $del4=mysqli_query($conn,"delete from general where umail='$mail' && department='$dep'");
    $del5=mysqli_query($conn,"delete from municipal where umail='$mail' && department='$dep'");
    $del6=mysqli_query($conn,"delete from transport where umail='$mail' && department='$dep'");
    $del7=mysqli_query($conn,"delete from health where umail='$mail' && department='$dep'");

    
}  
?>
    </tr>
  </tbody>
    <?php 
  }
  ?>

	</table>
	</div>

</body>
</html>