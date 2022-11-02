<?php
 include('../includes/dbconnection.php');
include('../includes/session.php');

$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM tblfaculty WHERE Id='$delid'");


if ($query === TRUE) {

    $que = mysqli_query($con,"DELETE FROM tbldepartment WHERE facultyId='$delid'");

    if($que == TRUE){

        echo "<script type = \"text/javascript\">
        window.location = (\"viewFaculty.php\")
        </script>";  

        }
        else{

            
        }
}
else{


}


   

?>

