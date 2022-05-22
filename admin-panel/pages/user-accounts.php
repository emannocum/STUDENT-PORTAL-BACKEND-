<?php
session_start();
if(!isset($_SESSION['UserLogin'])){
  echo header("Location: admin-login.php");
}
include_once("../connections/connection.php");
$con = connection();

$sql = "SELECT * FROM tbl_admin WHERE username = '".$_SESSION['UserLogin']."';";

$user = $con->query($sql) or die ($con->error);//if wrong query kill the connections (students is the query)

$user = $user->fetch_assoc();// for getting the admin credentials it is like a array to access data 

$currentId = $user['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Custom table csss -->

<link href="../css/Mytable.css" rel="stylesheet">
 <!-- End of custom table css -->
  <!-- Template Main CSS File -->
  <link href="../css/style.css" rel="stylesheet">
 
</head>

<body>

  <!-- TOASTER -->


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    
    <div class="d-flex align-items-center justify-content-between">
      <a href="admin-dashboard.php" class="logo d-flex align-items-center">
        <img src="../img/globe-client-logo.png" alt="">
        <span class="d-none d-lg-block">Student Portal</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

<?php

echo '<img src="../../uploads/'.$user['profile_url'].'" alt="Profile" class="rounded-circle"  />';
?>
                <?php
                echo '<span class="d-none d-md-block dropdown-toggle ps-2">'.$user['username'].'</span>' ;
                ?>
            
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
               <?php
                echo '<h6>'.$user['firstname'].' '.$user['lastname'].'</h6>' ;
                ?>
               <?php
                echo '<span>'.$user['position'].'</span>' ;
                ?>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin-logout.php">
                <i class="bi bi-box-arrow-right"></i>           
              <span>Sign Out
                </span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed " href="user-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

     

      <li class="nav-item">
        <a class="nav-link " href="user-accounts.php">
          <i class="bi bi-card-list"></i>
          <span>User Account</span>
        </a>
      </li><!-- End User Account Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed " href="admin-student-accounts.php">
          <i class="bi bi-card-list"></i>
          <span>Student Account</span>
        </a>
      </li><!-- End Student Account Nav -->
     
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
            

    <div class="pagetitle">
      <h1>User Accounts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">User Accounts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id ="modalMainMessage">Updated Succesfully!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                     <p id="modalLogs"></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" onClick ="reloadPage()"data-bs-dismiss="modal">Close</button>
                      <script> function reloadPage(){location.reload()}</script>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

               <!--add user Modal -->
              
              <div class="modal fade" id="addusermodal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Accounts Form</h5>
                      
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick ="refreshTable()"></button>
                      
                    </div>
                    <div class="modal-body">

                    
                <!--Error Alert -->
            <div class="alert alert-danger alert-dismissible fade" hidden role="alert" id="alertError" style ="position:fixed; z-index: 10;width:fit-content; left:40%; top:40%;"> 
                <i class="bi bi-exclamation-octagon me-1"></i>
          Please fill out all the fields!
              </div><!--Error End of Alert -->

              <!-- Success Alert -->
              <div class="alert alert-success alert-dismissible fade" hidden role="alert" id="alertSuccess" style ="position:fixed; z-index: 10;width:fit-content; left:40%; top:40%;"> 
                <i class="bi bi-exclamation-octagon me-1"></i>
          Created Succesfully!
              </div><!-- End of Alert -->

              <!-- Floating Labels Form -->
              <form class="row g-3 needs-validation" id ="frmCreateUsers">

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="newFname" placeholder="Firstname" required>
                    <label for="newFname">Firstname</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="newMname" placeholder="Middlename">
                    <label for="newMname">Middlename</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="newLname" placeholder="Lastname">
                    <label for="newLname">Lastname</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="newEmail" placeholder="Email">
                    <label for="newEmail">Email</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="newUsername" placeholder="Username">
                    <label for="newUsername">Username</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="newPassword" placeholder="Password">
                    <label for="newPassword">Password</label>
                  </div>
                </div>

               
                
               
                <div class="col-md-4">
                <div class="form-floating mb-3">
                      <select class="form-select" id="newJob" aria-label="Floating label select example">
                        <option selected disabled>...</option>
                        <option value="Admin">Admin</option>
                        <option value="Registrar">Registrar</option>
                        <option value="Accountant">Accountant</option>
                      </select>
                      <label for="newJob">Position</label>
                    </div>
                </div>

                <div class = "col-md-4">
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="newBirthday" placeholder="Birthday">
                    <label for ="newBirthday">Birthdate</label>
                  </div>
                </div>

                <div class = "col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="newContact" placeholder="Contact">
                    <label for="newContact">Contact</label>
                  </div>
                </div>

                <div class="col-md-1">
                  <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
                </div>

                <fieldset class="col-md-3">
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="maleCheck" value="Male" onkeypress="sexRadio(Male)" >
                      <label class="form-check-label" for="gridRadios1">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="femaleCheck" value="Female" onkeypress="sexRadio(Female)"> 
                      <label class="form-check-label" for="gridRadios2">
                        Female
                      </label>
                    </div>
                  </div>
                </fieldset>


                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="newAddress" style="height: 100px;"></textarea>
                    <label for="newAddress">Address</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="About" id="newAbout" style="height: 100px;"></textarea>
                    <label for="newAbout">About</label>
                  </div>
                </div>
              

                    <label for="basic-url" class="form-label">Optional URL</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="twitterprofileURL">https://twitter.com/</span>
                      <input type="text" class="form-control" id="newtwitterprofileURL" aria-describedby="basic-addon3">
                    </div>
                    <div class ="input-group mb-3">
                      <span class="input-group-text" id="facebookprofileURL">https://facebook.com/</span>
                      <input type="text" class="form-control" id="newfacebookprofileURL" aria-describedby="basic-addon3">
                    </div>
                    <div class ="input-group mb-3">
                      <span class="input-group-text" id="instagramprofileURL">https://instagram.com/</span>
                      <input type="text" class="form-control" id="newinstagramprofileURL" aria-describedby="basic-addon3">
                    </div>
                    <div class ="input-group mb-3">
                      <span class="input-group-text" id="linkedinprofileURL">https://linkedin.com/</span>
                      <input type="text" class="form-control" id="newlinkedinprofileURL" aria-describedby="basic-addon3">
                    </div>
              </form><!-- End floating Labels Form -->
                    </div>
                    <div class="modal-footer">
                      
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick ="refreshTable()">Cancel</button>
                      <button class="btn btn-primary" type="button" disabled id ="btnIsLoading" hidden>
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Creating...
                      </button><!--End of updating button-->
                      <button class="btn btn btn-danger" type="button" disabled id ="btnError" hidden>
                      <i class="bi bi-exclamation-octagon"></i>
                      Error!
                      </button><!-- End of error button -->
                      <button class="btn btn btn-success" type="button" disabled id ="btnSuccess" hidden>
                      <i class="bi bi-check-circle me-1"></i>
                      Created Succesfully!
                      </button><!-- End of success button -->
                      <button type="submit" class="btn btn-primary" id ="btnCreateUsers" onClick ="checkAllFields()">Submit</button>
                      <button type="button" class="btn btn-secondary" onClick="resetFields()">Reset</button>
                    </div>
                  </div>
                </div>
              </div><!-- End user Modal-->
            

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" >
            <div class="card-body" >
            <h5 class="card-title">User Accounts Table</h5>
      <!-- scroll table --> 
      <!-- Select Entry Page -->  
     
      <div class="row mb-3">
        <div class="col-sm-2">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addusermodal">
                Add User
              </button>
       </div>
       

       </div>

      <div class="row mb-3">
                  <div class="col-sm-2">
                    <select class="form-select" aria-label="Default select example" id ="selectPage" onchange="selectNumPage()">
                    
                    </select>
                  </div>
                  <label for ="selectPage"class="col-sm-2 col-form-label">Rows</label>

                <!-- Space between rows and searchbar -->
                  <div class="col-sm-5 col-lg-3">
                  </div>
                  <!-- End of Space between rows and searchbar -->
                  <!-- Search bar -->
                  <div class="col-sm-2 col-lg-5">
                    <div class ="search-bar">
                      <input class="form-control" type ="text" placeholder="Search..." title="Enter search keyword" id="userSearchBar" onkeyup="userSearchKey()" >
                     </div>
                    </div><!--End of search bar-->
                  </div> 
      <!-- End of Select Entry Page -->
    
              <div id="table-wrapper">
                <div id="table-scroll">
              <!-- Table -->
              
              <table class="table table-hover"  id ="tblUsers">
                <thead id ="tblThead">
                  <tr class="table-primary">
                    <th scope="col" class ="header-title" ><a href= "#" onclick ="sortCurrentTable('id');return false;" class="th-a">ID</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('profile_url');return false;" class="th-a">Photo</a> </th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('username');return false;" class="th-a">Username</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('firstname');return false;" class="th-a">Firstname</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('middlename');return false;" class="th-a">Middlname</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('lastname');return false;" class="th-a">Lastname</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('email');return false;" class="th-a">Email</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('birthday');return false;" class="th-a">Birthday</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('sex');return false;" class="th-a">Sex</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('password');return false;" class="th-a">Password</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('position');return false;" class="th-a">Job</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('address');return false;" class="th-a">Address</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('contact');return false;" class="th-a">Contact</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('about');return false;" class="th-a">About</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('twitterprofile');return false;" class="th-a">Twitter</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('facebookprofile');return false;" class="th-a">Facebook</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('instagramprofile');return false;" class="th-a">Instagram</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('linkedinprofile');return false;" class="th-a">LinkedIn</a></th>
                    <th scope="col" class ="header-title"><a href= "#" onclick ="sortCurrentTable('added_at');return false;" class="th-a">Date Created</a></th>
                    <th scope="col" class="table-info" id ="th-action">Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody id ="tbody-user-accounts">
                 
                </tbody>
              </table>
              <!-- Table -->

  </div>
  </div>
  <!-- End for scroll table -->
  <div class ="row g-3">
   <div class="col-6" id ="showNumberOfPage">
         
     </div>
     
     
   <!-- Pagination with icons -->

              <div class="col-6">
                <ul class="pagination justify-content-end">
                  <li class="page-item" >
                  <a class="page-link" aria-label="Previous" id="prevPage">
                    <span aria-hidden="true">&laquo;</span>
                        </a>
                          </li>
                          <li class="page-item"><a class="page-link" id= "page1">1</a></li>
                          <li class="page-item"><a class="page-link" id= "page2">2</a></li>
                          <li class="page-item"><a class="page-link" id= "page3">3</a></li>
                          <li class="page-item">
                          <a class="page-link" aria-label="Next" id ="nextPage" >
                       <span aria-hidden="true">&raquo;</span>
                    </a> 
                  </li>
                </ul>      
            </div>
  </div><!-- row g-3 -->
              <!-- End Pagination with icons -->



  <!-- practiec-->
            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Footer</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  

  <!-- my javascript for user-prfile -->
  <script src="../vendor/jquery-3.6.0.min.js?t=1491313943549"></script>
<script src ="../js/user-accounts.js?t=1491313943549"  type = "text/javascript"></script>
<script src ="../js/user-create-account.js?t=1491313943549"  type = "text/javascript"></script>
<!-- end of my javascript for user - profile -->

  <!-- Vendor JS Files -->
  <script src="../vendor/apexcharts/apexcharts.min.js?t=1491313943549"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js?t=1491313943549"></script>
  <script src="../vendor/chart.js/chart.min.js?t=1491313943549"></script>
  <script src="../vendor/echarts/echarts.min.js?t=1491313943549"></script>
  <script src="../vendor/quill/quill.min.js?t=1491313943549"></script>
  
 <script src="../vendor/simple-datatables/simple-datatables.js?t=1491313943549"></script> 
  <script src="../vendor/tinymce/tinymce.min.js?t=1491313943549"></script>
 
  <!-- Template Main JS File -->
  <script src="../js/main.js?t=1491313943549"></script>

</body>

</html>