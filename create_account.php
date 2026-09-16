<?php 

include("db/dbConnection.php");
$title="Nashaty | Create Account";

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>

	<link rel="stylesheet" type="text/css" href="assets/css/forget_pass.css">
	<link rel="icon" href="assets/images/login-images/favicon.png" type="image/icon" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/icon/material-design/css/material-design-iconic-font.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" >
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="assets/images/login-images/sign-up.webp">
		</div>
		<div class="login-content">
			<form action="" method="POST" enctype="multipart/form-data">
				<h5 class="title" style="font-size:21px;"><img style="width:50px ; height:50px" src="assets/images/login-images/minya.jpg">Create account</h5>				
				<div class="mt-4 mb-2">
					
					<input type="text" name="name" class="form-control" placeholder="Your Name" required>
				</div>

				<div class="mb-2">	
					
					<input type="email" name="email" class="form-control" placeholder="Your Email" required>
				</div>

				<div class="mb-2">	
						
					<input type="password" name="pass" class="form-control" placeholder="Your Password" required>
				</div>

				<div class="mb-2">
						
					<input type="number"  name="phone" class="form-control" placeholder="Your phone" required>
				</div>

				<div class="mb-2">	
					
					<select name="level" class="form-control" required >
						<option disabled selected>Level</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>	

				<div class="mb-2">	
					
					<select name="gender" class="form-control" required >
						<option disabled selected>Gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>

				<!-- <div class="mb-2">		
					<input type="date" name='birth' class="form-control" id="birth" placeholder="Birthday" required>
				</div> -->

				<div class="mb-2">	
					<select name="activity" class="form-control" required >
						<option disabled selected>Choose Activity</option>
						<option value="football">Football</option>
						<option value="tennis">Tennis</option>
						<option value="volleyball">Volleyball</option>
						<option value="singing">Singing</option>
						<option value="drawing">Drawing</option>
					</select>
				</div>

				<!-- <div class="mb-2">		
					
					<input type=text name="adress" class="form-control" placeholder="Your Adress" required>
				</div> -->

				
				<div class="mt-2">		
					
					<input type="file" name="img" class="form-control" required>
				</div>

            	<button type="submit" name="register" class="btn btn-primary  d-block">Register</button>
				<a href="login.php" style="text-align:center"><h6 style="font-size:14px" class="text-center" >Already have Account , Sign In </h6></a>
            </form>
			<?php
                If(isset($_POST['register']))
                {
                    $full_name=$_POST['name'];
                    $gender=$_POST['gender'];
                    // $date_of_birth=$_POST['birth'];
                    $level=$_POST['level'];
                    $activity=$_POST['activity'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                    $password=$_POST['pass'];
                    $img=$_FILES['img']['name'];
                    $img1=$_FILES['img']['tmp_name'];
                    
                    
                
                    $InsertStudent="INSERT INTO `users` (`full_name`, `gender` ,`activity` ,`profile_picture`, `phone` , `level`, `email` , `password`) VALUES ('$full_name','$gender','$activity','$img','$phone','$level','$email','$password')";
                    $run_insert=mysqli_query($con,$InsertStudent);
                    if($run_insert)
                    {
                        move_uploaded_file($img1,"admin/uploads/images/students/$img");
                        echo "<br><center><div class='alert alert-success'><i class='mdi mdi
                        ' style='color:green'></i> <h5 style=\" color:green\"> Data Added Successfuly &nbsp; </h5></div></center>";
						$last_id = $con->insert_id;
						session_start();
						$get_student_data = "SELECT * FROM `users` where user_id = '$last_id'";
						$run_student_data=mysqli_query($con,$get_student_data);
						while($row=mysqli_fetch_array($run_student_data))
                        {
							$role = $row['role_id'];
							$student_name = $row['full_name'];
							$student_id = $row['user_id'];
							$student_level = $row['level'];
							$student_img = $row['profile_picture'];
						}

						$_SESSION["role"] = $role;
						$_SESSION["stu_id"] = $student_id;
						$_SESSION["stu_name"] = $student_name;
						$_SESSION["stu_level"] = $student_level;
						$_SESSION["stu_img"] = $student_img;
						header("location:student_timeline.php");
					
					}
                    else
                    {
                      echo "<br><center><div class='alert alert-danger'><i class='mdi mdi
                      ' style='color:green'></i> <h5 style=\" color:white\"> Error happend ,Try again &nbsp; </h5></div></center>";
                
                    }
                }
                ?>
        </div>
	
    </div>
	
    <script type="text/javascript" src="assets/js/forget_pass.js"></script>
</body>
</html>
