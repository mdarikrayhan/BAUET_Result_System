<?php
 include('../includes/dbconnection.php');
include('../includes/session.php');

$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM tblsession WHERE Id='$delid'");


if ($query === TRUE) {

        echo "<script type = \"text/javascript\">
        window.location = (\"createSession.php\")
        </script>";  
}
else{


}

?>

