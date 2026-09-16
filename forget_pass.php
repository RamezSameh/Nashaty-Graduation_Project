<?php 

include("db/dbConnection.php");
include("functions.php");
$title="Nashaty | Forget Password";

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo  $title ?>  </title>
	<link rel="stylesheet" type="text/css" href="assets/css/forget_pass.css">
	<link rel="icon" href="assets/images/login-images/favicon.png" type="image/icon" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/icon/material-design/css/material-design-iconic-font.min.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<!--<img class="wave" src="images/login/wave.svg">-->
	<div class="container">
		<div class="img">
			<img src="admin/images/login/5191078.svg">
		</div>
		<div class="login-content">
			<form action="forget_pass.php" method="POST">
				<h2 class="title" style="font-size:35px;"><img style='width:42px ; height:42px' src="assets/images/login-images/minya.jpg"> Nashaty</h2>
				<h2 class="title" style="font-size:20px;" >Forget Password</h2><br>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="zmdi zmdi-email" style="font-size:20px;"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Your Email</h5>
           		   		<input type="email"  class="input" name="studentemail" required>
           		   </div>
           		</div>
            	<button name="forget" type="submit" class="btn" value="Login">Confirm</button>

				<a href="login.php" style="text-align:center"><h4 class="text-center" >Back To Login</h4></a>
				<?php
       	
				if(isset($_POST['forget']))
				{
					
					$student_email = $_POST['studentemail'];
					$student_email = stripslashes($student_email);
					$student_email = addslashes($student_email);
					$query="select * from users where email='$student_email'";
					$result = mysqli_query($con, $query);
					$count=mysqli_num_rows($result);
					
					if($count > 0)
					{
						while($row = mysqli_fetch_array($result)) 
						{
							
							$id = $row['user_id'];
							$pass = $row['password'];
							$name = $row['full_name'];
						}
						/*********************************************/					
						$to      = $student_email;
						$subject = 'Your Email and Password';
						$message = 
						'<html>
						<body>
						<center>
						<h2 class="title" style="font-size:20px;">
						<img width="20px" height="20px" src="assets/images/login-images/minya.jpg">Nashaty</h2>
						<br><h1> Welcome '.$name.'</h1><br>
						We have rercieved a request from this email to 
						<br> get ID and Password of Nashaty WebSite <br>
						Your ID is : '.$id.'<br> Your Password : '.$pass.'<br>
						<p> Thank You For Using Nashaty </p> 
						</center>
						</body>
						</html>'
						;
						$headers = array(
							'From' => 'admin@nashaty.com',
							'Reply-To' => 'admin@nashaty.com',
							'X-Mailer' => 'PHP/' . phpversion()
						);
						mail($to, $subject, $message, $headers);		
						/*********************************************/											
						echo "<br><center style='font-size:19px ;color:#00CC99
						'><h5><i class='zmdi zmdi-email' style='color:#009933
						; font-size:18px ; '></i> An email contains details sent to $student_email &nbsp;  </h5></center>";
					}

					else
					{
					echo "<br><center style='font-size:19px ;color:red; '><h5><i class='zmdi zmdi-alert-circle' style='color:red ; font-size:18px ; '></i> No account related to this Email &nbsp;  </h5></center>";
					}       
				}
				?>
            </form>
        </div>
	
    </div>
	
    <script type="text/javascript" src="assets/js/forget_pass.js"></script>
</body>
</html>
