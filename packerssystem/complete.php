<?php
include "connect.php";
$completeid=$_GET['completeid'];
$sql="UPDATE `requests` set status='completed' where rid=$completeid";
$query=mysqli_query($con,$sql);
if($query)
{
    echo '<script>alert("Successfully updated");window.location="requestlists.php";</script>';

}
else{
    echo 'Not updated';
}
?>