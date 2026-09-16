<?php
include("db/dbConnection.php");
include("functions.php");
$title="Nashaty | Competiotion Students";
session_start();
if (!(isset($_SESSION['admin_id']))) 
{
    header("location:login.php");
}
else 
{
    if(isset($_SESSION['admin_id']) )
    {

        $user_id    =  $_SESSION['admin_id'];
        $user_name  =  $_SESSION['admin_name'];
        // $user_level =  $_SESSION["admin_level"];
        $user_photo =  $_SESSION["admin_pic"];
    }
    else
    {
        $user_id    =  $_SESSION['stu_id'];
        $user_name  =  $_SESSION['stu_name'];
        $user_level =  $_SESSION["stu_level"];
        $user_photo =  $_SESSION["stu_img"];
    }
}


if(isset($_GET['eid']))
{
    $get_id =  $_GET['eid'];
    $get_ele="select * from `elections` where id ='$get_id'";
    $get_ele_query=mysqli_query($con,$get_ele);
    while($row=mysqli_fetch_array($get_ele_query))
    {
        $name = $row['election'];
        $level = $row['level'];
        $status =$row['status'];
        $start = $row['start'];
        $end   = $row['end'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo  $title ?>  </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="assets/images/login-images/favicon.png" type="image/icon" sizes="16x16">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/bower_components/lightgallery/dist/css/lightgallery.min.css">

    <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">

    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="assets/pages/flag-icon/flag-icon.min.css">

    <link rel="stylesheet" type="text/css" href="assets/pages/notification/notification.css">

    <link rel="stylesheet" type="text/css" href="assets/pages/menu-search/css/component.css">

    <link rel="stylesheet" type="text/css" href="assets/bower_components/switchery/dist/switchery.min.css">

    <link rel="stylesheet" type="text/css" href="assets/bower_components/pnotify/dist/pnotify.css">
    <link rel="stylesheet" type="text/css" href="assets/bower_components/pnotify/dist/pnotify.brighttheme.css">
    <link rel="stylesheet" type="text/css" href="assets/bower_components/pnotify/dist/pnotify.buttons.css">
    <link rel="stylesheet" type="text/css" href="assets/bower_components/pnotify/dist/pnotify.history.css">
    <link rel="stylesheet" type="text/css" href="assets/bower_components/pnotify/dist/pnotify.mobile.css">
    <link rel="stylesheet" type="text/css" href="assets/pages/pnotify/notify.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="assets/css/color/color-1.css" id="color" />
    <link rel="stylesheet" type="text/css" href="assets/css/linearicons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link href="assets/css/toastr.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="assets/js/toastr.js"></script>
</head>

<body>

    <div class="theme-loader">
        <div class="preloader4">
            <div></div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header" header-theme="theme4" style="background-color:#3C4FB1 ">
                <!--#4680FF-->
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="">
                            <span> <i class="icofont icofont-group"></i> Nashty</span>
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <div>
                            <ul class="nav-left">
                                <li>
                                    
                                </li>
                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-right">
                                <!-- <li class="header-notification">
                                    <a href="#!">
                                        <i class="icofont icofont-notification"></i>
                                        <span class="badge">3</span>
                                    </a>
                                    <ul class="show-notification">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center" src="assets/images/user.png"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Mina Isaac</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </li> -->
                                <li class="user-profile header-notification">
                                    <a href="">
                                        <img src="admin/uploads/images/students/<?php echo  $user_photo ?>" alt="User-Profile-Image">
                                        <span><?php  echo $user_name ?></span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="settings.php">
                                                <i class="ti-settings"></i> Settings
                                            </a>
                                        </li>
                                     

                                        <li>
                                            <a href="logout.php">
                                                <i class="ti-power-off"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <div id="morphsearch" class="morphsearch">
                                <form class="morphsearch-form">
                                    <input class="morphsearch-input" type="search" placeholder="Search..." />
                                    <button class="morphsearch-submit" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar" pcoded-header-position="relative">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu" style="background-color:#3C4FB1">
                            <div class="">
                                <div class="main-menu-header" style="background-color: #596BC7">
                                    <img class="img-40" src="admin/uploads/images/students/<?php echo  $user_photo ?>" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span> <?php  echo $user_name ?></span>
                                        <span id="more-details">Profile<i class="ti-angle-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                    
                                            <a href="settings.php"><i class="ti-settings"></i>Settings</a>
                                            <a href="logout.php"><i class="ti-power-off"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <br>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"
                                menu-title-theme="theme5">Navigation</div>
                                <ul class="pcoded-item pcoded-left-item">
                                <li >
                                    <a href="admin_timeline.php">
                                        <span class="pcoded-micon"><i class="ion-compose"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Timeline</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li> 
                                    <a href="manage_posts.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-list"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Posts</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li> 
                                    <a href="manage_users.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-users"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Users</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li >
                                    <a href="manage_competition.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-award"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Competitions</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                           
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="manage_elections.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-numbered"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Elections</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                         
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="manage_activites.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-group"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Activities</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="manage_messages.php">
                                        <span class="pcoded-micon"><i class="ion-paper-airplane"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Messages</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="settings.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-settings-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Settings</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body user-profile">
                                <div class="page-wrapper">

                                    <div class="page-header">
                                        <div class="page-header-title">
                                            <h4><?php echo $name ?> Election Students</h4>
                                        </div>
                                        <br><br>
                                        <a href="add_election_student.php?eid=<?php echo  $get_id?>" class="btn btn-success"><i class="icofont icofont-plus"></i> Add Student</a>&nbsp;
                                        <a href="election_position.php?eid=<?php echo  $get_id?>" class="btn btn-warning"> Result</a>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="student_timeline.php">Nashty</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Election Students</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                            
                                                        <div class="card bg-white" style="border-radius:16px">
                                                            <div class="post-new-contain row card-block">
                                                            <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                    <th>#</th>
                                                                    <th>Position</th>
                                                                    <th>Student Name</th>
                                                                    <th>Student Level </th>
                                                                    <th>Phone</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php 
                                                                $no=1;
                                                                $select_ele="select * from election_student where election_id ='$get_id' order by position_id";
                                                                $run_ele=mysqli_query($con,$select_ele);
                                                                $std_count=mysqli_num_rows($run_ele); 
                                                                while($row=mysqli_fetch_array($run_ele))
                                                                {	
                                                                    $ele_id=$row['election_id'];
                                                                    $stu_id=$row['student_id'];
                                                                    $pos_id=$row['position_id'];

                                                                    $get_student_data = "SELECT * FROM `users` where user_id = '$stu_id'";
                                                                    $run_student_data=mysqli_query($con,$get_student_data);
                                                                    while($row=mysqli_fetch_array($run_student_data))
                                                                    {
                                                                        $role = $row['role_id'];
                                                                        $student_name = $row['full_name'];
                                                                        $student_id = $row['user_id'];
                                                                        $student_level = $row['level'];
                                                                        $student_phone = $row['phone'];
                                                                        $student_img = $row['profile_picture'];
                                                                    }

                                                                    $get_pos_data = "SELECT * FROM `election_positions` where id = '$pos_id'";
                                                                    $run_pos_data=mysqli_query($con,$get_pos_data);
                                                                    while($row=mysqli_fetch_array($run_pos_data))
                                                                    {
                                                                        $position_name = $row['position'];
                                                                        
                                                                    }
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?php echo $no++ ?></th>
                                                                        <td><?php echo $position_name ?></td>
                                                                        <td><?php echo $student_name ?></td>
                                                                        <td><?php echo $student_level?></td>
                                                                        <td><?php echo $student_phone?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                                </table>
                                                                <?php 
                                                                    if($std_count==0)
                                                                    {
                                                                     echo"<br><br><center><div class='alert alert-danger border-danger'><h6><i class='mdi mdi-alert
                                                                     '></i>No Students in This Election.</h6><div></center>";
                     
                                                                    }
                                                                   
                                                                ?>
                                                                </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/bower_components/classie/classie.js"></script>
    <script type="text/javascript" src="assets/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="assets/bower_components/lightgallery/dist/js/lightgallery.min.js"></script>
    <script src="assets/bower_components/lightgallery/demo/js/lg-fullscreen.min.js"></script>
    <script src="assets/bower_components/lightgallery/demo/js/lg-thumbnail.min.js"></script>
    <script src="assets/bower_components/lightgallery/demo/js/lg-video.min.js"></script>
    <script src="assets/bower_components/lightgallery/demo/js/lg-autoplay.min.js"></script>
    <script src="assets/bower_components/lightgallery/demo/js/lg-zoom.min.js"></script>
    <script src="assets/bower_components/lightgallery/demo/js/lg-hash.min.js"></script>
    <script src="assets/bower_components/lightgallery/demo/js/lg-pager.min.js"></script>
    <script type="text/javascript" src="assets/pages/wall/wall.js"></script>
    <script type="text/javascript" src="assets/pages/notification/notification.js"></script>
    <script type="text/javascript" src="assets/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="assets/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript"
        src="assets/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="assets/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="assets/js/modal.js"></script>
    <script type="text/javascript" src="assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript" src="assets/pages/advance-elements/swithces.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/demo-12.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/jquery.mousewheel.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.lightgallery-popup').lightGallery();
        });
        $( document ).ready(function() {
            $( "#pcoded" ).pcodedmenu({
                FixedHeaderPosition: true,
                FixedNavbarPosition: false,
            });
        });
        
    </script>
   
   <?php
     echo'<script>
     if ( window.history.replaceState ) {
         window.history.replaceState( null, null, window.location.href );
     }
      </script>';
    ?>

</body>
</html>