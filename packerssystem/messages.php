<?php 
if(isset($_POST['submit']))
{
    $sendname=$_POST['sendname'];
    $sendmail=$_POST['sendmail'];
    $sendmbl=$_POST['sendmbl'];
    $msg=$_POST['msg'];
    include "connect.php";
    if(!$con)
    {
        echo "Not connected";
    }
    else
    {
        $sql="INSERT into messages(sname,mail,mobile,smessage) values('$sendname','$sendmail','$sendmbl','$msg')";
        $query=mysqli_query($con,$sql);
        if($query)
        {
            echo "<script>alert('Success')</script>";
        }
        else{
            echo "Not inserted";
        }
    }
}
?>