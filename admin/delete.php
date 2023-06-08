<?php
include '../conn.php';
if(isset($_GET['deleteid']))
{
    $sid=$_GET['deleteid'];
    // $sql="delete from `crud` where sid=$sid";
    // $result=mysqli_query($con,$sql);
    $select="SELECT * from `crud` where sid=$sid";
    $select_res=mysqli_query($con,$select);
    if(mysqli_num_rows($select_res)>0)
    {
        $row=mysqli_fetch_assoc($select_res);
        $name=$row['name'];
        $email=$row['email'];
        echo $name;
        echo $email;
        $sql="delete from `crud` where sid=$sid";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            header('location:../serviceproviders/display.php');   
        }
        else
        {
            die(mysqli_error($con));
        }
        /*$query="SELECT * from `paymentdetails` where sname='$name'";
        $query_res=mysqli_query($con,$query);
        if(mysqli_num_rows($query_res)>0)
        {
            echo $sid;
            $row1=mysqli_fetch_assoc($query_res);
            $pid=$row1['payid'];
            $sql="delete from `crud` where sid=$sid";
            echo $sid;
            $result=mysqli_query($con,$sql);
            $del="delete from `paymentdetails` where payid=$pid";
            $result1=mysqli_query($con,$del);
            if($result && $result1)
            {
             //echo "Deleted successfully";
            header('location:../serviceproviders/display.php');
            }
            else
            {
                die(mysqli_error($con));
            }
        }
        else
        {
            die(mysqli_error($con));
        }*/
    }
    else{
        die(mysqli_error($con));
    }
}
?>