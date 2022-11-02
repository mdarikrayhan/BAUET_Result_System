
<?php
$staffId = $_SESSION['staffId'];
$query = mysqli_query($con,"select * from tbladmin where staffId='$staffId'");
$row = mysqli_fetch_array($query);
$staffFullName = $row['firstName'].' '.$row['lastName'];
?>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="menu-title">ADMIN: &nbsp;&nbsp;&nbsp;<?php echo $staffFullName;?></li>
                    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>">
                        <a href="index.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                  
                        <!-- <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Admin</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-plus"></i><a href="createAdmin.php">Add Administrator</a></li>
                                <li><i class="fa fa-eye"></i><a href="viewAdmin.php">View Administrator</a></li>
                            </ul>
                        </li> -->
                 
                 <li class="menu-item-has-children dropdown <?php if($page=='session'){ echo 'active'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Session</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="createSession.php">Add New Session</a></li>
                    </ul>
                </li>
                   
                   <li class="menu-title">Faculty and Dept.</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='faculty'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Faculty</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createFaculty.php">Add New Faculty</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewFaculty.php">View Faculty</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown <?php if($page=='department'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Departments</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createDepartment.php">Add New Dept.</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewDepartment.php">View Department</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Student Section</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='student'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Student</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createStudent.php">Add New Student</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewStudent.php">View Student</a></li>
                        </ul>
                    </li>

                    

                     <li class="menu-item-has-children dropdown <?php if($page=='courses'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Courses</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createCourses.php">Add New Course</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewCourses.php">View Courses</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Results and Grading</li>
                      <li class="menu-item-has-children dropdown <?php if($page=='result'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Result</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="studentList.php">Compute GPA</a></li>
                            <li><i class="fa fa-plus"></i> <a href="studentList2.php">Compute CGPA</a></li>
                            <li><i class="fa fa-plus"></i> <a href="studentList3.php">View/Print Result</a></li>                     
                            <li><i class="fa fa-plus"></i> <a href="gradingCriteria.php">View Grading Criteria</a></li>

                        </ul>
                    </li>

                    <li class="menu-title">Account</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='profile'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="menu-icon fa fa-key"></i> <a href="changePassword.php">Change Password</a></li> -->
                            <li><i class="menu-icon fa fa-user"></i> <a href="updateProfile.php">Update Profile</a></li>
                            </li>
                        </ul>
                         <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>