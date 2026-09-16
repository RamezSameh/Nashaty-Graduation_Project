<?php
include("db/dbConnection.php");
include("functions.php");
$title="Nashaty | Join Elections";
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
                                <li class="header-notification">
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
                                </li>
                                <li class="user-profile header-notification">
                                    <a href="">
                                        <img src="admin/uploads/images/students/<?php echo  $user_photo ?>" alt="User-Profile-Image">
                                        <span><?php  echo $user_name ?></span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="">
                                                <i class="ti-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="ti-email"></i> My Messages
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
                                            <a href="student_profile.php"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a>
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
                                <li >
                                    <a href="competitions.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-award"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Competitions</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                           
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="elections.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-numbered"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Elections</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="">
                                        <span class="pcoded-micon"><i class="icofont icofont-question-circle"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Ask us</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="">
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
                                            <h4> Join Elections</h4>
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
                                                <li class="breadcrumb-item"><a href="#!">Elections</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <?php 
                                                        if($status == 'pending')
                                                        {

                                                        
                                                    ?>
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="card bg-white" style="border-radius:16px">
                                                            <div class="post-new-contain row card-block">
                                                                <div class="col-md-1 col-xs-3 post-profile">
                                                                    <img src="admin/uploads/images/students/<?php echo  $user_photo ?>"
                                                                        width="30px" height="30px" alt="">
                                                                </div>
                                                                <div class="col-md-11 col-xs-9">
                                                                    <div class="">
                                                                    <?php 
                                                                    $query="select * from election_student where election_id='$get_id' AND student_id ='$user_id'";
                                                                    $result = mysqli_query($con, $query);
                                                                    $count_users=mysqli_num_rows($result);
                                                                    if($count_users > 0)
                                                                    {
                                                                        
                                                                        echo 'Hey , <h5>  '.$user_name. '</h5><br><br>
                                                                        You Are about to <b> Exit </b> ( <b> '.$name.' </b> ) <br> That Starts <b> '.$start.'</b> <br>  Ends with <b> '.$end.' </b><br> Are You Sure ?';

                                                                        
                                                                    }
                                                                    else
                                                                    {
                                                                        echo 'Hey , <h5>  '.$user_name. '</h5><br><br>
                                                                        You Are about to Join ( <b> '.$name.' </b> ) <br> That Starts <b> '.$start.'</b> <br>  Ends with <b> '.$end.' </b>';
                                                                    }

                                                                    ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php 
                                                            if($count_users > 0)
                                                            {
                                                             echo '
                                                            <div class="post-new-footer b-t-muted p-15">
                                                                <a href="elections.php" class="mt-3" > Back to Elections</a>
                                                                <span>
                                                                    <button name="exit"
                                                                        style="border-radius:9px;border: none;"
                                                                        class="btn btn-danger waves-effect waves-light f-right"
                                                                        style="display: none;"><i class="f"></i> Confirm Exit Election
                                                                    </button> 
                                                                </span>
                                                            </div>';
                                                            }
                                                            else
                                                            {
                                                                echo '
                                                                <div class="post-new-footer b-t-muted p-15">
                                                                    <a href="elections.php" class="mt-3" > Back to Elections</a>
                                                                    <span>
                                                                        <button name="confirm"
                                                                            style="border-radius:9px;border: none;"
                                                                            class="btn btn-primary waves-effect waves-light f-right"
                                                                            style="display: none;"><i class="f"></i> Join Election
                                                                        </button> 
                                                                    </span>
                                                                </div>';
                                                            }
                                                            ?>
                                                        </div>
                                                        </form>
                                                        <?php
                                                        if(isset($_POST['confirm']))
                                                        {
                                                            $student_id=$user_id;
                                                            $election_id=$get_id;
                                                            $Insert_Student="INSERT INTO `election_student` (`election_id`, `student_id`) VALUES ('$election_id','$student_id')";
                                                            $run_insert=mysqli_query($con,$Insert_Student);
                                                            if($run_insert)
                                                            {
                                                                 // new post added
                                                                 echo'<script>
                                                                 toastr.options = {
                                                                 "closeButton": false,
                                                                 "debug": false,
                                                                 "newestOnTop": false,
                                                                 "progressBar": false,
                                                                 "positionClass": "toast-bottom-right",
                                                                 "preventDuplicates": false,
                                                                 "onclick": null,
                                                                 "showDuration": "500",
                                                                 "hideDuration": "300",
                                                                 "timeOut": "5000",
                                                                 "extendedTimeOut": "1000",
                                                                 "showEasing": "swing",
                                                                 "hideEasing": "linear",
                                                                 "showMethod": "fadeIn",
                                                                 "hideMethod": "fadeOut"
                                                                 }
                                                                 Command: toastr["success"]("You Joined Successfully.");
                                                                 </script>';
                                                                 
                                                            
                                                            }
                                                            else
                                                            {
                                                            echo "<br><center><div class='alert alert-danger'><i class='mdi mdi
                                                            ' style='color:green'></i> <h5 style=\" color:white\"> Error happend ,Try again &nbsp; </h5></div></center>";
                                                        
                                                            }
                                                        }
                                                        if(isset($_POST['exit']))
                                                        {
                                                            $student_id=$user_id;
                                                            $election_id=$get_id;
                                                            
                                                            $delete_Student="DELETE From `election_student` WHERE election_id = $election_id  AND student_id = $student_id ";
                                                            $run_delete=mysqli_query($con,$delete_Student);
                                                            if($run_delete)
                                                            {
                                                                
                                                                 echo'<script>
                                                                 toastr.options = {
                                                                 "closeButton": false,
                                                                 "debug": false,
                                                                 "newestOnTop": false,
                                                                 "progressBar": false,
                                                                 "positionClass": "toast-bottom-right",
                                                                 "preventDuplicates": false,
                                                                 "onclick": null,
                                                                 "showDuration": "500",
                                                                 "hideDuration": "300",
                                                                 "timeOut": "5000",
                                                                 "extendedTimeOut": "1000",
                                                                 "showEasing": "swing",
                                                                 "hideEasing": "linear",
                                                                 "showMethod": "fadeIn",
                                                                 "hideMethod": "fadeOut"
                                                                 }
                                                                 Command: toastr["success"]("You Exit Successfully.");
                                                                 </script>';
                                                                 
                                                            
                                                            }
                                                            else
                                                            {
                                                            echo "<br><center><div class='alert alert-danger'><i class='mdi mdi
                                                            ' style='color:green'></i> <h5 > Error happend ,Try again &nbsp; </h5></div></center>";
                                                        
                                                            }   
                                                        }
                                                        ?>    
                                                        
                                                        <?php } ?>

                                                        <?php if($status =='active')
                                                        {
                                                        ?>
                                                        
                                                        <?php 
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