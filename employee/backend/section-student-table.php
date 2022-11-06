<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../connections/connection.php");
$con = connection();

$SectionName = $_POST['SectionName'];


try{

    $sql = mysqli_query($con, "SELECT * FROM `tbl_studentinfo` WHERE section_name = '$SectionName' AND academic_year = '$AcademicYear' ORDER BY `id` DESC");

    //store in result
    
    $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    
exit(json_encode($result));
}catch(Exception $e){
    exit(json_encode(array("statusCode"=>$e->getMessage())));
}


?>