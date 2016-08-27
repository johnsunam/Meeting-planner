<?php
session_start();
//Create connection to db
$con=mysqli_connect("localhost","root","","meeting_app");
if(!$con){
  die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT title,updated_at FROM meeting";
$query=mysqli_query($con,$sql);
$i=0;
if($query){
  if(mysqli_num_rows($query)){
    while($row=mysqli_fetch_assoc($query)){
      $data[$i]["title"]=$row["title"];
      $data[$i]["updated"]=$row["updated_at"];
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
  <title>Create-meeting</title>
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
    <h1 class="heading">Upcoming Meetings</h1>

  </section>

  <section class="content">
   <div class="container">
    <div class="row content-color">
      <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped data-table">
         <thead>
          <th>Description</th>
          <th>Last Updated</th>
          <th>Options</th>
         </thead>
         <tbody>
         <?php foreach($data as $data){ ?>
          <tr>
           <td><?php echo $data["title"]; ?></td>
           <td><?php echo $data["updated"]; ?></td>
           <td><small>View</small> &nbsp;<small>Edit</small>&nbsp; <small>Delete</small></td>
          </tr>
         <?php } ?>
         </tbody>
        </table>
        <a href="create_meeting.php" class="btn btn-primary">Create Meeting</a>
        <a href="create_meeting-copy.php" class="btn btn-success">Record Hour</a>
      </div>
    </div>
   </div>
  </section>

</body>
</html>
