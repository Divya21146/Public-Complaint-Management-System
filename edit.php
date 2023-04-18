<?php
include("dbconnect.php");
session_start();

  if(isset($_POST['btn']))
{
 extract($_POST);
$id=$_GET['id'];

// Check if file was uploaded successfully
if (isset($_FILES['cdoc']) && $_FILES['cdoc']['error'] === UPLOAD_ERR_OK) {
    $file_name=$_FILES['cdoc']['name'];
    $file_loc=$_FILES['cdoc']['tmp_name'];
    $folder="upload/";
    $path=move_uploaded_file($file_loc,$folder.$file_name);
    if (!$path) {
        echo '<script>alert("Error: Could not upload file.")</script>';
        exit();
    }
} else {
    echo '<script>alert("Error: File upload failed.")</script>';
    exit();
}

// Check if file was uploaded successfully
if (isset($_FILES['cimage']) && $_FILES['cimage']['error'] === UPLOAD_ERR_OK) {
    $file_name1=$_FILES['cimage']['name'];
    $file_loc1=$_FILES['cimage']['tmp_name'];
    $folder1="images/";
    $path1=move_uploaded_file($file_loc1,$folder1.$file_name1);
    if (!$path1) {
        echo '<script>alert("Error: Could not upload image.")</script>';
        exit();
    }
} else {
    echo '<script>alert("Error: Image upload failed.")</script>';
    exit();
}

$qry1 = mysqli_query($conn, "UPDATE regcomplaint SET cat='$cat', ctitle='$ctitle', cdetail='$cdetail', cdoc='$file_name', district='$district', place='$place', cimage='$file_name1' WHERE id='$id'");

if($qry1) {
    header("location:unot.php");
} else {
    echo '<script>alert("Error: Update was not completed. Please try again.")</script>';
}

}  

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit complaint</title>
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
  
  $id=$_GET['id'];
  $qry=mysqli_query($conn,"select * from regcomplaint where id='$id'");
  while ($row=mysqli_fetch_array($qry))
  { 
  ?>

		<form style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); margin-top: 40px; margin-left:195px; margin-right:195px; border: 1px solid #ccc; padding: 30px; border-radius: 10px;" class="mb-4" method="post" autocomplete="off">
    <h2 style="margin: 10px; margin-bottom: 30px;" class="h1-responsive font-weight-bold text-center my-4">EDIT COMPLAINT</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="md-form mb-0">
  <label>Category</label>
  <select class="form-control" aria-label="Default select example" name="cat">
	  <option><?php echo $row['cat']; ?></option>
 </select>
</div>
</div>
     <div class="col-md-6">
        <div class="md-form mb-0">
     <label>Complaint Title</label>
     <input type="text" name="ctitle" class="form-control" value="<?php echo $row['ctitle'];?>"></div>
 </div>
</div><br>
      <div class="form-group">
     <label>Complaint Details</label>
     <input type="text" name="cdetail" class="form-control" value="<?php echo $row['cdetail'];?>"> </div>
     
  <div class="row">
      <div class="col-md-6">
        <div class="md-form mb-0">
  <label>District</label>

     <input type="text" class="form-control" name="district"  value="<?php echo $row['district'];?>"> 
     </div>
</div>
      <div class="col-md-6">
        <div class="md-form mb-0">
     <label>Place</label>
     <input type="text" name="place" class="form-control" value="<?php echo $row['place'];?>">
     </div>
     </div>
     </div>
      <br>
      <div class="form-group">
     <label>Complaint related Doc</label>
     <a href="upload/<?php echo $row['cdoc']; ?>">click</a>
  <input class="form-control" type="file" name="cdoc" value="<?php echo $row['cdoc']; ?>">
  </div>
  <div class="form-group">
     <label>Complaint related Image</label><br>             
     <img width="350px" height="350px" src="images/<?php echo $row['cimage']; ?>"><br><br>
  <input class="form-control" type="file" name="cimage" accept="image/*" value="<?php echo $row['cimage']; ?>">
  </div> <br>
  	 <button class="log" type="submit" name="btn" onclick="return msg()">update</button>
     <br><br>
	</form>
  <br><br>
  <?php 
}
?>
	</div>

  <script type="text/javascript">function msg(){alert("updated successfully");
return true;}</script>


</body>
</html>