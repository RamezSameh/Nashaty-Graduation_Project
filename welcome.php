<?php
include("db/dbConnection.php");
$title="Nashaty | Welcome";
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
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link href="assets/css/toastr.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="assets/js/toastr.js"></script>
</head>

<body>
    <div class="container">
        <p class="text-center  mt-4" style="font-size:40px">
            <img class="logo" style="width:60px;height:60px" src="assets/images/login-images/minya.jpg">
        </p>
        <p class="text-center"  style="font-size:22px;;margin-top:-15px">Nashaty</p>
        <h1 class="text-center" style="padding:10vh">Welcome , <?php echo $student_name ?> </h1>
        <h6 class="text-center mb-4" >Before Logging in , Please Choose your activity  </h6>
        <form method="post" action="">
        <div class="mb-2">	
            <center>
            <select name="activity" style="width:70vh" class="form-control mt-2 mb-3"  style="padding:5px"  required>
                <option disabled selected> Please Select Category</option>
                <?php 
                $get_act="select * from activities";
                $query_cats=mysqli_query($con,$get_act);
                while($row=mysqli_fetch_array($query_cats))
                {
                    $act_id=$row['id'];
                    $act_name=$row['activity_name'];
                    echo "<option value='$act_name'> $act_name </option>";
                }
                ?>
            </select> 
            </center>		
        </div>
        <center>
            <button type="submit" name="add_activity"  class="btn btn-primary d-block mt-5">Finish Your Account <i class="icofont icofont-simple-right"></i></button>
        </center>	
        </form>
        </p>
        <?php 
        if(isset($_POST['add_activity']))
            {
                $activity=$_POST['activity'];
                $update_acticity="UPDATE `users` set  `activity` = '$activity' , `account_activated` = '1'  Where user_id = '$student_id'";
                $run_update=mysqli_query($con,$update_acticity);
                if($run_update)
                {
                    
                    header("Location: student_timeline.php" );
                    
            
                }
                else
                {
                    echo "Error Happened , Check Db Connection";
            
                }
            }
        ?>
    </div>
</body>
</html>