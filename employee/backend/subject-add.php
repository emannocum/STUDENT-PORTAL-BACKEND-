<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../connections/connection.php");
$con = connection();


$editPosition = $_POST['EditorPosition'];
$editEmail = $_POST['EditorEmail'];
$category =  $_POST['Category'];
$action = $_POST['Action'];
$Subject_Code = $_POST['Subject_Code'];
$Subject_Name = $_POST['Subject_Name'];
$Units = $_POST['Units'];
$Courses = $_POST['Courses'];
$Semester = $_POST['Semester'];
$Year = $_POST['Year_Available'];
$Type = $_POST['Type'];
try{
    


    $sql = "INSERT INTO `tbl_subject` (`subject_code`,`subject_name`,`units`,`type`,`course_available`,`semester_available`, `year_available`) VALUES ('$Subject_Code','$Subject_Name','$Units','$Type', '$Courses' ,'$Semester', '$Year');";
    mysqli_query($con, $sql);


    $BeforeSql = "SELECT `subject_code`,`subject_name`,`units`,`type`,`status`,`added_at` FROM tbl_subject WHERE subject_code = '$Subject_Code'";     
                
    mysqli_query($con, $BeforeSql);

    $getBefore = $con ->query($BeforeSql) or die ($con->error);
    $rowBefore = json_encode($getBefore ->fetch_assoc());


    

    $auditsql = "INSERT INTO `tbl_history` (`action`,`category`,`editor_position`,`editor_email`,`edited_email`,`before_edit`) VALUES ('$action','$category','$editPosition','$editEmail', '$Subject_Code', '$rowBefore' );";
    mysqli_query($con, $auditsql);

    exit(json_encode(array("statusCode"=>200)));

  
}catch(Exception $e){
    exit(json_encode(array("statusCode"=>$e->getMessage())));
}


?>