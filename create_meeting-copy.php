<?php
session_start();

//Create connection to db
$con=mysqli_connect("localhost","pinesoft_john","john123","pinesoft_john");
//$con=mysqli_connect("localhost","root","","meeting_app");
if(!$con){
  die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM record_time";
$query=mysqli_query($con,$sql);
$i=0;
if($query){
  if(mysqli_num_rows($query)){
    while($row=mysqli_fetch_assoc($query)){
      $data[$i]["title"]=$row["title"];
      $data[$i]["from"]=$row["begin"];
      $data[$i]["to"]=$row["end"];
      $i++;
    }
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
    <h1 class="heading">Record Time</h1>
  </section>

  <section class="content">
   <div class="container">
    <div class="row content-color">
      <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped data-table">
         <thead>
          <th>Title</th>
          <th>From</th>
          <th>To</th>
          <th>Options</th>
         </thead>
         <tbody>
        <?php foreach($data as $data) { ?>
          <tr>
           <td><?php echo $data['title']; ?></td>
           <td><?php echo $data['from']; ?></td>
           <td><?php echo $data['to']; ?></td>
           <td><small>View</small> &nbsp;<small>Edit</small>&nbsp; <small>Delete</small></td>
          </tr>
        <?php } ?>
         </tbody>
        </table>
        <a href="record-time.php" class="btn btn-primary">New Record</a>
        <a href="meeting.php" class="btn btn-success">Upcoming Meetings</a>
      </div>
    </div>
   </div>
  </section>
</body>
</html>
