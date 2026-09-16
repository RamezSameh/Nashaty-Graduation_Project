<?php
   include("db/dbConnection.php");
   $title="Nashaty | Login";
  session_start();
   if (isset($_SESSION['stu_id']))
    {
        header("location:student_timeline.php");
    }
    else if (isset($_SESSION['admin_id']))
    {
      header("location:admin_timeline.php");
    }
?>

<!DOCTYPE html>
<head>
    <title><?php echo  $title ?>  </title>
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
                <h3>Nashaty </h3><h6>student</h6>
            </div>
        
            <div class="form-group">
                <input type="text" class="form-input" placeholder="name@example.com" name="stu_email" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-input" placeholder="password" name="stu_pass" required>
            </div>

            <div class="form-group">
                <button class="btn btn-success d-block form-control" type="submit" name="loginStudnet"><i class="icofont icofont-login"></i> Login </button>
            </div>
                <a href="forget_pass.php"><h6 class="text-center" >Forget Password</h6></a>
                <a href="admin.php"><h5 class="text-center" >Are You Admin?</h5></a>
               
            <span>
            <?php 
            if(isset($_POST['loginStudnet']))
            {
              $stu_email =$_POST['stu_email'];
              $stu_pass =$_POST['stu_pass'];
              $query="select * from users where email='$stu_email' AND password ='$stu_pass' AND role_id = '0' ";
              $result = mysqli_query($con, $query);
              $count=mysqli_num_rows($result);
              if($count == 1)
              {
                while($row = mysqli_fetch_array($result)) 
                {
                  $role = $row['role_id'];
                  $student_name = $row['full_name'];
                  $student_id = $row['user_id'];
                  $student_level = $row['level'];
                  $student_img = $row['profile_picture'];
                  $is_active =  $row['account_activated'];     
                }
                session_start();
                $_SESSION["role"] = $role;
                $_SESSION["stu_id"] = $student_id;
                $_SESSION["stu_name"] = $student_name;
                $_SESSION["stu_level"] = $student_level;
                $_SESSION["stu_img"] = $student_img;
                if($is_active == 1)
                {   
                    echo "<script>window.open('student_timeline.php','_self')</script>";
                }
                else
                { 
                    echo "<script>window.open('welcome.php','_self')</script>";
                }
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