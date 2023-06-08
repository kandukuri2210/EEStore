<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Lists</title>
    <style>
        a{
            text-decoration:none;
        }
        </style>
</head>
<body>
    <div style="display:inline;">
        <p>List of Services</p>
        <button style="float:right;"><a href="addservice.php">Create a new Service</a></button>
    </div><br><br>
    <table width="100%" border="2px">
        <tr>
            <th>Service Id</th>
            <th>Service Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Status</th>
            <th colspan="4">Operations Inactive/Delete</th>
    </tr>
    <?php 
    $sql="SELECT * from `services`";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
        $sid=$row['sid'];
        $sname=$row['sname'];
        $msg=$row['content'];
        $symbol=$row['symbol'];
        $date=$row['sdate'];
        $status=$row['sstatus'];
        echo "<tr>
             <td>$sid</td>
             <td>$sname</td>
             <td><img class = 'rounded-circle' width='50' height='50' src='images/$symbol'></td>
             <td>$msg</td>
             <td>$date</td>
             <td>$status</td>
             <td><button style='background-color:blue;'onclick='return func()'><a href='inactive.php?inactiveid=$sid' style='color:white;'>Inactive</a></button>
             <td><button style='background-color:blue;'onclick='return func()'><a href='active.php?activeid=$sid' style='color:white;'>Active</a></button>
             <td><button style='background-color:blue;' onclick='return func()'><a href='delete.php?deleteid=$sid'style='color:white;'>Delete</a></button>
             <td><button style='background-color:blue;' onclick='return func()'><a href='update.php?updateid=$sid&sn=$sname&con=$msg&sym=$symbol&da=$date&st=$status'style='color:white;'>Update</a></button>
             </tr>";
    }
    ?>
</table>
<script>
    function func()
    {
        return confirm("Are you sure?");
    }
    </script>
</body>
</html>