<?php
   include("db/dbConnection.php");
   $title="Nashaty | Admin Login";
   session_start();
    if (isset($_SESSION['stu_id']))
    {
        header("location:view_courses.php");
    }
    else if (isset($_SESSION['admin_id']))
    {
        header("location:manage_courses.php");
    }
?>

<!DOCTYPE html>
<head>
    <title><?php echo  $title ?> </title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Montserrat:wght@300;400&family=Outfit:wght@300&family=Poppins:wght@300" rel="stylesheet">
    <link rel="icon" href="assets/images/login-images/favicon.png" type="image/icon" sizes="16x16">
    <link rel="stylesheet" href="css/login.css">
    <link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
</head>
<body>
    <div class="wrap">
        <form class="login-form" action="#" method="POST">
            <div class="form-header">
            <img class="logo" src="assets/images/login-images/minya.jpg">
                <h3>Nashaty</h3><h6>Admin</h6>
            </div>
        
            <div class="form-group">
                <input type="text" class="form-input" placeholder="name@example.com" name="mail" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-input" placeholder="password" name="pass" required>
            </div>

            <div class="form-group">
                <button class="btn btn-success d-block form-control" type="submit" name="loginadmin"><i class="icofont icofont-login"></i> Login </button>
            </div>
                <a href="forget_pass.php"><h6 class="text-center" >Forget Password</h6></a>
                <!-- <a href="create_account.php"><h6 class="text-center" >Don't have account?</h6></a> -->
                <a href="login.php"><h5 class="text-center" >Are You Student ?</h5></a>
               
            <span>
            <?php 
            if(isset($_POST['loginadmin']))
            {
              $admin_email =$_POST['mail'];
              $admin_pass =$_POST['pass'];
              $query="select * from users where email='$admin_email' AND password ='$admin_pass' AND role_id = '1'";
              $result = mysqli_query($con, $query);
              $count=mysqli_num_rows($result);
              if($count == 1)
              {
                while($row = mysqli_fetch_array($result)) {
                  $role = $row['role_id'];
                  $admin_name = $row['full_name'];
                  $admin_id = $row['user_id'];
                  $admin_photo = $row['profile_picture'];
                }
                session_start();
                $_SESSION["role"] = $role;
                $_SESSION["admin_name"] = $admin_name;
                $_SESSION["admin_id"] = $admin_id;
                $_SESSION["admin_pic"] = $admin_photo;
                header("location:admin_timeline.php");
              }

              else
              {
                echo "<div class='alert alert-danger'><center style='font-size:15px ; '><h6><i class='icofont icofont-close-circled' ; font-size:15px ; '></i> Email or Password is incorrect &nbsp;  </h6></center></div>";
              }
            }
            ?>

            </span>
        </form>
    </div>
</body>
</html>