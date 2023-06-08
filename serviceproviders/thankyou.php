<?php
include "../conn.php";
if(isset($con))
{
$id=$_GET['id'];
//echo $id;
$sql="update `crud` set payment_type='offline' where sid=$id"; 
$query=mysqli_query($con,$sql);
if($query)
{
    echo "<h5>Kindly contact your Admin and make the payment... Thank you</h5>";
    echo "<a href='../users/userdisplay.php'>Back</a>";
}
}
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <title>Thanks!!</title>
    </head>
    <body>
        <h5>Kindly contact your Admin and make the payment... Thank you</h5>
        <a href="../users/userdisplay.php">Back</a>
    </body>
</html>-->