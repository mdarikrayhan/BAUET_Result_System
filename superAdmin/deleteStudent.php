<?php
 include('../includes/dbconnection.php');
include('../includes/session.php');

$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM tblstudent WHERE matricNo='$delid'");

if ($query == TRUE) {

        echo "<script type = \"text/javascript\">
        window.location = (\"viewStudent.php\")
        </script>";  
}
else{

echo "<script type = \"text/javascript\">
        window.location = (\"createStudent.php\")
        </script>";  

}


?>

