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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction details</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <style>
          
  table,thead,td,th 
  {
    border:2px solid black;
    border-collapse:collapse;
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
          <button class="btn btn-primary my-5"><a href="rightpane.html" class="text-light">Back</a></button>
          <!--  <button class="btn btn-primary my-5"><a href="sp.php" class="text-light">Add user</a>
        </button>
        <button class="btn3"><a href="qr.html" class="text">Paymentgateway</a></button>-->
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Payment Id</th>
      <th scope="col">Service Provider Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">City</th>
      <th scope="col">Amount</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Payment Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
$sql="Select * from `paymentdetails`";
$result=mysqli_query($con,$sql);
if($result){
    while( $row=mysqli_fetch_assoc($result)){
        $payid=$row['payid'];
        $sname=$row['sname'];
        echo $sname;
        $email=$row['email'];
        $mobile=$row['mobile'];
        $city=$row['city'];
        $amount=$row['amount'];
        $payment_type=$row['payment_type'];
        $payment_status=$row['payment_status'];
        //$area=$row['area'];
        //$locality=$row['locality'];
        //$password=$row['password'];
        echo '<tr>
        <th scope="row">'.$payid.'</th>
        <td>'.$sname.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$city.'</td>
        <td>'.$amount.'</td>
        <td>'.$payment_type.'</td>
        <td>'.$payment_status.'</td>
      </tr>';
    }
}
    ?>
  </tbody>
</table>
        </div>
    </body>
</html>
