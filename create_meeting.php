<?php
$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $title=$_POST["title"];
  $detail=htmlspecialchars($_POST["meeting-detail"]);
  $created_date = date("Y-m-d H:i:s");
  $updated_date = date("Y-m-d H:i:s");

  //Create connection to db
  $con=mysqli_connect("localhost","root","","meeting_app");
  if(!$con){
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql="INSERT INTO meeting (title,description,created_at,updated_at) VALUES ('$title','$description','$created_date','$updated_date') ";
  $query=mysqli_query($con,$sql);
  if($query){
    $success="Successfully inserted";
    echo $success;
    $_POST["title"]="";
    $_POST["meeting-detail"]="";
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
  <link href="http://fonts.googleapis.com/css?family=Cuprum:400" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/standardize.css">
  <link rel="stylesheet" href="css/create_meeting-grid.css">
  <link rel="stylesheet" href="css/create_meeting.css">
</head>
<body class="body page-create_meeting clearfix">
  <header class="header"></header>
  <p class="heading">New Meeting</p>
  <p class="logo">make-Meeting</p>
  <section class="content"></section>

  <p class="text text-1"><a href="create_meeting-copy.php">record time</a></p>
  <p class="text text-2"><a href="meeting.php">home</a></p>

<form method="post" action="create_meeting.php">
  <button class="submit" type="submit">Submit</button>
  <section class="form-box">
    <p class="meet-details">Details</p>
    <textarea class="details" name="meeting-detail"></textarea>
    <p class="text-title">Title</p>
    <input class="title" type="text" name="title">
  </section>
</form>

</body>
</html>
