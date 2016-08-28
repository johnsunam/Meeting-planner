<?php
session_start();

$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $title=$_POST["title"];
  $detail=htmlspecialchars($_POST["meeting-detail"]);
  $created_date = date("Y-m-d H:i:s");
  $updated_date = date("Y-m-d H:i:s");

  //Create connection to db
  //$con=mysqli_connect("localhost","root","","meeting_app");
  $con=mysqli_connect("localhost","pinesoft_john","john123","pinesoft_john");
  if(!$con){
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql="INSERT INTO meeting (title,description,created_at,updated_at) VALUES ('$title','$detail','$created_date','$updated_date') ";
  $query=mysqli_query($con,$sql);
  if($query){
    $success="Successfully inserted";
    $_POST["title"]="";
    $_POST["meeting-detail"]="";
  }
  else{
    $success="Error";
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>create-meeting</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/style.js"></script>
</head>
<body class="body">
  <header class="header">
   <h1 class="logo">make-Meeting</h1>
   <button class="username btn btn-danger btn-xs" onclick="goTo()"><?php echo $_SESSION['username']; ?></button>
  </header>

  <section>
    <h1 class="heading">New Meeting</h1>
  </section>

  <section class="content">
   <div class="container">
    <div class="row content-color">
      <div class="col-md-8 col-md-offset-2">
        <p class="bg-success"><?php echo $success; ?></p>
        <form method="post" action="create_meeting.php">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="details">Meeting Details</label>
            <textarea id="details" class="form-control" rows="3" name="meeting-detail"></textarea>
          </div>
          <button class="btn btn-default" type="submit">Create</button>
        </form>
        <hr/>
        <a href="meeting.php" class="btn btn-primary">Back</a>
      </div>
    </div>
   </div>
  </section>
</body>
</html>
