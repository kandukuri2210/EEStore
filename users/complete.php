<?php
//Updating the completion status by service provider after contacting user
$host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crudoperation";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
$uid=$_GET['completeid'];
$sql="Select * from `booking` where uid=$uid";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$status=$row['status'];
$date=date("y/m/d");
$sql="update `booking` set status='completed',dateofcomplete='$date' where uid=$uid";
$result=mysqli_query($con,$sql);
if($result){
    echo "Data updated successfully";
    //header('location:display.php');
}
else{
    die(mysqli_error($con));
}
?>

<!--
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Crud Operations</title>
  </head>
  <body>
   <div class="container my-5">
   <form method="POST">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name;?>>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value=<?php echo $email;?>>
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off" value=<?php echo $mobile;?>>
  </div>
  <div class="form-group">
    <label>Area</label>
    <input type="text" class="form-control" placeholder="Enter your area" name="area" autocomplete="off" value=<?php echo $area;?>>
  </div>
  <div class="form-group">
    <label>Locality</label>
    <input type="text" class="form-control" placeholder="Enter your locality" name="locality" autocomplete="off" value=<?php echo $locality;?>>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value=<?php echo $password;?>>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
   </div>

  </body>
</html>-->
