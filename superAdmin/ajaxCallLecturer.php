<?php

    include('../includes/dbconnection.php');

    $deptId = intval($_GET['deptId']);//gradeId


        $queryss=mysqli_query($con,"SELECT tblassignedstaff.dateAssigned,tblassignedstaff.staffId, tblstaff.staffId,tblstaff.firstName, tblstaff.lastName, tblstaff.otherName
        from tblassignedstaff 
        INNER JOIN tblstaff ON tblstaff.staffId = tblassignedstaff.staffId
        where departmentId = '$deptId'");
        $countt = mysqli_num_rows($queryss);


        // $queryss=mysqli_query($con,"select * from tblassignedstaff where departmentId=".$deptId." ORDER BY staffId ASC");                        
        // $countt = mysqli_num_rows($queryss);

        if($countt > 0){                       
        echo '<label for="select" class=" form-control-label">Select Lecturer</label>
        <select required name="staffId" class="custom-select form-control">';
        echo'<option value="">--Select Lecturer--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['staffId'].'" >'.$row['firstName'].' '.$row['lastName'].'</option>';
        }
        echo '</select>';
        }

?>

