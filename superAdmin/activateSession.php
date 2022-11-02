<?php
    include('../includes/dbconnection.php');
    include('../includes/session.php');

    $activateId = $_GET['activateId'];

    $query1=mysqli_query($con,"update tblsession set isActive = 0 where isActive = 1");
    if($query1 == TRUE){

        $query=mysqli_query($con,"update tblsession set isActive = 1 where Id = '$activateId'");
        if ($query === TRUE) {

                echo "<script type = \"text/javascript\">
                window.location = (\"createSession.php?status=success\")
                </script>";  
        }
        else{

            echo "<script type = \"text/javascript\">
            window.location = (\"createSession.php?status=fail\")
            </script>";  
        }

    }
    else{

            echo "<script type = \"text/javascript\">
            window.location = (\"createSession.php?status=fail\")
            </script>";  
        }

?>

