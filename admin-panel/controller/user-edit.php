<?php
include_once("../connections/connection.php");
$con = connection();


// $uploadDirectory = "../../uploads/";

$errors = []; // Store all foreseen and unforeseen errors here.

// $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions.

// $fileName = $_FILES['profileEdit']['name'];
// $fileSize = $_FILES['profileEdit']['size'];
// $fileTmpName  = $_FILES['profileEdit']['tmp_name'];
// $fileType = $_FILES['profileEdit']['type'];
// $fileExtension = strtolower(end(explode('.',$fileName)));

// $uploadPath = $uploadDirectory . basename($fileName); 

// echo $uploadPath;

  $userCurrentId = $_POST['userId'];  
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $birthday = $_POST['birthday'];
  // exit(json_encode(array("statusCode"=>$birthday)));
  $sex = $_POST['sex'];
  $about = $_POST['about'];
  $position = $_POST['position'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $linkedin = $_POST['linkedin'];

  
if (isset($userCurrentId)) {

 try{
                  $sql = "UPDATE tbl_admin SET firstname = '$fname', lastname = '$lname', birthday = '$birthday', sex = '$sex',about = '$about', position = '$position', address = '$address', contact = '$contact', email = '$email', twitterprofile = '$twitter', facebookprofile = '$facebook', instagramprofile = '$instagram', linkedinprofile = '$linkedin' WHERE id =  $userCurrentId";
    
                  mysqli_query($con, $sql);
                  exit(json_encode(array("statusCode"=>200)));
 }catch(Exception $e){
  exit(json_encode(array("statusCode"=>$e->getMessage())));
 }
} 

//UPLOAD > PHP






// if (isset($img_name)) {
  
//   if ($error === 0){
//       if($img_size > 125000){
//           $em = "Too large"; 
//           echo json_encode(array("statusCode"=>201));
//       }else{
//           $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//           $img_ex_lc = strtolower($img_ex);

//           $allowed_exs = array("jpg", "jpeg", "png");

//           if (in_array($img_ex_lc, $allowed_exs)){
//               $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
//               $img_upload_path = '../../uploads/'.$new_img_name;
//               move_uploaded_file($tmp_name, $img_upload_path);


//               //Insert into database

//              $sql = "UPDATE tbl_admin SET profile_url = '$new_img_name' WHERE id = 1";


//               mysqli_query($con, $sql);
//               echo json_encode(array("statusCode"=>200));
//           }else{
//             echo json_encode(array("statusCode"=>201));
//           }
//           echo json_encode(array("statusCode"=>201));
//       }
//   }else{
//     echo json_encode(array("statusCode"=>201));
//   }
// }



  



  
?>