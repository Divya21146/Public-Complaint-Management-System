<?php
include("dbconnect.php");
session_start();
$amail=$_SESSION['amail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading...</title>
    <style>
       
/*loader ..........................................................................................................*/


.loader-wrapper{

  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-colour: #fff;
  display:flex;
  justify-content:center;
}


.loader {
  width: 48px;
  height: 48px;
  margin: auto;
  position: relative;
  background-colour: #fff;
}

.loader:before {
  content: '';
  width: 48px;
  height: 5px;
  background: #f0808050;
  position: absolute;
  top: 60px;
  left: 0;
  border-radius: 50%;
  animation: shadow324 0.5s linear infinite;
  background-colour: #fff;
}

.loader:after {
  content: '';
  width: 100%;
  height: 100%;
  background: #f08080;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 4px;
  animation: jump7456 0.5s linear infinite;
  background-colour: #fff;
}

@keyframes jump7456 {
  15% {
    border-bottom-right-radius: 3px;
  }

  25% {
    transform: translateY(9px) rotate(22.5deg);
  }

  50% {
    transform: translateY(18px) scale(1, .9) rotate(45deg);
    border-bottom-right-radius: 40px;
  }

  75% {
    transform: translateY(9px) rotate(67.5deg);
  }

  100% {
    transform: translateY(0) rotate(90deg);
  }
}

@keyframes shadow324 {

  0%,
    100% {
    transform: scale(1, 1);
  }

  50% {
    transform: scale(1.2, 1);
  }
}
    </style>
</head>
<body>


<div class="loader-wrapper">
  <div class="loader"></div>
</div>
    <script>
   
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = "t_notify.php";
        }, 3000);
    </script>
</body>
</html>
