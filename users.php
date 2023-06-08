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
    include 'conn.php';
   // session_start();
    //$email=$_SESSION['email'];
   // if(($_SESSION['is_submit'])){
     // $email=$_SESSION['email'];
    //}
    function func($feedback){
      $stars = "";
    for ($i = 1; $i <= 5; $i++) { 
      $i <= $feedback ? $stars .= "&#9733" : $stars .= "&#9734;";
    }
    
    return $stars;
    }
    function get_pending()
    {
      include "conn.php";
      if($con)
      {
      $pend="Select * from `booking` where status='Pending'";
      if($result=mysqli_query($con,$pend))
      {
      $rowcount=mysqli_num_rows($result);
      echo $rowcount;
      }
      else
      echo 'Error';
    }
    else
    {
      echo "No connection";
    }
    }
    function get_completed()
    {
      include "conn.php";
      if($con)
      {
      $pend="Select * from `booking` where status='completed'";
      if($result=mysqli_query($con,$pend))
      {
      $rowcount=mysqli_num_rows($result);
      echo $rowcount;
      }
      else
      echo 'Error';
    }
    else
    {
      echo "No connection";
    }
    }
    function get_all()
    {
      include "conn.php";
      if($con)
      {
      $pend="Select * from `booking`";
      if($result=mysqli_query($con,$pend))
      {
      $rowcount=mysqli_num_rows($result);
      echo $rowcount;
      }
      else
      echo 'Error';
    }
    else
    {
      echo "No connection";
    }
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
          table,thead,td,th 
          {
            border:2px solid black;
            
          }
          .btn3{
            background-color:blue;
            margin-left:80%;
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
          </style>
    </head>
    <body>
        <div class="container">
          <button class="btn btn-primary my-5"><a href="admin/rightpane.html" class="text-light">Back</a></button>
          <!--  <button class="btn btn-primary my-5"><a href="sp.php" class="text-light">Add user</a>
        </button>
        <button class="btn3"><a href="qr.html" class="text">Paymentgateway</a></button>-->
         <button class="btn btn-primary my-5"><a href="users.php?pending" name="pending" class="text-light">Pending   <?php get_pending();?></a></button>
            <button class="btn btn-primary my-5"><a href="users.php?completed" name="completed" class="text-light">Completed  <?php get_completed();?></a></button>
            <button class="btn btn-primary my-5"><a href="users.php?all" name="all" class="text-light">All  <?php get_all();?></a></button>
        </div>
        <div name="display">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">Service Provider</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Locality</th>
      <th scope="col">Category</th>
      <th scope="col">Product</th>
      <th scope="col">Issue</th>
      <th scope="col">Rating(/5)</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_GET['all']))
    {
$sql="Select * from `booking` order by status desc";
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
        $feedback=$row['feedback'];
        $status=$row['status'];
        //$area=$row['area'];
        //$locality=$row['locality'];
        //$password=$row['password'];
        echo '<tr>
        <th scope="row">'.$uid.'</th>
        <td>'.$email.'</td>
        <td>'.$uname.'</td>
        <td>'.$umail.'</td>
        <td>'.$uphno.'</td>
        <td>'.$ulocality.'</td>
        <td>'.$ucategory.'</td>
        <td>'.$uproduct.'</td>
        <td>'.$uissue.'</td>
        <td>'.func($feedback).'</td>
        <td>'.$status.'</td>
        <td>
        <button class="btn btn-primary"><a href="users/complete.php?completeid='.$uid.'" class="text-light" onclick="return conf()">Complete</a></button>
        </td>
      </tr>';
      
  }
} 
    }
if(isset($_GET['pending']))
        {
            $query="Select * from `booking` where status='Pending'";
            $res=mysqli_query($con,$query);
            while( $row=mysqli_fetch_assoc($res))
            {
                $feedback=func($row['feedback']);
                $uid=$row['uid'];
                $email=$row['email'];
                $uname=$row['uname'];
                $umail=$row['umail'];
                $uphno=$row['uphno'];
                $ulocality=$row['ulocality'];
                $ucategory=$row['ucategory'];
                $uproduct=$row['uproduct'];
                $uissue=$row['uissue'];
                //$feedback=$row['feedback'];
                $status=$row['status'];
                echo "<tr><td></td>
                <td>$uid</td>
                <td>$email</td>
                <td>$uname</td>
                <td>$umail</td>
                <td>$uphno</td>
                <td>$ulocality</td>
                <td>$ucategory</td>
                <td>$uproduct</td>
                <td>$uissue</td>
                <td>$feedback</td>
                <td>$status</td>
                <td><button class='btn btn-primary'><a href='users/complete.php?completeid=$uid'class='text-light' onclick='return conf()'>Complete</a></button></td>
                </tr>";
            }
           echo "</table>";
        }
        if(isset($_GET['completed']))
        {
            $query="Select * from `booking` where status='completed'";
            $res=mysqli_query($con,$query);
            while( $row=mysqli_fetch_assoc($res))
            {
                $feedback=func($row['feedback']);
                $uid=$row['uid'];
                $email=$row['email'];
                $uname=$row['uname'];
                $umail=$row['umail'];
                $uphno=$row['uphno'];
                $ulocality=$row['ulocality'];
                $ucategory=$row['ucategory'];
                $uproduct=$row['uproduct'];
                $uissue=$row['uissue'];
                //$feedback=$row['feedback'];
                $status=$row['status'];
                echo "<tr>
                <td>$uid</td>
                <td>$email</td>
                <td>$uname</td>
                <td>$umail</td>
                <td>$uphno</td>
                <td>$ulocality</td>
                <td>$ucategory</td>
                <td>$uproduct</td>
                <td>$uissue</td>
                <td>$feedback</td>
                <td>$status</td>
                <td><button class='btn btn-primary'><a href='users/complete.php?completeid=$uid'class='text-light' onclick='return conf()'>Complete</a></button></td>
                </tr>";
            }
            echo "</table>";
        }
    ?>
  </tbody>
</table>
        </div>
        <script>
          function conf(){
      return confirm("Are you sure?");
    }
          </script>
    </body>
</html>
