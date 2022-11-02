
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    error_reporting(0);

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
</script>
</head>
<body>
    <!-- Left Panel -->
    <?php $page="result"; include 'includes/leftMenu.php';?>

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
                                    <li><a href="#">Result</a></li>
                                    <li class="active">My Result</li>
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
                                <strong class="card-title"><h3 align="center">Result</h3></strong>
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
                                                      <label for="x_card_code" class="control-label mb-1">Level</label>
                                                    <?php 
                                                $query=mysqli_query($con,"select * from tbllevel");                        
                                                $count = mysqli_num_rows($query);
                                                if($count > 0){                       
                                                    echo ' <select required name="levelId" class="custom-select form-control">';
                                                    echo'<option value="">--Select Level--</option>';
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    echo'<option value="'.$row['Id'].'" >'.$row['levelName'].'</option>';
                                                        }
                                                            echo '</select>';
                                                        }
                                                ?>   
                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                     <label for="x_card_code" class="control-label mb-1">Session</label>
                                                    <?php 
                                                    $query=mysqli_query($con,"select * from tblsession where isActive = 1");                        
                                                    $count = mysqli_num_rows($query);
                                                    if($count > 0){                       
                                                        echo ' <select required name="sessionId" class="custom-select form-control">';
                                                        echo'<option value="">--Select Session--</option>';
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        echo'<option value="'.$row['Id'].'" >'.$row['sessionName'].'</option>';
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
                                                    <label for="x_card_code" class="control-label mb-1">Semester</label>
                                                    <?php 
                                                    $query=mysqli_query($con,"select * from tblsemester ORDER BY semesterName ASC");                        
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
                                                
                                             </div>
                                                <div>
                                                <button type="submit" name="submit" class="btn btn-success">View</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
               <?php
 if(isset($_POST['submit'])){

                $levelId = $_POST['levelId'];
                $sessionId = $_POST['sessionId'];
                $semesterId = $_POST['semesterId'];

                $semesterQuery=mysqli_query($con,"select * from tblsemester where Id = '$semesterId'");
                $rowSemester = mysqli_fetch_array($semesterQuery);

                $sessionQuery=mysqli_query($con,"select * from tblsession where Id = '$sessionId'");
                $rowSession = mysqli_fetch_array($sessionQuery);

                $levelQuery=mysqli_query($con,"select * from tbllevel where Id = '$levelId'");
                $rowLevel = mysqli_fetch_array($levelQuery);
 }

               ?>

                <br><br>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3 align="center"><?php echo $rowLevel['levelName'];?>&nbsp;<?php echo $rowSemester['semesterName'];?> Semester Result &nbsp;<?php echo $rowSession['sessionName'];?> Session</h3></strong>
                            </div>
                            <div class="card-body">
                               <table class="table table-hover table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course</th>
                                            <th>Course Code</th>
                                            <th>Credit</th>
                                            <th>Score</th>
                                            <th>Grade</th>
                                            <th>Grade Point</th>
                                            <th>Total GradePoint</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php

            if(isset($_POST['submit'])){

                $levelId = $_POST['levelId'];
                $sessionId = $_POST['sessionId'];
                $semesterId = $_POST['semesterId'];

                $ret=mysqli_query($con,"SELECT tblresult.matricNo,tblresult.levelId,tblresult.courseCode,tblresult.courseUnit,tblresult.score,tblresult.scoreGradePoint,
                tblresult.scoreLetterGrade,tblresult.totalScoreGradePoint,tblresult.dateAdded,tblcourse.courseTitle,
                tbllevel.levelName,tblsemester.semesterName,tblsession.sessionName
                from tblresult
                INNER JOIN tbllevel ON tbllevel.Id = tblresult.levelId
                INNER JOIN tblcourse ON tblcourse.courseCode = tblresult.courseCode
                INNER JOIN tblsemester ON tblsemester.Id = tblresult.semesterId
                INNER JOIN tblsession ON tblsession.Id = tblresult.sessionId
                where tblresult.levelId ='$levelId' and tblresult.sessionId ='$sessionId' 
                and tblresult.semesterId ='$semesterId' and tblresult.matricNo ='$matricNo'");
                $cnt=1;  $totalCourseUnit = 0;  $totalScoreGradePoint = 0;
                while ($row=mysqli_fetch_array($ret)) {
                    if($row['scoreLetterGrade'] == "F"){$color = 'red';}else{$color = '';}
                ?>
                <tr >
                <td bgcolor="<?php echo $color;?>"><?php  echo $cnt;?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseTitle'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseCode'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseUnit'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['score'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['scoreLetterGrade'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['scoreGradePoint'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['totalScoreGradePoint'];?></td>
                </tr>
                <?php 
                    $cnt=$cnt+1;
                    $courseUnit = $row['courseUnit'];
                    $scoreGradePoint = $row['totalScoreGradePoint'];
                    $totalCourseUnit += $courseUnit;
                    $totalScoreGradePoint += $scoreGradePoint;
                }
            }?>
                <tr>
                <td bgcolor=""> </td>
                <td bgcolor=""> </td>
                <td bgcolor=""> </td>
                <td bgcolor="#F9D342"><?php echo $totalCourseUnit;?></td>
                <td bgcolor=""> </td>
                <td bgcolor=""> </td>
                <td bgcolor=""> </td>
                <td bgcolor="#F9D342"><?php echo $totalScoreGradePoint;?></td>
                </tr>                                                          
                </tbody>
            </table>
<!-------------------------- FROM THE FINAL RESULT TABLE --------------------------->
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>Total Course Credit</th>
                    <th>Total Grade Point</th>
                    <th>GPA</th>
                    <th>Honour</th>
                </tr>
            </thead>
            <tbody>
        <?php

     if (isset($_POST['submit'])){

                $levelId = $_POST['levelId'];
                $sessionId = $_POST['sessionId'];
                $semesterId = $_POST['semesterId'];

        $ret=mysqli_query($con,"SELECT tblfinalresult.matricNo,tblfinalresult.levelId,tblfinalresult.totalCourseUnit,tblfinalresult.totalScoreGradePoint,tblfinalresult.gpa,
        tblfinalresult.classOfDiploma,tblfinalresult.dateAdded,
        tbllevel.levelName,tblsemester.semesterName,tblsession.sessionName
        from tblfinalresult
        INNER JOIN tbllevel ON tbllevel.Id = tblfinalresult.levelId
        INNER JOIN tblsemester ON tblsemester.Id = tblfinalresult.semesterId
        INNER JOIN tblsession ON tblsession.Id = tblfinalresult.sessionId
        where tblfinalresult.levelId ='$levelId' and tblfinalresult.sessionId ='$sessionId' 
        and tblfinalresult.semesterId ='$semesterId' and tblfinalresult.matricNo ='$matricNo'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
        ?>
        <tr>
        <td bgcolor="#F9D342"><?php  echo $row['totalCourseUnit'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['totalScoreGradePoint'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['gpa'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['classOfDiploma'];?></td>
        </tr>
        <?php 
        $cnt=$cnt+1;
        }
    }?>
                                                                                    
                    </tbody>
                </table>
                <a href="studentPrintResult.php?semesterId=<?php echo $semesterId;?>&matricNo=<?php echo $matricNo;?>&levelId=<?php echo $levelId;?>&sessionId=<?php echo $sessionId;?>" class="btn btn-danger">Print Result</a>
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
