<?php

    include('../includes/dbconnection.php');
    $sid = intval($_GET['sid']);//gradeId

       $queryss=mysqli_query($con,"select * from tblstaff where Id=".$sid."");                        
       $countt = mysqli_num_rows($queryss);
       $row = mysqli_fetch_array($queryss);

       $staffId = $row['staffId'];

       $ret=mysqli_query($con,"SELECT tblassignedstaff.staffId, tblroles.roleName, tbldepartment.departmentName, tblfaculty.facultyName
            from tblassignedstaff
            INNER JOIN tblroles ON tblroles.Id = tblassignedstaff.roleId
            INNER JOIN tbldepartment ON tbldepartment.Id = tblassignedstaff.departmentId
            INNER JOIN tblfaculty ON tblfaculty.Id = tblassignedstaff.facultyId
            where staffId = '$staffId'");    
       $rows=mysqli_fetch_array($ret);

        echo '
        <input id="" name="staffId" type="hidden" class="form-control" value="'.$staffId.'">
        <span>Staff ID: <b>'.$staffId.'</b></span><br>
        <span>Staff Position: <b>'.$rows['roleName'].'</b></span><br>
        <span>Staff Faculty: <b>'.$rows['facultyName'].'</b></span><br>
        <span>Staff Department: <b>'.$rows['departmentName'].'</b></span>';

?>

