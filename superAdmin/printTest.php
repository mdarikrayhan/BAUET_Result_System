<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
// session_start();
// include('includes/config.php');
ob_start();
// require_once('includes/configpdo.php');
error_reporting(0);

?>

<html>
<style>
body {
  padding: 4px;
  text-align: center;
}

table {
  width: 100%;
  margin: 10px auto;
  table-layout: auto;
}

.fixed {
  table-layout: fixed;
}

table,
td,
th {
  border-collapse: collapse;
}

th,
td {
  padding: 1px;
  border: solid 1px;
  text-align: center;
}


</style>
    <h2><b>BAUET RESULT SYSTEM PHP</b></h2>
    <h4><b>COMPUTER SCIENCE DEPARTMENT</b></h4>
<?php 
$query = mysql_query("select * from students where matricno='$_SESSION[alogin]'")or die(mysql_error());
while($rows = mysql_fetch_array($query)){
                  {  ?>
                  <div align="left">
<p><b>Student Name :</b> <?php echo $rows['surname'].' '.$rows['firstname'].' '.$rows['othername'];?></p>
<p><b>Level:</b> <?php echo $rows['level'];?>
<p><b>Session:</b> <?php echo $rows['session'];?>
<p><b>Matric No:</b> <?php echo $rows['matricno'];?>
<p><b>Sex:</b> <?php echo $rows['sex'];?>
</div>
<!-- <div align="right" style="margin-top:-2000px;"><img src="./<?php echo $rows['pic'];?>" alt="<?php echo $rows['surname'];?>" style="width:100px;height:100px;" class="img-circle profile-img"></div> -->
<?php 
}
?>    

    <h4><b>CLEARANCE FOR  <?php echo  $rows['session'].'  SESSION  '. $rows['level'].' LEVEL';?></b></h4>
 <table class="table table-inverse" border="1">
                      
                                                <table class="table table-hover table-bordered">
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                        <th>#</th>
                                                        <th>Requirement</th>
                                                            <th>Matric No</th>
                                                            <th>Session</th>
                                                            <th>Level</th>
                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php	
$query = mysql_query("select * from requploads where matricno='$_SESSION[alogin]' and session='$rows[session]' and level = '$rows[level]'")or die(mysql_error());
while($row = mysql_fetch_array($query)){
    $querys = mysql_query("select * from requirements where reqid='$row[reqId]'")or die(mysql_error());
while($rowss = mysql_fetch_array($querys)){
  $matricno = $row['matricno'];$sn=$sn+1;?>
<tr>
                        <td><?php echo $sn; ?>
                        <td><?php echo $rowss['reqName']?>
                        <td><?php echo $row['matricno']; ?></td>
                        <td><?php echo $row['session']; ?></td>
                        <td><?php echo $row['level']; ?></td>
                        <td><?php echo $row['uploadStatus']; ?></td>


</tr>
<?php $cnt=$cnt+1;}}}?>
                            </tbody>
                            </table>

                            </div>
</html>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
//dompdf->stream("",array("Attachment" => false));
$dompdf->stream("Clearance.pdf");
?>