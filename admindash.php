<?php
include("dbconnect.php");
session_start();

$status="not processed yet";
$status1="closed";

  $qry=mysqli_query($conn,"select * from regcomplaint WHERE status='$status'");
  if ($qry) {
    $count=mysqli_num_rows($qry);
  }
    $qry1=mysqli_query($conn,"select * from regcomplaint WHERE status='$status1'");
    if ($qry1) {
    $count1=mysqli_num_rows($qry1);
  }

?>
<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
  </head>
  <body>
    <header>
		<div>
      <img src="logo.jpg" alt="Avatar" width="50px" height="50px">
      <div>Admin</div>
		<form method="get"><button name="logout">Logout</button></form></div>  
	</header>
  <div>
    
    <h2>COMPLAINT STATUS</h2>
    <div>
<a href="notprocess.php"><div>not processed yet<br><?php echo $count; ?></div></a>
<a href="close.php"><div>closed complaint<br><?php echo $count1; ?></div></a>
</div>
  </div>

	<div>
		    <nav>
      <ul>
      	<li><a href="admindash.php">dashboard</a></li>
        <li><a href="#">Manage Complaints <span>&rsaquo;</span></a>
            <ul>
              <li><a href="notprocess.php"> Not Process Yet Complaints</a></li>
              <li><a href="close.php">Closed Complaints</a></li>
            </ul>
        </li>
        <li><a href="category.php">add category</a></li>
        <li><a href="mcategory.php">manage category</a></li>
        <li><a href="umanage.php">manage users</a></li>
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
      </ul>
    </nav>
	</div>

  </body>
</html>