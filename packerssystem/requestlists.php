<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Requests</title>
    <style>
        a{
            text-decoration:none;
        }
        </style>
</head>
<body>
    <div>
        <p>List of Quote Requests</p>
    </div>
    <table width="100%" border="2px">
        <tr>
            <th>Request Id</th>
            <th>Requested By</th>
            <th>Date Created</th>
            <th>Email of customer</th>
            <th>Mobile Number</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Services Requested</th>
            <th>Message</th>
            <th>Status</th>
            <th>Operation</th>
    </tr>
    <?php 
    $sql="SELECT * from `requests`";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
        $rid=$row['rid'];
        $rname=$row['rname'];
        $email=$row['rmail'];
        $mbl=$row['rmobile'];
        $orig=$row['rorigin'];
        $dest=$row['rdest'];
        $serv=$row['rservice'];
        $msg=$row['rmessage'];
        $date=$row['rdate'];
        $status=$row['status'];
        echo "<tr>
             <td>$rid</td>
             <td>$rname</td>
             <td>$date</td>
             <td>$email</td>
             <td>$mbl</td>
             <td>$orig</td>
             <td>$dest</td>
             <td>$serv</td>
             <td>$msg</td>
             <td>$status</td>
             <td><button style='background-color:blue;' onclick='return func()'><a href='complete.php?completeid=$rid'style='color:white;'>Complete</a></button>
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