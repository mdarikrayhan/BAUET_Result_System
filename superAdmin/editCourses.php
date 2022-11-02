
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    error_reporting(0);


if(isset($_GET['editCourseId'])){

$_SESSION['editCourseId'] = $_GET['editCourseId'];

$query = mysqli_query($con,"select * from tblcourse where courseCode='$_SESSION[editCourseId]'");
$rowi = mysqli_fetch_array($query);

}

else{

echo "<script type = \"text/javascript\">
    window.location = (\"createCourses.php\")
    </script>"; 
}


if(isset($_POST['submit'])){

     $alertStyle ="";
      $statusMsg="";

    $courseTitle=$_POST['courseTitle'];
    $courseCode=$_POST['courseCode'];
    $levelId=$_POST['levelId'];
    $semesterId=$_POST['semesterId'];
    $courseUnit=$_POST['courseUnit'];
    $departmentId=$_POST['departmentId'];
    $facultyId=$_POST['facultyId'];
    $dateAdded = date("Y-m-d");


    $query=mysqli_query($con,"update tblcourse set courseTitle='$courseTitle',courseCode='$courseCode',courseUnit='$courseUnit',facultyId='$facultyId', departmentId='$departmentId', levelId='$levelId',semesterId='$semesterId'
    where courseCode='$_SESSION[editCourseId]'");

    if ($query) {
        
       $alertStyle ="alert alert-success";
       $statusMsg="Course Edited Successfully!";
    }
    else
    {
      $alertStyle ="alert alert-danger";
      $statusMsg="An error Occurred!";
    }
}
  ?>

<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php';?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

<script>

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


function showValues(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCall2.php?fid="+str,true);
        xmlhttp.send();
    }
}

function showLecturer(str) {
    if (str == "") {
        document.getElementById("txtHintt").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHintt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCallLecturer.php?deptId="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
    <!-- Left Panel -->
    <?php $page="courses"; include 'includes/leftMenu.php';?>

   <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php include 'includes/header.php';?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Courses</a></li>
                                    <li class="active">Add Courses</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">Add New Course</h2></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></div>
                                         <form method="Post" action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Course Title</label>
                                                        <input id="" name="courseTitle" type="text" class="form-control cc-exp" value="<?php echo $rowi['courseTitle'];?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Course Title">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Course Code</label>
                                                        <input id="" name="courseCode" type="text" class="form-control cc-exp" value="<?php echo $rowi['courseCode'];?>" Required placeholder="Course Code">
                                                        <!-- <input id="" maxlength="4" onkeypress="return isNumber(event)" name="courseId" type="text" class="form-control cc-cvc" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Course ID should start from 0001"> -->
                                                        </div>
                                                    </div>
                                                    <div>
                                                <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Course Credit</label>
                                                        <input id="" name="courseUnit" type="text" class="form-control cc-exp" value="<?php echo $rowi['courseUnit'];?>" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Course Credit">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                     <label for="x_card_code" class="control-label mb-1">Batch</label>
                                                    <?php 
                                                    $query=mysqli_query($con,"select * from tbllevel");                        
                                                    $count = mysqli_num_rows($query);
                                                    if($count > 0){                       
                                                        echo ' <select required name="levelId" class="custom-select form-control">';
                                                        echo'<option value="">--Select Batch--</option>';
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        echo'<option value="'.$row['Id'].'" >'.$row['levelName'].'</option>';
                                                            }
                                                                echo '</select>';
                                                            }
                                                    ?>   
                                                </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Semester</label>
                                                    <?php 
                                                    $query=mysqli_query($con,"select * from tblsemester");                        
                                                    $count = mysqli_num_rows($query);
                                                    if($count > 0){                       
                                                        echo ' <select required name="semesterId" class="custom-select form-control">';
                                                        echo'<option value="">--Select Semester--</option>';
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        echo'<option value="'.$row['Id'].'" >'.$row['semesterName'].'</option>';
                                                            }
                                                                echo '</select>';
                                                            }
                                                    ?>                                                       
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                     <label for="x_card_code" class="control-label mb-1">Faculty</label>
                                                    <?php 
                                                        $query=mysqli_query($con,"select * from tblfaculty ORDER BY facultyName ASC");                        
                                                        $count = mysqli_num_rows($query);
                                                        if($count > 0){                       
                                                            echo ' <select required name="facultyId" onchange="showValues(this.value)" class="custom-select form-control">';
                                                            echo'<option value="">--Select Faculty--</option>';
                                                            while ($row = mysqli_fetch_array($query)) {
                                                            echo'<option value="'.$row['Id'].'" >'.$row['facultyName'].'</option>';
                                                                }
                                                                    echo '</select>';
                                                                }
                                                    ?>            
                                                               
                                                </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                    <?php
                                                        echo"<div id='txtHint'></div>";
                                                     ?>   
                                                                                                            
                                                </div>
                                                </div>
                                               
                                            </div>
                                                <button type="submit" name="submit" class="btn btn-primary">Update Course</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
               

                <br><br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">All Courses</h2></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Credit</th>
                                            <th>Batch</th>
                                            <th>Faculty</th>
                                            <th>Department</th>
                                             <th>Semester</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
        $ret=mysqli_query($con,"SELECT tblcourse.courseCode,tblcourse.courseTitle,tblcourse.dateAdded,
       tblcourse.courseUnit,tbllevel.levelName,tblfaculty.facultyName,tbldepartment.departmentName,tblsemester.semesterName
        from tblcourse 
        INNER JOIN tbllevel ON tbllevel.Id = tblcourse.levelId
        INNER JOIN tblsemester ON tblsemester.Id = tblcourse.semesterId
        INNER JOIN tblfaculty ON tblfaculty.Id = tblcourse.facultyId
        INNER JOIN tbldepartment ON tbldepartment.Id = tblcourse.departmentId");

        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
                            ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['courseTitle'];?></td>
                <td><?php  echo $row['courseCode'];?></td>
                <td><?php  echo $row['courseUnit'];?></td>
                <td><?php  echo $row['levelName'];?></td>
                <td><?php  echo $row['facultyName'];?></td>
                <td><?php  echo $row['departmentName'];?></td>
                <td><?php  echo $row['semesterName'];?></td>
                <td><?php  echo $row['dateAdded'];?></td>
                <td><a href="editCourses.php?editCourseId=<?php echo $row['courseCode'];?>" title="Edit Details"><i class="fa fa-edit fa-1x"></i></a>
               <a onclick="return confirm('Are you sure you want to delete?')" href="deleteCourse.php?delid=<?php echo $row['courseCode'];?>" title="Delete Course"><i class="fa fa-trash fa-1x"></i></a></td>
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
                                                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- end of datatable -->

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

        <?php include 'includes/footer.php';?>


</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>

<script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

      // Menu Trigger
      $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();   		 
            if (windowWidth<1010) { 
                $('body').removeClass('open'); 
                if (windowWidth<760){ 
                $('#left-panel').slideToggle(); 
                } else {
                $('#left-panel').toggleClass('open-menu');  
                } 
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');  
            } 
                
            }); 

      
  </script>

</body>
</html>
