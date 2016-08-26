<?php
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
  <link href="http://fonts.googleapis.com/css?family=Cuprum:400" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/standardize.css">
  <link rel="stylesheet" href="css/create_meeting-copy-grid.css">
  <link rel="stylesheet" href="css/create_meeting-copy.css">
</head>
<body class="body page-create_meeting-copy clearfix">
  <p class="logo">make-Meeting</p>
  <header class="header"></header>

  <p class="text text-1"><a href="meeting.php">home</a></p>
  <p class="text text-2"><a href="create_meeting-copy.php">record time</a></p>

  <section class="content"></section>
  <p class="heading">Record Time</p>
  <section class="form-box">
    <form method="post" action="create_meeting-copy.php">
    <input class="to" type="text" name="end">
    <p class="text-to">To</p>
    <input class="from from-1" type="text" name="begin">
    <p class="title title-1">Title</p>
    <button class="submit" type="submit">Submit</button>
    <p class="from from-2">From</p>
    <input class="title title-2" type="text" name="title">
  </form>
  </section>
</body>
</html>
