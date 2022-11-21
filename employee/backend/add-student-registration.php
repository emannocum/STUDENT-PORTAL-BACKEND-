<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../connections/connection.php");
$con = connection();

$Schedule = $_POST['Schedule'];
$StudentNumber = $_POST['StudentNumber'];
$Fee = $_POST['Fee'];
$GetSchedule = json_decode($Schedule, true);
$GetFee = json_decode($Fee, true);
try{


for($i = 0; $i < count($GetSchedule); $i++ ){ 
$Sched = $GetSchedule[$i]['sched_code'];
$SubjectName = $GetSchedule[$i]['subject_name'];
$SectionName = $GetSchedule[$i]['section_name'];
$Description = $GetSchedule[$i]['description'];
$Units = $GetSchedule[$i]['units'];
$Semester = $GetSchedule[$i]['semester'];
$Day = $GetSchedule[$i]['schedule_day'];
$Time = $GetSchedule[$i]['schedule_time'];
$AcademicYear = $GetSchedule[$i]['academic_year'];
$SectionAndYear = $GetSchedule[$i]['sectionacademicyear'];

$sqlGenerateSchedule = "INSERT INTO tbl_gradesperstudent (`sched_code`, `student_id`,`subject_name`,`section_name`,`description`,`units`,`semester`,`schedule_day`,`schedule_time`,`academic_year`,`sectionandacademicyear`) VALUES ('$Sched', '$StudentNumber', '$SubjectName', '$SectionName', '$Description', '$Units', '$Semester', '$Day', '$Time', '$AcademicYear','$SectionAndYear');";
mysqli_query($con, $sqlGenerateSchedule);

}

for($i = 0; $i < count($GetFee[0]); $i++){
    $Name = $GetFee[0][$i]['name'];
    $Amount = $GetFee[0][$i]['amount'];
    $Subtotal = $GetFee[0][$i]['subtotal'];
    $sqlAddStudentFee ="INSERT INTO tbl_feeperstudent
    (`name`,`student_id`, `amount`,`subtotal`) VALUES ('$Name', '$StudentNumber', '$Amount','$Subtotal');";
    mysqli_query($con, $sqlAddStudentFee);    
}

exit(json_encode(array("statusCode"=>200)));
}catch(Exception $e){
    exit(json_encode(array("statusCode"=>$e->getMessage())));
}


?>