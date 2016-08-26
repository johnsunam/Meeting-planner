<?php
//Create connection to db
$con=mysqli_connect("localhost","root","","meeting_app");
if(!$con){
  die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT title,updated_at FROM meeting";
$query=mysqli_query($con,$sql);
if($query){
  if(mysqli_num_rows($query)){
    while($row=mysqli_fetch_assoc($query)){
      echo $row["title"]."<br/>";
    }
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Create-meeting</title>
  <link href="http://fonts.googleapis.com/css?family=Cuprum:400" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/standardize.css">
  <link rel="stylesheet" href="css/meeting-grid.css">
  <link rel="stylesheet" href="css/meeting.css">
</head>
<body class="body page-meeting clearfix">
  <section class="menu">
    <p class="record-time"><a href="create_meeting-copy.php">record time</a></p>
    <p class="home"><a href="meeting.php">home</a></p>
  </section>
  <section class="content content-1"></section>
  <p class="heading">Upcoming Meetings</p>
  <p class="logo">make-Meeting</p>
  <header class="header"></header>
  <section class="content content-2">
    <p class="options">Options</p>
    <p class="updatement">Last Updated</p>
    <p class="description">Description</p>
  </section>
  <button class="create-meeting">Create Meeting</button>
</body>
</html>
