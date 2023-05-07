<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$name = stripslashes($name);
		$name = addslashes($name);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);

		$college = $_POST['college'];
		$college = stripslashes($college);
		$college = addslashes($college);
        
		$age = $_POST['age'];
		$age = stripslashes($age);
		$age = addslashes($age);

		$gender = $_POST['gender'];
		$gender = stripslashes($gender);
		$gender = addslashes($gender);
		
		$branch = $_POST['branch'];
		$branch = stripslashes($branch);
		$branch = addslashes($branch);
		
		$technical = $_POST['technical'];
		$technical = stripslashes($technical);
		$technical = addslashes($technical);

		$phone = $_POST['phone'];
		$phone = stripslashes($phone);
		$phone = addslashes($phone);

		$str="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
            $str="insert into user set name='$name',email='$email',password='$password',college='$college',age='$age' ,gender='$gender', branch='$branch', technical_skills='$technical', phone='$phone'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header('location: welcome.php?q=1');
		}
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register | Online Quiz System</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
		<script>
		function validateform()
		{
			function validateform()
		{
			var username=document.getElementById("name");
			var useremail=documenpt.getElementById("email");
			var userpassword=documenpt.getElementById("password");
			var usercollege=documenpt.getElementById("college");
			

			if(username.value==""||useremail.value==""||userpassword.value==""||usercollege.value=="")
			{
				alert("NO blank values allowed");
			}
			else
			{
				true;
			}
		}
		}
	</script>
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h5 style="font-family: Noto Sans;">Register to </h5><h4 style="font-family: Noto Sans;">Online Quiz System</h4></center><br>
							<form onsubmit="validateform()" method="post" action="register.php" enctype="multipart/form-data">
                                <div class="form-group">
									<label>Enter Your Username:</label>
									<input type="text" name="name" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Email Id:</label>
									<input type="email" name="email" class="form-control" required />
								</div>
								
								<div class="form-group">
									<label>Enter Your College Name:</label>
									<input type="text" name="college" class="form-control" required />
								</div>
                                <div class="form-group">
									<label>Age:</label>
									<input type="text" name="age" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Gender:</label>
									<select id="gender" name="gender">
                                       <option value="">Select Gender</option>
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                       <option value="other">Other</option>
                                    </select>
								</div>
								<div class="form-group">
									<label>Branch:</label>
									<input type="text" name="branch" class="form-control" required />
								</div>
								<div class="form-group">
								  <label for="technical-skills">Technical Skills:</label><br>
                                    <input type="checkbox" id="c" name="technical" value="c">
                                    <label for="c">C</label><br>
                                    <input type="checkbox" id="java" name="technical" value="java">
                                    <label for="java">Java</label><br>
                                    <input type="checkbox" id="python" name="technical" value="python">
                                    <label for="python">Python</label><br>
                                    <input type="checkbox" id="jsp" name="technical" value="jsp">
                                    <label for="jsp">JSP</label><br>

								  </div>
								<div class="form-group">
									<label>:</label>Phone
									<input type="text" name="phone" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Password:</label>
									<input type="password" name="password" class="form-control" required />
                                </div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>



