<?php

        include('../includes/dbconnection.php');

        $deptId = intval($_GET['deptId']);//gradeId

        $queryss=mysqli_query($con,"select * from tblstudent where departmentId=".$deptId." ORDER BY firstName ASC");                        
        $countt = mysqli_num_rows($queryss);

        $crsquery=mysqli_query($con,"select * from tblcourse where departmentId=".$deptId." ORDER BY courseTitle ASC");                        
        $counttCrs = mysqli_num_rows($crsquery);


        echo' <div class="row">
        <div class="col-6">
        <div class="form-group">';

        echo '<label for="select" class=" form-control-label">Student</label>
        <select required name="cardId" class="custom-select form-control">';
        echo'<option value="">--Select Student--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['cardId'].'" >'.$row['firstName'].' '.$row['lastName'].' '.$row['otherName'].'</option>';
        }
        echo '</select>';

        echo' </div>
        </div>
        <div class="col-6">
        <div class="form-group">';

        echo '<label for="select" class=" form-control-label">Course</label>
        <select required name="courseId" class="custom-select form-control">';
        echo'<option value="">--Select Course--</option>';
        while ($rows = mysqli_fetch_array($crsquery)) {
        echo'<option value="'.$rows['courseId'].'" >'.$rows['courseTitle'].' </option>';
        }
        echo '</select>';  

        echo'</div>
        </div>
        </div>';



                    
       
      

?>

