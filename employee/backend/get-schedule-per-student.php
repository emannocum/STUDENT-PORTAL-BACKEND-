<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');

 try{
    include_once("../connections/connection.php");
$con = connection();

$StudentID = $_POST['StudentId'];

    $sql = mysqli_query($con,"SELECT `tbl_studentinfo`.`section` , `tbl_gradesperstudent`.* FROM `tbl_studentinfo` LEFT JOIN `tbl_gradesperstudent` ON `tbl_studentinfo`.`section` = `tbl_gradesperstudent`.`sectionandsemester` WHERE `tbl_studentinfo`.`studentnumber` = '$StudentID';");

    $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
  
    exit(json_encode(array("statusCode"=>200, "content" => $result)));
 }catch(Exception $e){
    exit(json_encode(array("statusCode" =>201, "error"=>$e->getMessage())));
 }

 ?>