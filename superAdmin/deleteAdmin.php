<?php
 include('../includes/dbconnection.php');
include('../includes/session.php');

$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM tbladmin WHERE staffId='$delid'");


if ($query === TRUE) {

    $query2 = mysqli_query($con,"DELETE FROM tblassignedadmin WHERE staffId='$delid'");

    if ($query2 === TRUE) {

    echo "<script type = \"text/javascript\">
    window.location = (\"viewAdmin.php\")
    </script>";  
    
    }
}

?>

