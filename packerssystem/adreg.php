<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    include "connect.php";
    session_start();
    if(isset($_POST['submit']))
    {
        $adname=$_POST['adname'];
        $admail=$_POST['admail'];
        $adphone=$_POST['adphone'];
        $adpwd=$_POST['adpwd'];
        $pwd=md5($adpwd);
        if($con)
        {
            $_SESSION['issubmit']=true;
            $_SESSION['adname']=$aname;
            $sql="INSERT into admin(aname,amail,aphone,apassword) values('$adname','$admail','$adphone','$pwd')";
            $query=mysqli_query($con,$sql);
            if($query)
            {
                header("Location:admin.php");
            }
            else
            {
                echo "Not inserted!!";
            }
        }
    }
    ?>
<div class="request">
        <div class="title">
            <div>
            <p style="color:white;padding:20px;margin-left:10px;"><strong>Admin Register</strong></p>
            </div>
        </div>
    <div class="form">
    <form method="POST" class="form1">
        <label>Admin Name</label>
        <input type="text" name="adname" required><br>
        <label>Admin Mail</label>
        <input type="email" name="admail" required><br>
        <label>Admin Phone</label>
        <input type="phone" name="adphone" required><br>
        <label>Admin Password</label>
        <input type="password" name="adpwd" required><br><br>
        <input type="submit" name="submit" style="border-radius:30%; background-color:blue; margin-left:40%;">
    </form> 
    </div>

</body>
</html>