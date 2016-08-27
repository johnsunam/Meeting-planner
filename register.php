<?php
$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $firstName=$_POST["name"];
  $username=$_POST["username"];
  $password=$_POST["pass"];
  $email=$_POST["email"];

  //Create connection to db
  $con=mysqli_connect("localhost","root","","meeting_app");
  if(!$con){
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql="INSERT INTO login_details (firstname,username,password,email) VALUES ('$firstName','$username','$password','$email') ";
  $query=mysqli_query($con,$sql);
  if($query){
    $success="Successfully inserted";
    $_POST["name"]="";
    $_POST["username"]="";
    $_POST["pass"]="";
    $_POST["email"]="";
  }
  else{
    $success = "Error";
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="body">
  <section class="register">
   <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default register-panel">
           <div class="panel-heading">
             <h3 class="panel-title">Sign Up</h3>
           </div>
           <div class="panel-body">
             <p class="bg-success"><?php echo $success; ?></p>
             <form method="post" action="register.php">
               <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
               </div>
               <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" name="username" class="form-control" id="username" placeholder="Pick Username">
               </div>
               <div class="form-group">
                 <label for="pass">Password</label>
                 <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter Password">
               </div>
               <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
               </div>
               <button class="btn btn-default" type="submit">Sign Up</button>
             </form>
             <br/>
             <p class="text-center text-muted">Already have an account? <a href="index.php">Sign In</a></p>
           </div>
       </div>
      </div>
    </div>
   </div>
  </section>
</body>

</html>
