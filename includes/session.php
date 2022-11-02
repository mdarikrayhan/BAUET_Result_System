
<?php
include('dbconnection.php');
session_start(); 

if (isset($_SESSION['staffId']))
{
    $staffId = $_SESSION['staffId'];

}
else if(isset($_SESSION['matricNo'])){

   $matricNo = $_SESSION['matricNo'];
}

else{
  echo "<script type = \"text/javascript\">
  window.location = (\"../index.php\");
  </script>";

}

// $expiry = 1800 ;//session expiry required after 30 mins
// if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {

//     session_unset();
//     session_destroy();
//     echo "<script type = \"text/javascript\">
//           window.location = (\"../index.php\");
//           </script>";

// }
// $_SESSION['LAST'] = time();
    
?>