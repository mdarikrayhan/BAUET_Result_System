
<?php 
error_reporting(0);

$query = mysqli_query($con,"select * from tblstudent where matricNo='$matricNo'");
$row = mysqli_fetch_array($query);
$departmentId = $row['departmentId'];
$facultyId = $row['facultyId'];
$levelId = $row['levelId'];


$que=mysqli_query($con,"select * from tbldepartment where Id = '$departmentId'"); //department                     
$row = mysqli_fetch_array($que);  
$departmentName = $row['departmentName'];      


$que=mysqli_query($con,"select * from tblfaculty where Id = '$facultyId'"); //faculty                      
$row = mysqli_fetch_array($que);  
$facultyName = $row['facultyName'];      



//Log on to codeastro.com for more projects!
////////////  ADMINISTRATOR DASHBOARD //////////////

$queryStudent=mysqli_query($con,"select * from tblstudent where facultyId = '$facultyId' and departmentId = '$departmentId'"); //assigned staff
$adminCountStudent = mysqli_num_rows($queryStudent);

$queryCourses=mysqli_query($con,"select * from tblcourse where facultyId = '$facultyId' and departmentId = '$departmentId'"); //today's Attendance
$adminCountCourses=mysqli_num_rows($queryCourses);



//Log on to codeastro.com for more projects!
//-------------------------SUPER ADMINISTRATOR


$admin=mysqli_query($con,"select * from tbladmin where adminTypeId = '2'");
$countAdmin=mysqli_num_rows($admin);

$todaysAtt=mysqli_query($con,"select * from tblattendance where date(DateTaken)=CURDATE();"); //today's Attendance
$countTodaysAttendance=mysqli_num_rows($todaysAtt);

$allAtt=mysqli_query($con,"select * from tblattendance");
$countAllAttendance=mysqli_num_rows($allAtt);

// //-------------------------------------------


$staffQuery=mysqli_query($con,"select * from tblstaff"); //staff
$countAllStaff = mysqli_num_rows($staffQuery);

$departmentQuery=mysqli_query($con,"select * from tbldepartment"); //department
$countDepartment = mysqli_num_rows($departmentQuery);

$facultyQuery=mysqli_query($con,"select * from tblfaculty"); //faculty
$countFaculty = mysqli_num_rows($facultyQuery);

$studentQuery=mysqli_query($con,"select * from tblstudent"); //student
$countAllStudent = mysqli_num_rows($studentQuery);

$courseQuery=mysqli_query($con,"select * from tblcourse"); //courses
$countAllCourses = mysqli_num_rows($courseQuery);

$courseSession=mysqli_query($con,"select * from tblsession"); //courses
$countAllSession = mysqli_num_rows($courseSession);

$resultComputed=mysqli_query($con,"select * from tblfinalresult"); //courses
$countAllComputed = mysqli_num_rows($resultComputed);

$levelQue=mysqli_query($con,"select * from tbllevel"); //courses
$countAllLevel = mysqli_num_rows($levelQue);

$semesterQue=mysqli_query($con,"select * from tblsemester"); //courses
$countAllSemester = mysqli_num_rows($semesterQue);

$distinctno=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Distinction'"); //dist. no.
$countAllDist = mysqli_num_rows($distinctno);

$uppercred=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Upper Credit'"); //upper cred
$countAllUpc = mysqli_num_rows($uppercred);

$lowercred=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Lower Credit'"); //lower cred
$countAlllc = mysqli_num_rows($lowercred);

$justpass=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Pass'"); //just passed
$countAlljp = mysqli_num_rows($justpass);

$failed=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Fail'"); //failed numbers
$countAllf = mysqli_num_rows($failed);

//Log on to codeastro.com for more projects!
//-----------------------LECTURER----------------------

$lecCourse=mysqli_query($con,"select * from tblcourse where departmentId = '$departmentId'"); //courses
$countLecCourse = mysqli_num_rows($lecCourse);

$que=mysqli_query($con,"select * from tblassignedstaff where departmentId = '$departmentId'"); //assigned staff
$lecCountStaff = mysqli_num_rows($que);

//Log on to codeastro.com for more projects!
//-----------------------STUDENT----------------------

$studCourse=mysqli_query($con,"select * from tblcourse where departmentId = '$departmentId'"); //courses
$coutAllStudentCourses = mysqli_num_rows($studCourse);

$queResult=mysqli_query($con,"select * from tblfinalresult where matricNo = '$matricNo'"); //assigned staff
$countAllStudResult = mysqli_num_rows($queResult);
//Log on to codeastro.com for more projects!
?>