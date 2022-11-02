<?php

    include('../includes/dbconnection.php');

    $deptId = intval($_GET['deptId']);//gradeId

        $queryss=mysqli_query($con,"select * from tblcourse where departmentId=".$deptId." ORDER BY courseTitle ASC");                        
        $countt = mysqli_num_rows($queryss);

        if($countt > 0){                       
        echo '<label for="select" class=" form-control-label">Course</label>
        <select required name="courseId" class="custom-select form-control">';
        echo'<option value="">--Select Course--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['courseId'].'" >'.$row['courseTitle'].'</option>';
        }
        echo '</select>';
        }

?>

