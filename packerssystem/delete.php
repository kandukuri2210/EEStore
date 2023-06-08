<?php
include "connect.php";
$deleteid=$_GET['deleteid'];
$sql="DELETE from `services` where sid=$deleteid";
$query=mysqli_query($con,$sql);
if($query)
{
    echo '<script>alert("Successfully updated");window.location="servicelist.php";</script>';

}
else{
    echo 'Not updated';
}
?>