<?php
session_start();

$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $title=$_POST["title"];
  $begin=$_POST["begin"];
  $end = $_POST["end"];

  //Create connection to db
  $con=mysqli_connect("localhost","root","","meeting_app");
  if(!$con){
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql="INSERT INTO record_time (title,begin,end) VALUES ('$title','$begin','$end') ";
  $query=mysqli_query($con,$sql);
  if($query){
    $success="Successfully inserted";
    echo $success;
    $_POST["title"]="";
    $_POST["begin"]="";
    $_POST["end"]="";
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
    <h1 class="heading">New Record Time</h1>
  </section>

  <section class="content">
   <div class="container">
    <div class="row content-color">
      <div class="col-md-8 col-md-offset-2">
        <p class="bg-success"><?php echo $success; ?></p>
        <form method="post" action="record-time.php">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="begin">Start Time</label>
            <input type="text" name="begin" class="form-control" id="begin" placeholder="Start Time">
          </div>
          <div class="form-group">
            <label for="end">End Time</label>
            <input type="text" name="end" class="form-control" id="end" placeholder="End Time">
          </div>
          <button class="btn btn-default" type="submit">Record</button>
        </form>
        <hr/>
        <a href="create_meeting-copy.php" class="btn btn-primary">Back</a>
      </div>
    </div>
   </div>
  </section>
</body>
</html>
