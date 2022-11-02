
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    error_reporting(0);

if(isset($_GET['editid'])){

$_SESSION['editId'] = $_GET['editid'];

$query = mysqli_query($con,"select * from tbladmin where staffId='$_SESSION[editId]'");
$rowi = mysqli_fetch_array($query);

}

else{

echo "<script type = \"text/javascript\">
    window.location = (\"index.php\")
    </script>"; 
}

if(isset($_POST['submit'])){

     $alertStyle ="";
      $statusMsg="";

  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $othername=$_POST['othername'];
  $emailAddress=$_POST['emailAddress'];
  $phoneNo=$_POST['phoneNo'];
  $newStaffId=$_POST['staffId'];

    $ret=mysqli_query($con,"update tbladmin set firstName='$firstname', lastName='$lastname', otherName='$othername', 
  emailAddress='$emailAddress', phoneNo='$phoneNo', staffId='$newStaffId' where staffId='$_SESSION[editId]'");

    if($ret == TRUE){

        echo "<script type = \"text/javascript\">
                window.location = (\"viewAdmin.php\");
                </script>";
    }
    else {

      $alertStyle ="alert alert-danger";
      $statusMsg="An Error Occurred!";
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
        xmlhttp.open("GET","ajaxCall.php?fid="+str,true);
        xmlhttp.send();
    }
}

function showRole(str) {
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
        xmlhttp.open("GET","ajaxCallRole.php?id="+str,true);
        xmlhttp.send();
    }
}
</script>


</head>
<body>
    <!-- Left Panel -->
    <?php include 'includes/leftMenu.php';?>

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
                                    <li><a href="#">Administrator</a></li>
                                    <li class="active">Edit Administrator</li>
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
                                <strong class="card-title"><h2 align="center">Edit Administrator Details</h2></strong>
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
                                                        <label for="cc-exp" class="control-label mb-1">Firstname</label>
                                                        <input id="" name="firstname" type="tel" class="form-control cc-exp" value="<?php echo $rowi['firstName']?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Firstname">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Lastname</label>
                                                        <input id="" name="lastname" type="tel" class="form-control cc-cvc" value="<?php echo $rowi['lastName']?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Lastname">
                                                        </div>
                                                    </div>
                                                    <div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Othername</label>
                                                        <input id="" name="othername" type="text" class="form-control cc-exp" value="<?php echo $rowi['otherName']?>" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Othername">
                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">Email Address</label>
                                                    <input id="" name="emailAddress" type="email" class="form-control cc-cvc" value="<?php echo $rowi['emailAddress']?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Phone Number</label>
                                                        <input id="" name="phoneNo" type="text" class="form-control cc-exp" value="<?php echo $rowi['phoneNo']?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">Staff ID</label>
                                                    <input id="" name="staffId" type="text" class="form-control cc-cvc" value="<?php echo $rowi['staffId']?>" data-val="true" Required data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="StaffID">
                                                </div>
                                            </div>
                                        </div>

                                       <div class="row">
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
                                            <div class="col-6">
                                                <div class="form-group">
                                             <?php
                                            echo"<div id='txtHint'></div>";
                                             ?>                                        
                                                     </div>
                                                </div>
                                            </div>

                                                <button type="submit" name="submit" class="btn btn-primary">Update Admin</button>
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
                                <strong class="card-title"><h2 align="center">All Administrator</h2></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Staff ID</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Othername</th>
                                            <th>EmailAddress</th>
                                            <th>PhoneNo</th>
                                            <th>Role</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
        $ret=mysqli_query($con,"SELECT tbladmin.staffId, tbladmin.firstName, tbladmin.lastName, tbladmin.otherName,tbladmin.emailAddress, tbladmin.phoneNo, tbladmin.dateCreated,tbladmintype.adminTypeName
        from tbladmin 
        INNER JOIN tbladmintype ON tbladmintype.Id = tbladmin.adminTypeId
        where adminTypeId = '2'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
                            ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['staffId'];?></td>
                <td><?php  echo $row['firstName'];?></td>
                <td><?php  echo $row['lastName'];?></td>
                <td><?php  echo $row['otherName'];?></td>
                <td><?php  echo $row['emailAddress'];?></td>
                <td><?php  echo $row['phoneNo'];?></td>
                <td><?php  echo $row['adminTypeName'];?></td>
                <td><?php  echo $row['dateCreated'];?></td>
                <td><a href="editAdmin.php?editid=<?php echo $row['staffId'];?>" title="Edit Details"><i class="fa fa-edit fa-1x"></i></a></td>
                <td><a onclick="return confirm('Are you sure you want to delete?')" href="deleteAdmin.php?delid=<?php echo $row['staffId'];?>" title="Delete Admin"><i class="fa fa-trash fa-1x"></i></a></td>
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
