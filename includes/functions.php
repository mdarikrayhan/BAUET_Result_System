<?php

//-------------------------Score Letter Grade -------------------------------

function getScoreLetterGrade($score){

    $letterGrade = "";
     if($score >= 80)
     {
        $letterGrade = "A+";
     }
     else if($score >= 75){
        $letterGrade = "A";
     }
     else if($score >= 70){
        $letterGrade = "A-";
     }
     else if($score >= 65){
         $letterGrade = "B+";
     }
     else if($score >= 60){
        $letterGrade = "B";
     }
      else if($score >= 55){
        $letterGrade = "B-";
     }
      else if($score >= 50){
        $letterGrade = "C+";
     }
     else if($score >= 45){
        $letterGrade = "C";
     }
     else if($score >= 40){
         $letterGrade = "D";
     }
     else if($score < 40){
      $letterGrade = "F";
          }
     return $letterGrade;
}

// -------------------------- Score Grade Point -------------------------

function getScoreGradePoint($score){

    $gradePoint = "";

     if($score >= 80)
     {
        $gradePoint = 4.00;
     }
     else if($score >= 75){
        $gradePoint = 3.75;
     }
     else if($score >= 70){
        $gradePoint = 3.50;
     }
     else if($score >= 65){
         $gradePoint = 3.25;
     }
     else if($score >= 60){
        $gradePoint = 3.00;
     }
      else if($score >= 55){
        $gradePoint = 2.75;
     }
      else if($score >= 50){
        $gradePoint = 2.50;
     }
     else if($score >= 45){
        $gradePoint = 2.25;
     }
     else if($score >= 40){
      $gradePoint = 2.00;
   }
     else if($score < 40){
         $gradePoint = 0.00;
     }

     return $gradePoint;
}

// -------------------------- Honour -------------------------

function getClassOfDiploma($gpa){

    $classOfDiploma = "";

     if($gpa >= 3.80)
     {
        $classOfDiploma = "VC List";
     }
     else if($gpa >= 3.75){
        $classOfDiploma = "Dean List";
     }
     else if($gpa >= 2.50){
       $classOfDiploma = "Lower Credit";
     }
     else if($gpa >= 2.00){
         $classOfDiploma = "Pass";
     }
     else if($gpa < 2.00){
        $classOfDiploma = "Fail";
     }

     return $classOfDiploma;
}


?>