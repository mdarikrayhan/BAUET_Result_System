<?php
 include('../includes/dbconnection.php');
include('../includes/session.php');

$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM tblassignedadmin WHERE staffId='$delid'");

if ($query == TRUE) {

$ret=mysqli_query($con,"update tbladmin set isAssigned='0' where staffId='$delid'");

    if($ret == TRUE){

        echo "<script type = \"text/javascript\">
        window.location = (\"viewAssignedAdmin.php\")
        </script>";  

        }
        else{

            
        }
}
else{


}


   

?>

