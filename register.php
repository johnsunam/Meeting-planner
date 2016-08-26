<?php
$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $firstName=$_POST["fname"];
  $midName=$_POST["mname"];
  $lastName=$_POST["lname"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  $email=$_POST["email"];

  //Create connection to db
  $con=mysqli_connect("localhost","root","","meeting_app");
  if(!$con){
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql="INSERT INTO login_details (firstname,lastName,middleName,username,password,email) VALUES ('$firstName','$lastName','$midName','$username','$password','$email') ";
  $query=mysqli_query($con,$sql);
  if($query){
    $success="Successfully inserted";
    echo $success;
    $_POST["fname"]="";
    $_POST["mname"]="";
    $_POST["lname"]="";
    $_POST["username"]="";
    $_POST["password"]="";
    $_POST["email"]="";
  }
  else{
    echo "Error";
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="css/standardize.css">
  <link rel="stylesheet" href="css/register-grid.css">
  <link rel="stylesheet" href="css/register.css">
</head>

<body class="body page-register clearfix">
  <h2 class="heading">Sign Up</h2>
  <section class="register register-1"></section>
  <section class="register-box">

  <form method="post" action="register.php">
    <input class="firstname" placeholder="Firstname" name="fname" type="text" required />
    <input class="mname" placeholder="Middlename" name="mname" type="text">
    <input class="lastname" placeholder="Lastname" name="lname" type="text" required />
    <input class="username" placeholder="Username" name="username" type="text" required />
    <input class="password" placeholder="Password" name="password" type="password" required />
    <input class="email" placeholder="Email" name="email" type="email" required />
    <button class="register" type="submit">Register</button>
  </form>

  </section>
</body>

</html>
