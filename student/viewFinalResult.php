
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/functions.php');

    if(isset($matricNo)){
       
        $stdQuery=mysqli_query($con,"select * from tblstudent where matricNo = '$matricNo'");                        
        $rowStd = mysqli_fetch_array($stdQuery);

    }
    else{
        echo "<script type = \"text/javascript\">
        window.location = (\"index.php\");
        </script>";
    }



//------------------------------------ COMPUTE RESULT -----------------------------------------------

if (isset($_POST['compute'])){


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
     
         <?php $page="result"; include 'includes/leftMenu.php';?>

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
                                <strong class="card-title"><h4 align="center"><?php echo  $rowStd['firstName'].' '.$rowStd['lastName']?> - Final Result</h></strong>
                            </div>
                            <div class="card-body">
                             <div class="<?php if(isset($alertStyle)){echo $alertStyle;}?>" role="alert"><?php if(isset($statusMsg)){echo $statusMsg;}?></div>
                             
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Student ID</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>CGPA</th>
                    <th>Honour</th>
                </tr>
            </thead>
            <tbody>
        <?php

        $ret=mysqli_query($con,"SELECT tblstudent.Id, tblstudent.firstName, tblstudent.lastName, tblstudent.otherName,tblstudent.matricNo,
        tblstudent.dateCreated,tblfaculty.facultyName,tbldepartment.departmentName,tblcgparesult.cgpa,tblcgparesult.classOfDiploma,
        tblstudent.facultyId,tblstudent.departmentId
        from tblcgparesult
        INNER JOIN tblstudent ON tblstudent.matricNo = tblcgparesult.matricNo
        INNER JOIN tblfaculty ON tblfaculty.Id = tblstudent.facultyId
        INNER JOIN tbldepartment ON tbldepartment.Id = tblstudent.departmentId
        where tblcgparesult.matricNo ='$matricNo'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
        ?>
        <tr>
        <td bgcolor="#F9D342"><?php  echo $row['firstName'].' '.$row['lastName'].' '.$row['otherName'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['matricNo'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['facultyName'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['departmentName'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['cgpa'];?></td>
        <td bgcolor="#F9D342"><?php  echo $row['classOfDiploma'];?></td>
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
