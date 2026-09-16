<?php
include("db/dbConnection.php");
include("functions.php");
$title="Nashaty | About Us";
session_start();
if (!(isset($_SESSION['stu_id']))) 
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


if(isset($_GET['id']))
{
    $get_id =  $_GET['id'];
    $get_post="select * from `post` where post_id ='$get_id'";
    $get_post_query=mysqli_query($con,$get_post);
    while($row=mysqli_fetch_array($get_post_query))
    {
        $photo=$row['picture'];
        $type = $row['post_about'];
        $content=$row['content'];
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
                                            <a href="account.php">
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
                
                                            <a href="account.php"><i class="ti-settings"></i>Settings</a>
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
                                    <a href="student_timeline.php">
                                        <span class="pcoded-micon"><i class="ion-compose"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Timeline</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li >
                                    <a href="competitions.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-group-students"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Competations</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="elections.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-numbered"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Elections</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li >
                                    <a href="my_messages.php">
                                        <span class="pcoded-micon"><i class="ion-paper-airplane"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Messages</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="ask_us.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-question-circle"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Ask us</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="about_us.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-info-circle"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">About</span>
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
                                            <h4> About us</h4>
                                        </div>
                                  
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="student_timeline.php">Nashty</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">About us</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="page-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                    
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card rounded-card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">About Nashaty</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <p class="m-b-0">Nashaty is a university student engagement platform designed to simplify communication, participation, and digital administration inside the campus community.</p>
                                                        <p class="m-b-0">The system helps students follow events, join competitions, take part in elections, send messages, ask questions, and stay connected with the academic community in one place.</p>
                                                        <div class="row m-t-20">
                                                            <div class="col-md-4">
                                                                <div class="alert alert-primary">
                                                                    <strong><i class="icofont icofont-calendar"></i> Timeline</strong>
                                                                    <p class="m-b-0">View student activities and important updates.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="alert alert-success">
                                                                    <strong><i class="icofont icofont-trophy"></i> Competitions</strong>
                                                                    <p class="m-b-0">Discover, register, and manage campus competitions.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="alert alert-info">
                                                                    <strong><i class="icofont icofont-numbered"></i> Elections</strong>
                                                                    <p class="m-b-0">Participate in votes and election processes transparently.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row users-card">
                                    <div class="col-lg-4 col-xl-4 col-md-6">
                                    
                                    <div class="card rounded-card user-card">
                                    <div class="card-block">
                                    <div class="img-hover">
                                    <img class="img-fluid img-circle" src="assets/images/team/dr_hassan.png" alt="dr hassan">
                                    <div class="img-overlay">
                                    <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-popup="lightbox">Dr Hassan</a>

                                    </span>
                                    </div>
                                    </div>
                                    <div class="user-content">
                                    <h4 class="">Dr Hassan Shabaan</h4>
                                    <h5 class="">Our Supervisor</h5>
                                    </div>
                                    <ul class="icons-list mt-15">
                                    <li><a href="#" data-popup="tooltip" data-original-title="Google Drive"><i class="icon-google-drive"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" data-original-title="Twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" data-original-title="Github"><i class="icon-github"></i></a></li>
                                    </ul>
                                    </div>
                                    </div>
                                    </div>
                                   
                                    </div>
                                    </div>
                                    <div class="card-block">
                                    <div class="row users-card">
                                    <div class="col-lg-6 col-xl-3 col-md-6">
                                    <div class="card rounded-card user-card">
                                    <div class="card-block">
                                    <div class="img-hover">
                                    <img class="img-fluid img-circle" src="assets/images/team/1.jpg" alt="round-img">
                                    <div class="img-overlay">
                                    <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="icofont icofont-plus"></i></a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="icofont icofont-link-alt"></i></a>
                                    </span>
                                    </div>
                                    </div>
                                    <div class="user-content">
                                    <h4 class="">Marko Edwar</h4>
                                    <h5 class="">Web Developer</h5>
                                    </div>
                                    <ul class="icons-list mt-15">
                                    <li><a href="#" data-popup="tooltip" data-original-title="Google Drive"><i class="icon-google-drive"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" data-original-title="Twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" data-original-title="Github"><i class="icon-github"></i></a></li>
                                    </ul>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-3 col-md-6">
                                    <div class="card rounded-card user-card">
                                    <div class="card-block">
                                    <div class="img-hover">
                                    <img class="img-fluid img-circle" src="assets/images/team/2.jpg" alt="round-img">
                                    <div class="img-overlay">
                                    <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="icofont icofont-plus"></i></a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="icofont icofont-link-alt"></i></a>
                                    </span>
                                    </div>
                                    </div>
                                    <div class="user-content">
                                    <h4 class="">Isaac Essam</h4>
                                    <h5 class="">Web Developer</h5>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6">
                                    <div class="card rounded-card user-card">
                                    <div class="card-block">
                                    <div class="img-hover">
                                    <img class="img-fluid img-circle" src="assets/images/team/3.jpg" alt="round-img">
                                    <div class="img-overlay">
                                    <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="icofont icofont-plus"></i></a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="icofont icofont-link-alt"></i></a>
                                    </span>
                                    </div>
                                    </div>
                                    <div class="user-content">
                                    <h4 class="">Ramez Sameh </h4>
                                    <h5 class="">Web Developer</h5>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-md-6">
                                    <div class="card rounded-card user-card">
                                    <div class="card-block">
                                    <div class="img-hover">
                                    <img class="img-fluid img-circle" src="assets/images/team/4.jpg" alt="round-img">
                                    <div class="img-overlay">
                                    <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="icofont icofont-plus"></i></a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="icofont icofont-link-alt"></i></a>
                                    </span>
                                    </div>
                                    </div>
                                    <div class="user-content">
                                    <h4 class="">Shafik Atia</h4>
                                    <h5 class="">Flutter Developer</h5>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                                                

                                    <div class="col-lg-6 col-xl-3 col-md-6">
                                    <br><br>       
                                    <div class="card rounded-card user-card">
                                    <div class="card-block">
                                    <div class="img-hover">
                                    <img class="img-fluid img-circle" src="assets/images/team/5.jpg" alt="round-img">
                                    <div class="img-overlay">
                                    <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="icofont icofont-plus"></i></a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="icofont icofont-link-alt"></i></a>
                                    </span>
                                    </div>
                                    </div>
                                    <div class="user-content">
                                    <h4 class="">Amir Edwar</h4>
                                    <h5 class="">Flutter Developer</h5>
                                    </div>
                                    </div>
                                    </div>
                                    </div>



                                    <div class="col-lg-6 col-xl-3 col-md-6">
                                    <br><br>  
                                    <div class="card rounded-card user-card">
                                    <div class="card-block">
                                    <div class="img-hover">
                                    <img class="img-fluid img-circle" src="assets/images/team/6.jpg" alt="round-img">
                                    <div class="img-overlay">
                                    <span>
                                    <a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="icofont icofont-plus"></i></a>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="icofont icofont-link-alt"></i></a>
                                    </span>
                                    </div>
                                    </div>
                                    <div class="user-content">
                                    <h4 class="">Ebram Atef</h4>
                                    <h5 class="">Flutter Developer</h5>
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