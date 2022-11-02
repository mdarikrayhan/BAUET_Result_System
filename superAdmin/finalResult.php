
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/functions.php');

    if(isset($_GET['matricNo'])){

        $matricNo = $_GET['matricNo'];

        $stdQuery=mysqli_query($con,"select * from tblstudent where matricNo = '$matricNo'");                        
        $rowStd = mysqli_fetch_array($stdQuery);

    
    }
    else{
        echo "<script type = \"text/javascript\">
        window.location = (\"studentList2.php\");
        </script>";
    }



//------------------------------------ COMPUTE CGPA -----------------------------------------------

if (isset($_POST['compute'])){

     $id = $_POST['Id']; //Array of Id's
     $N = count($id);

    $totalCourseUnit = $_POST['totalCourseUnit'];
    $totalScoreGradePoint = $_POST['totalScoreGradePoint'];
    $dateAdded = date("Y-m-d");

    $overAllCourseUnit = 0;
    $overAlltotalScoreGradePoint = 0;
    $cgpa = 0;

    for($i = 0; $i < $N; $i++)
    {
        $totalCourseUnit[$i]; //each totalCourseUnit
        $totalScoreGradePoint[$i]; // each totalScoreGradePoint

        $overAllCourseUnit += $totalCourseUnit[$i]; //adds up all the totalCourseUnits
        $overAlltotalScoreGradePoint += $totalScoreGradePoint[$i]; //adds up all the totalScoreGradePoint
      
    }

        $cgpa = round(($overAlltotalScoreGradePoint / $overAllCourseUnit), 2); //computes the student CGPA (Cumulative Grade Point Average) by dividing the overall course unit and the over score grade point
        $classOfDiploma = getClassOfDiploma($cgpa); //function to get the Honour for the CGPA

        $que=mysqli_query($con,"select * from tblcgparesult where matricNo ='$matricNo'");
        $ret=mysqli_fetch_array($que);

        if($ret > 0){ //update the record if record exists

            $que=mysqli_query($con,"update tblcgparesult set cgpa='$cgpa', classOfDiploma='$classOfDiploma' where matricNo='$matricNo'");

            if($que){
                
                 $alertStyle ="alert alert-success";
                 $statusMsg="CGPA Computed and Updated Successfully!";
            }
            else {

                $alertStyle ="alert alert-danger";
                $statusMsg="An Error Occurred!";
            }
        }
        else{ //insert new record

                $querys = mysqli_query($con,"insert into tblcgparesult(matricNo,cgpa,classOfDiploma,dateAdded) 
                value('$matricNo','$cgpa','$classOfDiploma','$dateAdded')");

                if ($querys) {

                    $alertStyle ="alert alert-success";
                    $statusMsg="CGPA Computed Successfully!";
                }
                else
                {
                    $alertStyle ="alert alert-danger";
                    $statusMsg="An error Occurred!";
                }
            }
    

        // echo $cgpa.'<br>';
        // echo $classOfDiploma.'<br>';
        // echo $overAllCourseUnit.'<br>';
        // echo $overAlltotalScoreGradePoint.'<br>';

   

       
   
}//end of POST


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

</head>
<body>
    <!-- Left Panel -->
        <?php include 'includes/leftMenu.php';?>
   <!-- Left Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'includes/header.php';?>  
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          
                        </div> <!-- .card -->
                    </div><!--/.col-->
               
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h4 align="center">Compute CGPA for <?php echo  $rowStd['firstName'].' '.$rowStd['lastName'].' '.$rowStd['otherName'];?></h></strong>
                            </div>
                            <form method="post">
                            <div class="card-body">
                             <div class="<?php if(isset($alertStyle)){echo $alertStyle;}?>" role="alert"><?php if(isset($statusMsg)){echo $statusMsg;}?></div>
                                <table class="table table-hover table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>FullName</th>
                                            <th>Student ID</th>
                                            <th>Batch</th>
                                            <th>Semester</th>
                                            <th>Session</th>
                                            <th>Department</th>
                                            <th>Total Course Credit</th>
                                            <th>Total Score Grade Point</th>
                                            <th>GPA</th>
                                            <th>Honour</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
                $ret=mysqli_query($con,"SELECT tbllevel.levelName,tblfaculty.facultyName,tbldepartment.departmentName,tblsemester.semesterName,
                tblsession.sessionName,tblstudent.firstName,tblstudent.lastName,tblstudent.matricNo, tblfinalresult.totalCourseUnit,tblfinalresult.totalScoreGradePoint,
                tblfinalresult.gpa,tblfinalresult.classOfDiploma,tblfinalresult.dateAdded,tblfinalresult.Id
                from tblfinalresult 
                INNER JOIN tbllevel ON tbllevel.Id = tblfinalresult.levelId
                INNER JOIN tblsemester ON tblsemester.Id = tblfinalresult.semesterId
                INNER JOIN tblsession ON tblsession.Id = tblfinalresult.sessionId
                INNER JOIN tblstudent ON tblstudent.matricNo = tblfinalresult.matricNo
                INNER JOIN tblfaculty ON tblfaculty.Id = tblstudent.facultyId
                INNER JOIN tbldepartment ON tbldepartment.Id = tblstudent.departmentId
                where tblfinalresult.matricNo ='$matricNo'");

                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['firstName'].' '.$row['lastName'];?></td>
                <td><?php  echo $row['matricNo'];?></td>
                <td><?php  echo $row['levelName'];?></td>
                <td><?php  echo $row['semesterName'];?></td>
                <td><?php  echo $row['sessionName'];?></td> 
                <td><?php  echo $row['departmentName'];?></td>
                <td><?php  echo $row['totalCourseUnit'];?></td>
                <td><?php  echo $row['totalScoreGradePoint'];?></td>
                <td><?php  echo $row['gpa'];?></td>
                <td><?php  echo $row['classOfDiploma'];?></td>
                <td><?php  echo $row['dateAdded'];?></td>
                <input id="" value="<?php echo $row['Id'];?>" name="Id[]"  type="hidden" class="form-control" >
                <input id="" value="<?php echo $row['totalCourseUnit'];?>" name="totalCourseUnit[]"  type="hidden" class="form-control" >
                <input id="" value="<?php echo $row['totalScoreGradePoint'];?>" name="totalScoreGradePoint[]"  type="hidden" class="form-control" >
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
                                                            
                </tbody>
            </table>
            <button type="submit" name="compute" class="btn btn-success">Compute CGPA</button>
            </form>
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
