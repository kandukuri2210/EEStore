<?php
session_start();
if(!isset($_SESSION['issubmit']))
{
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $pwd=$_POST['password'];
    //$password = $_POST['password'];
    $host = "localhost";
    $username = "root";
    //$password = "";
    $dbname = "crudoperation";
    $con = mysqli_connect($host, $username, "", $dbname);
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    else{
        //$salt="codeflix";
        //$decpwd=sha1($pwd.$salt);
        $decpwd=md5($pwd);
        $query="SELECT * FROM crud WHERE email='$email' and password='$decpwd'";
        $fire=mysqli_query($con,$query);
       // $row=mysqli_fetch_assoc($fire);
        //$name=$row['name'];
        if(mysqli_num_rows($fire)==1){
        $_SESSION['is_submit']=true;
        $_SESSION['email']=$email;
        header("Location:../users/userdisplay.php");}
        else{
            header("Location:../users/invalid.php");
        }
    }
   /* $query="SELECT * FROM customers WHERE email='$email'";
    $fire=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($fire);
    $name=$row['name'];
    if($fire)
    {
        if(mysqli_num_rows($fire)==1)
        {
            $_SESSION['is_login']=true;
            $_SESSION['name']=$name;
            header("Location:userdisplay.php");
        }
        else{
            echo "Invalid username or password";
        }
    }*/
}
}
else{
    header("Location:sp.php");
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
    <style>
        form{
            border:2px solid black;
            width: 40%;
            margin-left:30%;
        }
        .form-control{
            margin:5px;
            width:48%;
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
        .logo{
            width:3px;
            height:3px;
            margin-left:2px;
           }
        </style>
        <script>
            function fun()
            {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") 
                    {
                        x.type = "text";
                    } else 
                    {
                        x.type = "password";
                    }
            }
        </script>
  </head>
  <body>
  <div class="logo"> 
            <img src="../logo.jpeg" width="400px" height="350px">
        </div>
   <div class="container my-5">
    <p>Please complete the login as a service provider</p>
   <form method="POST">
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" required id="myInput">
    <input type="checkbox" onclick="fun()" class="control">Show Password</input>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
  <p>Register if you don't have an account<a href="sp.php">Register here</a></p>
</form>
   </div>
  </body>
</html>