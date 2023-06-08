<?php
//Inserting the issues of the end user into booking table
include '../conn.php';
//if(!isset($_SESSION['issubmit']))
//{
session_start();
$cat=$_GET['cat'];
//echo $cat;
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $uname=$_POST['uname'];
    $umail=$_POST['umail'];
    $uphno=$_POST['uphno'];
    $ulocality=$_POST['ulocality'];
    $ucategory=$_POST['ucategory'];
    $uproduct=$_POST['uproduct'];
    $uissue=$_POST['uissue'];
    $date=date("Y/m/d");
   /* $sq="Select * from `booking` where uname='$uname'";
    $result=mysqli_query($con,$sq);
    $pres=mysqli_num_rows($result);
    if($pres>0)
    {
      echo "User already exists";
    }*/
    //else{
    $sql="insert into `booking` (email,uname,umail,uphno,ulocality,ucategory,uproduct,uissue,dateofbook) values('$email','$uname','$umail','$uphno','$ulocality','$ucategory','$uproduct','$uissue','$date')";
    $res=mysqli_query($con,$sql);
        if($res)
        {
          $_SESSION['is_submit']=true;
          $_SESSION['email']=$email;
          $_SESSION['umail']=$umail;
          //echo "<a href='confirmbooking.php'>Click here</a>";
          //echo "successful session";
          header("Location:../sms.php");
            //echo "Some one will contact you shortly..";
          // header('location:display.php');
        // }
        }
        else{
          die(mysqli_error($con));
        }
     // }
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

    <title>Entering Issues</title>
    <style>
        form{
            border:2px solid black;
            width: 40%;
            margin-left:30%;
        }
        .form-control{
            margin:5px;
            border-color:black;
        }
        label{
            margin:5px;
            padding:2px;
            font-size:18px;
            color:brown;
        }
        button{
            margin-left:40%;
            padding:3px;
        }
        p{
            text-align:center;
            font-size:12px;
        }
        .required::after{
          content:' * ';
          color:red;
        }
        </style>
  </head>
  <body>
   <div class="container my-5">
    <p>Please provide your issue here..</p>
   <form method="POST">
  <div class="form-group">
    <label class="required">Sevice Provider email</label>
    <input type="email" class="form-control" value="<?php echo $_GET['smail'];?>" name="email" autocomplete="off" required>
    <label class="required">Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="uname" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label class="required">Category</label>
    <input type="text" class="form-control" value="<?php echo $_GET['cat'];?>" name="ucategory" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label class="required">Product</label>
    <input type="text" class="form-control" value="<?php echo $_GET['pro'];?>" name="uproduct" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label class="required">Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="umail" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label class="required">Mobile</label>
    <input type="text" class="form-control" placeholder="Enter your mobile number" name="uphno" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label class="required">Area</label>
    <input type="text" class="form-control" placeholder="Enter your area" name="ulocality" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label class="required">Issue</label>
    <input type="text" class="form-control" placeholder="Enter your issue with product" name="uissue" autocomplete="off" maxlength="2000" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Book</button>
</form>
   </div>
  </body>
</html>