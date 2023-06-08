<?php
//Displaying in the grid format from booking table on logging in as service provider page
//$host = "localhost";
   // $username = "root";
    //$password = "";
   // $dbname = "admin_details";
    //$con = mysqli_connect($host, $username, $password, $dbname);
    //if (!$con)
    //{
     //   die("Connection failed!" . mysqli_connect_error());
    //}
    include '../conn.php';
    session_start();
    //$email=$_SESSION['email'];
    if(($_SESSION['is_submit'])){
      $email=$_SESSION['email'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud operation</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <style>
          
          .btn3{
            background-color:blue;
            margin-left:50%;
            border-color:blue;
            border-radius:5%;
          }
          .btn4{
            background-color:blue;
            margin-left:50%;
            border-color:blue;
            border-radius:5%;
          }
          .text{
            color:white;
            text-decoration:none;
            padding:2px;
            margin:2px;
          }
          .text:hover{
            color:gray;
          }
          table,thead,tr,th,td{
            border:2px solid white;
            background-color:grey;
            color:white;
          }
          body{
            object-fit:contain;
            background-color:white;
          }
          .logo{
            width:3px;
            height:3px;
            margin-left:2px;
            margin-right:50px;
           }
           th{
            margin-left:250px;
           }
          </style>
    </head>
    <body>
   <!-- <div class="logo"> 
            <img src="../logo.jpeg" width="60px" height="50px">
        </div>-->
      <div>
      <div style="text-align:center;color:black;"><?php $query="Select * from `crud` where email='$email'";
      $fire=mysqli_query($con,$query);
      $res=mysqli_fetch_assoc($fire);
      $name=$res['name'];
      $sid=$res['sid'];
      echo '<tr><th scope="row">Welcome '.$name.'</th></tr>';
      echo "<button class='btn3'><a href='../users/update.php?updateid=$sid' class='text'>Edit Profile</a></button>";
      ?>
      <a href="../logout.php" title="logout" target="_top" style="text-align:right;float:right;"><img src="../images/logout.jpg" alt="logout" width="30px" height="30px"/></a>
      </div>
      <!--<div style="text-align:right; margin-top:0px;">
      <a href="../logout.php" title="logout" target="_top" style="text-align:right"><img src="../images/logout.jpg" alt="logout" width="30px" height="30px"/></a>
      </div>-->
        <div class="container">
          <button class="btn btn-primary my-5"><a href="../admin/rightpane.html" class="text-light">Back</a></button>
          <!--  <button class="btn btn-primary my-5"><a href="sp.php" class="text-light">Add user</a>
        </button>--> 
        <div class="btn">
        <button class="btn4"><a href="../serviceproviders/thankyou.php?id=<?php echo $sid?>" class="text">Offline Mode</a></button>
        <button class="btn3"><a href="../serviceproviders/checkin.php" class="text">Online Payment</a></button>
        </div>
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">Service Provider</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">State</th>
      <th scope="col">Category</th>
      <th scope="col">Product</th>
      <th scope="col">Issue</th>
      <th scope="col">Date of Booking</th>
      <th scope="col">Status</th>
      <th scope="col">Date of Complete</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
$sql="Select * from `booking` where email='$email'";
$result=mysqli_query($con,$sql);
if($result){
    while( $row=mysqli_fetch_assoc($result)){
        $uid=$row['uid'];
        $email=$row['email'];
        $uname=$row['uname'];
        $umail=$row['umail'];
        $uphno=$row['uphno'];
        $ulocality=$row['ulocality'];
        $ucategory=$row['ucategory'];
        $uproduct=$row['uproduct'];
        $uissue=$row['uissue'];
        $dateofbook=$row['dateofbook'];
        $status=$row['status'];
        $dateofcomplete=$row['dateofcomplete'];
        //$area=$row['area'];
        //$locality=$row['locality'];
        //$password=$row['password'];
        echo "<tr>
        <th scope='row'>$uid</th>
        <td>$email</td>
        <td>$uname</td>
        <td>$umail</td>
        <td>$uphno</td>
        <td>$ulocality</td>
        <td>$ucategory</td>
        <td>$uproduct</td>
        <td>$uissue</td>
        <td>$dateofbook</td>
        <td>$status</td>
        <td>$dateofcomplete</td>
        <td>
        <button class='btn btn-primary'><a href='complete.php?completeid=$uid' class='text-light'>Complete</a></button>
        </td>
      </tr>";
    }
}
    ?>
  </tbody>
</table>
        </div>
    </body>
</html>
