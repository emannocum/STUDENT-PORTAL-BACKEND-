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


  $img_name = $_FILES['profileEdit']['name'];
  $img_size = $_FILES['profileEdit']['size'];
  $imgSize = $_FILES['profileEdit']['size'];
  $tmp_name = $_FILES['profileEdit']['tmp_name'];
   
if (isset($img_name)) {



  if ( $imgSize > 2000000) {
    echo json_encode(array("statusCode"=>201));
  }

  if (empty($errors)) {

                  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                  $img_ex_lc = strtolower($img_ex);

                  $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                  $img_upload_path = '../../uploads/'.$new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);
    
    
                  //Insert into database
    
                 $sql = "UPDATE tbl_admin SET profile_url = '$new_img_name' WHERE id = 1";
    
    
                  mysqli_query($con, $sql);
                  echo json_encode(array("statusCode"=>200));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
}echo json_encode(array("statusCode"=>201));



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