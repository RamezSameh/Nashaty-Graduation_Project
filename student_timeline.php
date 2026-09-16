<?php
include("db/dbConnection.php");
include("functions.php");
$title="Nashaty | TimeLine";
session_start();
if (!(isset($_SESSION['stu_id']))) 
{
    header("location:login.php");
}
else 
{
    $student_id    =  $_SESSION['stu_id'];
    $student_name  =  $_SESSION['stu_name'];
    $student_level =  $_SESSION["stu_level"];
    $student_photo =  $_SESSION["stu_img"];
}

$greet=greeting();

if(isset($_GET['id']))
{
    $get_post =  $_GET['id'];
    $delete_post="Delete from `post` where post_id ='$get_post'";
    $delete_post_query=mysqli_query($con,$delete_post);
    if($delete_post_query)
    {  
        header("location:student_timeline.php");
    }
}
if(isset($_GET['com_id']))
{
    $get_comment =  $_GET['com_id'];
    $delete_comment="Delete from `post_comment` where com_id ='$get_comment'";
    $delete_comment_query=mysqli_query($con,$delete_comment);
    if($delete_comment_query)
    {  
        header("location:student_timeline.php");
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
                            <span> <i class="icofont icofont-group"></i> Nashaty</span>
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
                                        <img src="admin/uploads/images/students/<?php echo  $student_photo ?>" alt="User-Profile-Image">
                                        <span><?php  echo $student_name ?></span>
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
                                    <img class="img-40" src="admin/uploads/images/students/<?php echo  $student_photo ?>" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span> <?php  echo $student_name ?></span>
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
                                <li class="active">
                                    <a href="student_timeline.php">
                                        <span class="pcoded-micon"><i class="ion-compose"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Timeline</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
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
                                <li>
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
                                            <?php if( $greet =="Good morning ,")
                                            echo"<h4>
                                                <i class='icofont icofont-sun-alt'
                                                    style='font-size: 25px;color:gold'>
                                                </i>
                                                      $greet      $student_name 
                                                </h4>" ;
                                            else
                                            {
                                                echo"<h4>
                                                <i class='icofont icofont-moon'
                                                    style='font-size: 25px;color:doggerblue'>
                                                </i>
                                                      $greet      $student_name 
                                                </h4>" ;
                                            }
                                            ?>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Nashaty</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">TimeLine</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <form action="student_timeline.php" method="post" enctype="multipart/form-data">
                                                        <div class="card bg-white" style="border-radius:16px">
                                                            <div class="post-new-contain row card-block">
                                                                <div class="col-md-1 col-xs-3 post-profile">
                                                                    <img src="admin/uploads/images/students/<?php echo  $student_photo ?>"
                                                                        width="30px" height="30px" alt="">
                                                                </div>
                                                                <div class="col-md-11 col-xs-9">
                                                                    <div class="">
                                                                        <textarea id="post-message" name="post_title"
                                                                            class="form-control post-input" rows="3"
                                                                            cols="10" required="This Feild is Required"
                                                                            placeholder="Please Write Usefull Post ....."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-new-footer b-t-muted p-15">
                                                                <span class="image-upload m-r-15" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="Add Photos">
                                                                    <label for="file-input" class="file-upload-lbl">
                                                                       <img src="assets/images/upload.svg" title="upload Photo" height="40px" width="40px"></img>
                                                                    </label>
                                                                    <input id="file-input" name="img" type="file"
                                                                        accept="image/x-png,image/gif,image/jpeg">
                                                                </span>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <select name="post_type" class="form-control-default" style="padding:5px" required>
                                                                   <option value="Question">Question</option>
                                                                   <option value="Inquiry">Inquiry</option>
                                                                </select>

                                                                <span>
                                                                    <button name="addPost"
                                                                        style="border-radius:9px;background-color:#3C4FB1;border: none;"
                                                                        class="btn btn-primary waves-effect waves-light f-right"
                                                                        style="display: none;"><i class="f"></i> add post
                                                                    </button> 
                                                                </span>

                                                            </div>
                                                        </div>
                                                        </form>
                                                        
                                                        <?php
                                                            if(isset($_POST['addPost']))
                                                            {
                                                                $title=$_POST['post_title'];
                                                                $type=$_POST['post_type'];
                                                                $img=$_FILES['img']['name'];
                                                                $img1=$_FILES['img']['tmp_name'];
                                                                
                                                                $InsertPost="INSERT INTO `post` (`user_id`, `writer_name`,`post_level`, `post_about`, `content` , `picture`) VALUES ('$student_id','$student_name',$student_level,'$type','$title' , '$img')";
                                                                $run_insert=mysqli_query($con,$InsertPost);
                                                                if($run_insert)
                                                                {
                                                                    move_uploaded_file($img1,"assets/uploads/posts/$img");
                                                                                                                              
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
                                                                   Command: toastr["success"](" Post Added Successfully.");
                                                                   </script>';
                                                                   
                                                            
                                                                }
                                                                else
                                                                {
                                                                    echo "Error Happened While Adding Post Check Db Connection";
                                                            
                                                                }
                                                            }

                                                            ?>

                                                            <?php 
                                                            /* if($get)
                                                            {
                                                            @$select_post="select * from post where post_about='$course'";
                                                            }*/
                                                            /*if((isset($_SESSION['doctor_id']))
                                                            {
                                                            }*/   
                                                            $select_post="select * from post  order BY post_id DESC";
                                                            
                                                            $run_posts=mysqli_query($con,$select_post);
                                                            $count = mysqli_num_rows($run_posts);
                                                            if($count>=1)
                                                            {

                                                                while($row_posts=mysqli_fetch_array($run_posts))
                                                                {	
                                                                $post_id=$row_posts['post_id'];
                                                                $writer_id = $row_posts['user_id'];
                                                                $writer_name=$row_posts['writer_name'];
                                                                $writer_level=$row_posts['post_level'];
                                                                $post_about=$row_posts['post_about'];
                                                                $title=$row_posts['content'];
                                                                $image=$row_posts['picture'];
                                                                $create_at = $row_posts['created_at'];
                                                                $time = time_elapsed_string($create_at) ;

                                                                $select_writer_photo="select profile_picture from users where user_id  = '$writer_id'";
                                                                $run_query=mysqli_query($con,$select_writer_photo);
                                                                $row=mysqli_fetch_array($run_query);
                                                                $writer_photo=$row['profile_picture'];          
                                                           
                                                            ?>
                                                        <div>
                                                            <div class="bg-white p-relative"
                                                                style='border-radius:16px;'>
                                                                <div class="input-group wall-elips">
                                                                    <span
                                                                        class="dropdown-toggle addon-btn text-muted f-right wall-dropdown"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="true" role="tooltip"></span>
                                                                    <?php 
                                                                    if($writer_id == $student_id)
                                                                    
                                                                        echo 
                                                                        '
                                                                        <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                            <a class="dropdown-item" href="edit_post.php?id='.$post_id.'">Edit Post</a>   
                                                                            <a class="dropdown-item" href="student_timeline.php?id='.$post_id.'">Delete Post</a>          
                                                                        </div>';
                                                                        
                                                                        else

                                                                        echo
                                                                        '<div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                            <a class="dropdown-item" href="#">Report Post</a>                                                        
                                                                        </div>'
                                                                    ?>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="media">
                                                                        <div class="media-left media-middle friend-box">
                                                                            <a href="">
                                                                                <img class="media-object img-circle m-r-20"
                                                                                    src="admin/uploads/images/students/<?php echo  $writer_photo ?>"
                                                                                    alt="">
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                            $post_type="select post_about from post where post_id='$post_id'";
                                                                            $query=mysqli_query($con,$post_type);
                                                                            $row=mysqli_fetch_array($query);
                                                                            $type=$row['post_about'];                                                                                                                                                       
                                                                        ?>
                                                                        <div class="media-body">
                                                                          
                                                                            <div class="chat-header"><?php echo$writer_name ?> 
                                                                                <span class="badge"
                                                                                    style="background-color:red"><?php echo 'Level '.$writer_level ?>
                                                                                </span>
                                                                                <span
                                                                                    class="badge"
                                                                                    style="background-color:dodgerblue"><?php echo  $type ?>
                                                                                </span>
                                                                            </div>
                                                                            <div class="f-13 text-muted"><?php echo $time ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card-block">
                                                                    <div class="timeline-details">
                                                                        <div class="chat-header"><?php echo $title ?></div>
                                                                        <p class="text-muted"></p>
                                                                    </div>
                                                                </div>
                                                               
                                                                <div id="lightgallery" class="lightgallery-popup">
                                                                    <div class=""
                                                                        data-responsive="assets/uploads/posts/<?php echo $image?> 375, img/1-480.jpg 480, img/1.jpg 800"
                                                                        data-src="assets/uploads/posts/<?php echo $image?>"
                                                                        data-sub-html="<h4><?php echo$type ?> Post </h4><p><?php echo $title ?>.</p>">
                                                                        <a href="#">
                                                                            <img src="assets/uploads/posts/<?php echo $image?>"
                                                                                class="img-fluid width-100" alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                

                                                                <?php 
                                                                        $reacts="select * from post_react where post_id='$post_id'";
                                                                        $query=mysqli_query($con,$reacts);                                                                           
                                                                        $post_reacts_cout=mysqli_num_rows($query);                                                                                                                                               
                                                                ?>
                                                               
                                                                
                                                                <div class="card-block b-b-theme b-t-theme social-msg">
                                                                    <form action="student_timeline.php" method="POST">
                                                                    <input type="hidden" name="hiddenpostid" value="<?php echo $post_id ?>">
                                                                    <button type="submit" name="reactsub" style="border:none;background:none ; cursor:grab">
                                                                    
                           

                                                                        <i class="icofont icofont-heart-alt" id="reactid" style='color:#777777'>
                                                                        </i>

                                                                        <?php
                                                                        //check if react is already done -> change color to red
                                                                        $user_react="select * from post_react where post_id='$post_id' and user_id='$student_id'";
                                                                        $query_react=mysqli_query($con,$user_react);                                                                           
                                                                        $user_react_num=mysqli_num_rows($query_react); 
                                                                        if($user_react_num>0)
                                                                        {
                                                                            echo '<script>
                                                                            
                                                                                document.getElementById("reactid").style.color="red";

                                                                                </script>';
                                                                        }
                                                                        ?>

                                                                        <span class="b-r-theme"> 
                                                                        <?php   
                                                                        if($post_reacts_cout>0)
                                                                        {
                                                                         echo $post_reacts_cout;
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "0";
                                                                        }
                                                                        ?>

                                                                        
                                                                        </span>
                                                                    </button>
                                                                 

                                                                    <?php 
                                                                        $comm="select * from post_comment where post_id='$post_id'";
                                                                        $query=mysqli_query($con,$comm);                                                                                                                                                   
                                                                        $post_comm_count=mysqli_num_rows($query);                                                                                                                                               
                                                                    ?>
                                                                    <a href="#" >
                                                                        <i class="icofont icofont-comment text-muted" >
                                                                        </i>
                                                                        <span class="b-r-theme"> 

                                                                        <?php   
                                                                        if($post_comm_count>0)
                                                                        {
                                                                            echo $post_comm_count;
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "0";
                                                                        }
                                                                        ?>
                                                                        </span>
                                                                        
                                                                    </a>
                                                                    </form>
                                                                    <?php
                                                                        // check f user reacted to post
                                                                        if(isset($_POST['reactsub']))
                                                                        {
                                                                            $user_react="select * from post_react where post_id='$post_id' and user_id='$student_id'";
                                                                            $query_react=mysqli_query($con,$user_react);                                                                           
                                                                                
                                                                            $user_react_num=mysqli_num_rows($query_react); 
                                                                            if($user_react_num>0)
                                                                            {
                                                                                // user already reacted 
                                                                                echo 
                                                                                '<script>
                                                                                document.getElementById("reactid").style.color="red";
                                                                                </script>';
                                                                                $deleteReact="delete from post_react where user_id = '$student_id' and post_id='$post_id'";
                                                                                $run_delete_react=mysqli_query($con,$deleteReact);

                                                                            }
                                                                            else
                                                                            {
                                                                                // user not reacted to post
                                                                                echo 
                                                                                '<script>
                                                                                document.getElementById("reactid").style.color="darkgrey";
                                                                                </script>';
                                                                                $InsertReact="INSERT INTO post_react (`post_id`, `user_id`) VALUES ('$post_id','$student_id')";
                                                                                $run_insert_react=mysqli_query($con,$InsertReact);

                                                                            }   
                                                                        }    
                                                                    ?>       
                                                                </div>
                                                                
                                                                </span>
                                                               
                                                                <div class="card-block user-box">
                                                                    <div class="p-b-20">
                                                                        <?php 
                                                                        if( $post_comm_count > 0)
                                                                        echo '<span class="f-14"><a href="post_details.html?p_id='.$post_id.'">See All Comments ( '.
                                                                              $post_comm_count .' ) </a>
                                                                              </span>';
                                                                        else
                                                                        echo '<span class="f-14"><a href=""> No Comments On Post</a>
                                                                              </span>';

                                                                        ?>
                                                                        
                                                                    </div>
                                                                    <?php    
                                                                        $comments="select * from post_comment where post_id='$post_id'";
                                                                        $query=mysqli_query($con,$comments);                                                                                                                                                       
                                                                        $post_comment_cout=mysqli_num_rows($query); 
                                                                        while($row_get_comments=mysqli_fetch_array($query))
                                                                        {	
                                                                        $comment_id = $row_get_comments['com_id'];    
                                                                        $comment_content = $row_get_comments['content'];
                                                                        $comment_created_at = $row_get_comments['created_at'];
                                                                        $comment__writer = $row_get_comments['comment_writer'];
                                                                        $comment_writer_id = $row_get_comments['user_id'];
                                                                        $comment_time = time_elapsed_string($comment_created_at);
                                                                        
                                                                        $select_writer_photo="select profile_picture from users where user_id  = '$writer_id'";
                                                                        $run_query=mysqli_query($con,$select_writer_photo);
                                                                        $row=mysqli_fetch_array($run_query);
                                                                        $writer_photo=$row['profile_picture'];  

                                                                        ?>
                                                                    <div class="media">
                                                                        <a class="media-left" href="#">
                                                                            <img class="media-object img-circle m-r-20"
                                                                                src="admin/uploads/images/students/<?php echo $student_photo ?>"
                                                                                alt="Generic placeholder image">
                                                                        </a>
                                                                        <div
                                                                            class="media-body b-b-theme social-client-description">
                                                                            <div class="chat-header"><?php echo $comment__writer?>
                                                                            <span class="text-muted"><?php echo $comment_time ?></span> 
                                                                            <?php 

                                                                            if($comment_writer_id == $student_id) 
                                                                            {
                                                                                echo '&nbsp;<a href="edit_comment.php?id='.$comment_id.'"><i class="icofont icofont-edit-alt"></i></a>'; 
                                                                                echo '&nbsp;<a href="student_timeline.php?com_id='.$comment_id.'"><i class="icofont icofont-ui-delete"></i></a>'; 
                                                                            }
                                                                         
                                                                            ?>
                                                                            </div>
                                                                            <p class="text-muted"><?php echo $comment_content ?>.</p>
                                                                        </div>
                                                                    </div>

                                                                    <?php  } ?>
                                                                    <!----------------------------------Write Comment-------------------------->
                                                                    <div class="media">
                                                                        <a class="media-left" href="#">
                                                                            <img class="media-object img-circle m-r-20"
                                                                                src="admin/uploads/images/students/<?php echo  $writer_photo ?>"
                                                                                alt="Generic placeholder image">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <form action="student_timeline.php" method="POST">
                                                                                <div class="">
                                                                                    <textarea
                                                                                        class="f-13 form-control msg-send" name="comment"
                                                                                        rows="3" cols="10" required=""
                                                                                        placeholder="Write comment....."></textarea>
                                                                                    <input type="hidden" name="hiidd" value="<?php echo $post_id ?>">
                                                                                    <div class="text-right m-t-20"><button
                                                                                            name="addComment"
                                                                                            style="border-radius:9px;background-color:#3C4FB1;border: none;"
                                                                                            class="btn btn-primary waves-effect waves-light">comment</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            
                                                            <?php echo'<br>';}}
                                                                 
                                                                else
                                                                {
                                                                    echo 
                                                                    "<br><center><img src='assets/images/contract (1).svg' style='width:60px; height:60px ;'></img></center><br>
                                                                    <center><h3 style='color:darkgrey'> No new posts</h3> </center>";
                                                                }
                                                            ?>      
                                                            <div class="f-30 text-muted text-center p-30"><?php echo '20'.Date('y')?></div>
                                                        </div>
                                                        <?php
                                                            if(isset($_POST['addComment']))
                                                            {
                                                                
                                                                $comment_content=$_POST['comment'];
                                                                $pos__id = $_POST['hiidd'];                     
                                                                $InsertComment="INSERT INTO `post_comment` (`post_id`, `user_id`,`comment_writer`, `content`) VALUES ('$pos__id','$student_id','$student_name','$comment_content')";
                                                                $run_insert_comment=mysqli_query($con,$InsertComment);
                                                                if($run_insert_comment)
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
                                                                   Command: toastr["success"](" Comment Added Successfully.");
                                                                   </script>';                                                               
                                                                
                                                                }
                                                                else
                                                                {
                                                                    echo"ERRRR";
                                                            
                                                                }
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