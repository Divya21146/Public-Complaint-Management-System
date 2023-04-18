<?php
include("dbconnect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reg Complaint</title>
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
    <li><a href="muni.php">Post complaint</a></li>
    <li><a href="mfeed.php">Feedback</a></li>
  </ul>
    <form method="get"><button class="back" name="logout">Logout</button></form>
  </div>
</nav>

	<div>

    <?php
    if (isset($_POST['btn'])) {
     $umail=$_SESSION['umail'];
     $date = date('Y-m-d H:i:s');
     $qry1=mysqli_query($conn,"select * from muni_add");
    $row=mysqli_fetch_array($qry1);
      
    extract($_POST);
    $file_name=$_FILES['cdoc']['name'];
    $file_loc=$_FILES['cdoc']['tmp_name'];
    $folder="upload/";
    $path=move_uploaded_file($file_loc,$folder.$file_name);

    $file_name1=$_FILES['cimage']['name'];
    $file_loc1=$_FILES['cimage']['tmp_name'];
    $folder1="images/";
    $path1=move_uploaded_file($file_loc1,$folder1.$file_name1);

    $department="Municipal and Water Supply";
    $status="not yet processed";

    $seen="not_seen";
    $cseen="not_seen";
    $qry2=mysqli_query($conn,"insert into regcomplaint values('','$umail','$department','$cat', '$ctitle','$cdetail','$file_name','$district','$place','$status','$date','$seen','$cseen','$file_name1')");

  $qry=mysqli_query($conn,"insert into municipal values('','$umail','$department','$cat', '$ctitle','$cdetail','$file_name','$district','$place','$status','$date','$seen','$cseen','$file_name1')");
if($qry)
{
  echo '<script>alert("Complaint posted successfully")</script>';
}
else
{
    echo '<script>alert(" uploaded was not completed there is an error please try again ")</script>';
}
}
?>

	 <form style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); margin-top: 40px; margin-left:195px; margin-right:195px; border: 1px solid #ccc; padding: 30px; border-radius: 10px;" class="mb-4" method="post" enctype="multipart/form-data" action="muni.php" autocomplete="off">
  <h2 style="margin: 10px; margin-bottom: 30px;" class="h1-responsive font-weight-bold text-center my-4">REGISTER COMPLAINT</h2>
  <div class="row">
      <div class="col-md-6">
        <div class="md-form mb-0">
  <label>Category</label>
  <select class="form-control" aria-label="Default select example" name="cat">

  <?php
  $qry1=mysqli_query($conn,"select * from muni_add");
  while ($row=mysqli_fetch_array($qry1))
  {
    ?>
    <option><?php echo $row['cat']; ?></option>

  <?php
   }
   ?>
 </select>
    </div>
  </div>
      <div class="col-md-6">
        <div class="md-form mb-0">
     <label>Complaint Title</label>
     <input type="text" name="ctitle" class="form-control" placeholder="Type the complaint title...." required>
   </div>
 </div>
</div><br>
      <div class="form-group">
     <label>Complaint Details</label>
     <input type="text" name="cdetail" class="form-control" placeholder="Type your complaints here...." required>
   </div>
  
<div class="row">
      <div class="col-md-6">
        <div class="md-form mb-0">
  <label>District</label>
  <select class="form-control" aria-label="Default select example" name="district" id="district" required>
<option value="Ariyalur">Ariyalur</option>
<option value="Chennai">Chennai</option>
<option value="Coimbatore">Coimbatore</option>
<option value="Cuddalore">Cuddalore</option>
<option value="Dharmapuri">Dharmapuri</option>
<option value="Dindigul">Dindigul</option>
<option value="Erode">Erode</option>
<option value="Kanchipuram">Kanchipuram</option>
<option value="Kanyakumari">Kanyakumari</option>
<option value="Karur">Karur</option>
<option value="Krishnagiri">Krishnagiri</option>
<option value="Madurai">Madurai</option>
<option value="Nagapattinam">Nagapattinam</option>
<option value="Namakkal">Namakkal</option>
<option value="Nilgiris">Nilgiris</option>
<option value="Perambalur">Perambalur</option>
<option value="Pudukkottai">Pudukkottai</option>
<option value="Ramanathapuram">Ramanathapuram</option>
<option value="Salem">Salem</option>
<option value="Sivagangai">Sivagangai</option>
<option value="Thanjavur">Thanjavur</option>
<option value="Theni">Theni</option>
<option value="Thoothukudi">Thoothukudi</option>
<option value="Tiruchirappalli">Tiruchirappalli</option>
<option value="Tirunelveli">Tirunelveli</option>
<option value="Tiruppur">Tiruppur</option>
<option value="Tiruvallur">Tiruvallur</option>
<option value="Tiruvannamalai">Tiruvannamalai</option>
<option value="Tiruvarur">Tiruvarur</option>
<option value="Vellore">Vellore</option>
<option value="Viluppuram">Viluppuram</option>
<option value="Virudhunagar">Virudhunagar</option>
</select>
</div>
</div>
      <div class="col-md-6">
        <div class="md-form mb-0">
<label>Place</label>
<input type="text" name="place" class="form-control" placeholder="Type the problem place" required>
</div>
</div>
</div>
<br>
<div class="row">
  <div class="col-md-6">
        <div class="md-form mb-0">
     <label>Complaint related Doc</label>
  <input class="form-control" type="file" name="cdoc" accept=".doc,.docx,.ppt,.pptx,.pdf" required>
</div>
</div>
</div>
<br>
<div class="row">
  <div class="col-md-6">
        <div class="md-form mb-0">
<label>Complaint related Image(for posts)</label>
<input class="form-control" type="file" name="cimage" accept="image/*" required>
</div>
</div>
</div>
     <button class="log" type="submit" name="btn">submit</button><br><br>
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


</body>
</html>