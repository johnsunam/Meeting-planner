<?php
 $username=$pswd=$register=$info="";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
   $username=$_POST["username"];
   $password=$_POST["password"];

   //Create connection to db
   $con=mysqli_connect("localhost","root","","meeting_app");
   if(!$con){
     die("Connection failed: " . mysqli_connect_error());
   }
   $sql="SELECT id FROM login_details WHERE username='$username' AND password='$password'";
   $query=mysqli_query($con,$sql);

   if($query){
     if(mysqli_num_rows($query) > 0){
       header('Location:meeting.php');
     }
     else{
       echo $register="Not registered";
     }
   }

 }
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Login-Page</title>
  <link rel="stylesheet" href="css/standardize.css">
  <link rel="stylesheet" href="css/index-grid.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body class="body page-index clearfix">
  <h2 class="heading">Log-In</h2>
  <section class="login login-1"></section>
  <section class="login-box">
    <form method="POST" action="index.php">
    <input class="username" name="username" placeholder="Username" type="text" required />
    <input class="password" name="password" placeholder="Password" type="password" required />
    <button class="login" type="submit">login</button>
   </form>
   <p class="register"><a href="register.php">Register</a></p>
  </section>
</body>

</html>
