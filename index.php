<?php
 $username=$pswd=$register=$info="";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
   $username=$_POST["username"];
   $password=$_POST["pass"];

    session_start();

   //Create connection to db
   $con=mysqli_connect("localhost","root","","meeting_app");
   if(!$con){
     die("Connection failed: " . mysqli_connect_error());
   }
   $sql="SELECT id,username FROM login_details WHERE username='$username' AND password='$password'";
   $query=mysqli_query($con,$sql);

   if($query){
     if(mysqli_num_rows($query) > 0){
       while($row=mysqli_fetch_assoc($query)){
         $_SESSION["username"]=$row["username"];
         header('Location:meeting.php');
       }
     }
     else{
       $register="You are not registered";
     }
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
             <h3 class="panel-title">Sign In Here</h3>
           </div>
           <div class="panel-body">
             <p class="bg-success"><?php echo $register; ?></p>
             <form method="post" action="index.php">
               <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" name="username" class="form-control" id="username" placeholder="Pick Username">
               </div>
               <div class="form-group">
                 <label for="pass">Password</label>
                 <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter Password">
               </div>
               <button class="btn btn-default" type="submit">Sign In</button>
             </form>
             <br/>
             <p class="text-center text-muted">Don't have an account? <a href="register.php">Register Here</a></p>
           </div>
       </div>
      </div>
    </div>
   </div>
  </section>
</body>

</html>
