<?php 

  session_start();

  require 'wallconnect.php';
  require 'functions.php';

  if(isset($_POST['update'])) {

    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $password= clean($_POST['password']);
    $college = clean($_POST['college']);
    $age = clean($_POST['age']);
    $gender = clean($_POST['gender']);
    $branch = clean($_POST['branch']);
    $technical = clean($_POST['technical']);
    $phone = clean($_POST['phone']);
   

    $query = "UPDATE students SET  name= '$name', email = '$email', password= '$password', college = '$college', age='$age', gender='$gender',branch='$branch', technical='$technical', phone='$phone' WHERE email='$email'";

    if($result = mysqli_query($con, $query)) {

      $_SESSION['prompt'] = "Profile Updated";
      header("location:wallprofile.php");
      exit;

    } else {

      die("Error with the query");

    }

  }

  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Profile - Student Information System</title>

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

  <section>
    
    <div class="container">
      <strong class="title">Edit Profile</strong>
    </div>
    

    <div class="edit-form box-left clearfix">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <div class="form-group">
          <label>Name:</label>
          
          <?php 
            $query = "SELECT studentno FROM students WHERE id = '".$_SESSION['userid']."'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);

            echo "<p>".$row[0]."</p>";
          ?>

        </div>


        <div class="form-group">
          <label for="firstname">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>


        <div class="form-group">
          <label for="lastname">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="lastname">Password</label>
          <input type="text" class="form-control" name="password" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="lastname">College</label>
          <input type="text" class="form-control" name="college" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="lastname">Age</label>
          <input type="text" class="form-control" name="age" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="course">Gender</label>

          <select class="form-control" name="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
             
            </select>

        </div>
        <div class="form-group">
          <label for="lastname">Branch</label>
          <input type="text" class="form-control" name="branch" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="lastname">Phone</label>
          <input type="text" class="form-control" name="phone" placeholder="Email" required>
        </div>


        <div class="form-group">
          <label for="course">Technical Skills</label>

          <select class="form-control" name="course">
              <option value="C">C</option>
              <option value="C++">C++</option>
              <option value="Java">Java</option>
              <option value="Python">Python</option>
              
            </select>

        </div>


       
        
        <div class="form-footer">
          <a href="wallprofile.php">Go back</a>
          <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
        </div>
        

      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>

<?php 

  } else {
    header("location:wallprofile.php");
  }

  mysqli_close($con);

?>