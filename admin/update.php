<?php
//Connecting the crud(service providers[sp.php]) table used in admin page to control service provisers data for updating
include '../conn.php';
$sid=$_GET['updateid'];
echo $sid;
$sql="Select * from `crud` where sid=$sid";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$area=$row['area'];
$locality=$row['locality'];
$password=$row['password'];
$tid=$row['id'];
$amt=$row['amount'];
$ptype=$row['payment_type'];
$pdate=$row['payment_date'];
$status=$row['status'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $area=$_POST['area'];
    $locality=$_POST['locality'];
    $category=$_POST['category'];
    $product=$_POST['product'];
    $date=$_POST['date'];
    $type=$_POST['pay_type'];
    $amt=$_POST['amt'];
    $tid=$_POST['tid'];
    $status=$_POST['status'];
    $password=$_POST['password'];
    $sql="update `crud` set sid=$sid, name='$name',email='$email',mobile='$mobile',area='$area',locality='$locality',category='$category',product='$product',password='$password',status='$status',payment_date='$date',payment_type='$type',amount=$amt,id='$tid' where sid=$sid";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data updated successfully";
        header('location:rightpane.html');
    }
    else{
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
    <label>Product Category</label>
   <select name="category">
    <option value="Electric">Electric</option>
    <option value="Electronic">Electronic</option>
</select>
  </div>
  <div class="form-group">
    <label>Product</label>
   <select name="product">
    <option value="stove">stove</option>
    <option value="calculator">calculator</option>
    <option value="mixi">mixi</option>
    <option value="grinder">grinder</option>
    <option value="heater">heater</option>
    <option value="laptop">laptop</option>
    <option value="refrigerator">refrigerator</option>
    <option value="fan">fan</option>
    <option value="mobile">mobile</option>
    <option value="ac">ac</option>
    <option value="speaker">speaker</option>
    <option value="bulb">bulb</option>
</select>
  </div>
  <div class="form-group">
    <label>Payment Date</label>
    <input type="date" class="form-control"  name="date" autocomplete="off" value=<?php echo $pdate;?>>
  </div>
  <div class="form-group">
    <label>Payment Type</label>
    <input type="text" class="form-control"  name="pay_type" autocomplete="off" value=<?php echo $ptype;?>>
  </div>
  <div class="form-group">
    <label>Amount</label>
    <input type="text" class="form-control"  name="amt" autocomplete="off" value=<?php echo $amt;?>>
  </div>
  <div class="form-group">
    <label>Transaction Id</label>
    <input type="text" class="form-control"  name="tid" autocomplete="off" value=<?php echo $tid;?>>
  </div>
  <div class="form-group">
    <label>Payment status</label>
    <input type="text" class="form-control"  name="status" autocomplete="off" value=<?php echo $status;?>>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value=<?php echo $password;?>>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
   </div>

  </body>
</html>
