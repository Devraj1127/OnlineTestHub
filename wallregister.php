<?php 

  // session_start();

  // require 'wallconnect.php';
  // require 'functions.php';


  // if(isset($_POST['register'])) {

  //   $name = clean($_POST['name']); 
  //   $password = clean($_POST['password']); 
  //   $email = clean($_POST['email']); 
  //   $branch = clean($_POST['branch']); 
  //   $college = clean($_POST['college']); 
  //   $age = clean($_POST['age']); 
  //   $phone = clean($_POST['phone']); 
  //   $gender = clean($_POST['gender']); 
  //   $technical = clean($_POST['technical']);

  //   $query = "SELECT name FROM students WHERE name = '$name'";
  //   $result = mysqli_query($con,$query);

  //   if(mysqli_num_rows($result) == 0) {

  //     $query = "SELECT email FROM students WHERE email = '$email'";
  //     $result = mysqli_query($con,$query);

  //     if(mysqli_num_rows($result) == 0) {

  //       $query = "INSERT INTO students (name, password, email, branch, college, age, phone, gender,technical)
  //       VALUES ('$name', '$password', '$email', '$branch', '$college', '$age', '$phone', '$gender', '$technical";

  //       if(mysqli_query($con, $query)) {

  //         $_SESSION['prompt'] = "Account registered. You can now log in.";
  //         header("location:wallindex.php");
  //         exit;

  //       } else {

  //         die("Error with the query");

  //       }

  //     } else {

  //       $_SESSION['errprompt'] = "That student number already exists.";

  //     }

  //   } else {

  //     $_SESSION['errprompt'] = "name already exists.";

  //   }

  // } 
	session_start();

  require 'wallconnect.php';
  require 'functions.php';
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
            header("refresh:0;url=walllogin.php");
        }
		else
		{
            $str="insert into students set name='$name',email='$email',password='$password',college='$college',age='$age' ,gender='$gender', branch='$branch', technical='$technical', phone='$phone'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header("location:wallindex.php");
		}
    }


?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Register - Student Information System</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php include 'wallheader.php'; ?>

  <section class="center-text">
    
    <strong>Register</strong>

    <div class="registration-form box-center clearfix">

    <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
        }
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="row">
          <div class="account-info col-sm-6">
          
            <fieldset>
              <legend>Registration</legend>
              
             
              <div class="form-group">
                <label for="password">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
              </div>
              <div class="form-group">
                <label for="password">College</label>
                <input type="text" class="form-control" name="college" placeholder="Enter college" required>
              </div>
              <div class="form-group">
                <label for="password">Branch</label>
                <input type="text" class="form-control" name="branch" placeholder="Enter branch" required>
              </div>
              <div class="form-group">
								  <label for="technical">Technical Skills:</label><br>
                    <input type="checkbox" id="c" name="technical" value="c">
                    <label for="c">C</label><br>
                    <input type="checkbox" id="java" name="technical" value="java">
                    <label for="java">Java</label><br>
                    <input type="checkbox" id="python" name="technical" value="python">
                    <label for="python">Python</label><br>
                    <input type="checkbox" id="jsp" name="technical" value="jsp">
                     <label for="jsp">JSP</label><br>

								  </div>
            </fieldset>
            

          </div>

          <div class="personal-info col-sm-6">
            
            <fieldset>
              <legend>Personal Info</legend>
              
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name " required>
              </div>

              <!-- <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Student Number (must be unique)" required>
              </div> -->

              <div class="form-group">
                <label for="gender">Gender</label>

                <select class="form-control" name="gender">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </select>

              </div>
              <div class="form-group">
                <label for="college">Age : </label>
                <input type="text" class="form-control" name="age" placeholder="Enter Age" required>
              </div>
              <div class="form-group">
                <label for="college">Phone no : </label>
                <input type="text" class="form-control" name="phone" placeholder="Enter Phone no" required>
              </div>
              <!-- <div class="form-group">
                <label for="college"> : </label>
                <input type="text" class="form-control" name="phone" placeholder="Last Name" required>
              </div> -->

              

              

            </fieldset>
            

          </div>
        </div>

        
        
        <a href="index.php">Go back</a>
        <input class="btn btn-primary" type="submit" name="register" value="Register">



      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>