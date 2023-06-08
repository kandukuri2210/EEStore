<!-- This is to display a pager with Users and Service providers links to grid view-->
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "admin_details";
$con = mysqli_connect($host, $username, $password, $dbname);
//$sql="Select * from `admi`";
session_start();
//$result=mysqli_query($con,$sql);
//$row=mysqli_fetch_assoc($result);
if($_SESSION['is_login'])
{
    //keep user on same
    $mid=$_SESSION['mail'];
    $sql="Select * from `admi` where mail='$mid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    if($result){
        $uname=$row['user'];
    }

}
else{
    //redirect
    header("Location:adregister.html");
}
/*if($result){
    $uid=$row['user'];
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kinds of logins</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .kinds 
            {
                width: auto;
                height: auto;
                margin: 0 auto;
                padding: 10px;
                position: relative;
            }
            .right{
                float:right;
                margin-top:30px;
            }
            img{
               
                margin-right:400px;
                margin-left:1px;
                border-radius:50%;
            }
        </style>

    </head>
    <body>
        <!--<div class="container">
            <div class="navbar">
                    <nav>
                        <ul id="Menuitems">
                            <li><a href="display.php" target="content">Service Providers</a></li>
                            <li><a href="users.php" target="content">Users</a></li>
                            <li><a href="payments.php" target="content">Payment details</a></li>
                        </ul>
                    </nav>
            </div>
            </div>-->
            
                <div class="bg-info align-items-center text-align-center">
                    <div class="kinds">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <img src="../logo.jpeg" width="100px" height="100px">
                        <button type="button" class="btn btn-secondary"><a href="../serviceproviders/display.php" target="content" class="text-light">Service Providers</a></button>
                        <button type="button" class="btn btn-secondary"><a href="../users.php" target="content" class="text-light">Users</a></button>
                        <button type="button" class="btn btn-secondary"><a href="../serviceproviders/payments.php" target="content" class="text-light">Payment details</a></button>
                        <button type="button" class="btn btn-secondary"><a href="../viewedusers.php" target="content" class="text-light">Summary</a></button>
                        <button type="button" class="btn btn-secondary"><a href="../rating.php" target="content" class="text-light">Website ratings</a></button>
                    </div>
                    <div class="right">
                    <pre><strong><?php echo $uname;?></strong>  <a href="logout.php" target="_top" style="color:black;"><i class="fa fa-power-off" style="font-size:36px"></i></a></pre>
        </div>
                </div>
            </div>
            
            
    </body>
</html>