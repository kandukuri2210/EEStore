<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title Page</title>
</head>
<body>
<?php
include "connect.php";
session_start();
if($_SESSION['issubmit'])
{
//echo 'success';
$aname=$_SESSION['adname'];
//echo $aname;
}
?>
<div>
<div style="display:inline;">
<p style="text-align:left">Packers and Movers Management System
    <a href="logout.php" title="logout" target="_top"><img src="truck.jpg" width="30" height="30" style="border-radius:50%;float:right;"/></a>
    <b style="float:right;margin-left:5px;"><?php echo $aname?></b>
    <!--<button style="border-radius:20%;float:right;margin-right:-150px;"><a href="logout.php">Logout</a></button></p>-->
</div>
</div>
</body>
</html>