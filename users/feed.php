<?php
include '../conn.php';
session_start();
if(!isset($_SESSION['issubmit']))
{
    $uname= $_POST['username'];
    $fb = $_POST['feedback'];
    $query="Update `booking` set feedback='$fb' where uname='$uname'";
    $conn = mysqli_query($con,$query);
    if($conn)
    {
        echo "Thank you <a href='frame.html' target='_top'>Back</a>" ;
    }
}
else{
    header("Location:frame.html");
}

?>