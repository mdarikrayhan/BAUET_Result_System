<?php

    include('../includes/dbconnection.php');
    $id = intval($_GET['id']);//gradeId

       $queryss=mysqli_query($con,"select * from tblstaff where Id=".$id."");                        
       $countt = mysqli_num_rows($queryss);
       $row = mysqli_fetch_array($queryss);

       $query=mysqli_query($con,"select * from tblroles where Id=".$row['roleId']."");                        
       $count = mysqli_num_rows($query);
      $roww = mysqli_fetch_array($query);

        echo '<label for="select" class=" form-control-label">Staff Role</label>
        <input id="" name="roleName" readonly type="text" class="form-control" value="'.$roww['roleName'].'"> 
        <input id="" name="roleId" type="hidden" class="form-control" value="'.$row['roleId'].'">
        <input id="" name="staffId" type="hidden" class="form-control" value="'.$row['staffId'].'">'; //gets the staffId


?>

