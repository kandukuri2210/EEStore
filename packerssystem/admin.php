<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Portal</title>
</head>
<body>
    <?php
    session_start();
    include "connect.php";
    if(isset($_POST['submit']))
    {
        // $aname=$_POST['adname'];
        // $apwd=$_POST['adpwd'];
        // if(!$con)
        // {
        //     echo 'Connection failed';
        // }
        // else
        // {
        //     $pwd=md5($apwd);
        //     $sql="INSERT into admin(aname,apassword) VALUES('$aname','$pwd')";
        //     $query=mysqli_query($con,$sql);
        //     if($query)
        //     {
        //         $_SESSION['is_submit']=true;
        //         $_SESSION['aname']=$aname;
        //         header("Location:dashboard.php");
        //     }
        //     else
        //     {
        //         echo 'Not inserted';
        //     }
        //}
        //$adname=$_SESSION['adname']
        $aname=$_POST['adname'];
        $apwd=$_POST['adpwd'];
        $pwd=md5($apwd);
        $_SESSION['issubmit']=true;
        $_SESSION['adname']=$aname;
       $sql="SELECT * from admin where aname='$aname' and apassword='$pwd'";
       $res=mysqli_query($con,$sql);
       if(mysqli_fetch_assoc($res)>0)
       {
        //echo "Inserted";

        header("Location:dashboard.php");
       }
       else{
        echo 'Register first';
       }
    }
    ?>
<div class="navbar">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="serviceprovider.html">Service Provider</a></li>
                <li><a href="booking.php">Book Request</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="admin.php">Admin Portal</a></li>
            </ul>
        </nav>
    </div>
<div class="content">
        <img src="truck.jpg" alt="Pic" width="100%" height="500px">
        <div class="text">
            <form method="POST" style="border:2px solid black; height:fit-content;margin-top:150px;margin-left:100px;background-color:bisque;width:300px;">
            <p style="display:center;">Please enter your login credentials</p>
            <label>Username</label>
            <input type="text" name="adname"><br>
            <label>Password</label>
            <input type="password" name="adpwd"><br><br>
            <a href="index.html" style="color:blue;text-decoration:none;float:left;">Go to website</a>
            <input type="submit" name="submit" style="float:right;"><br><br>
            </form>
        </div>
</div>
</body>
</html>