<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry messages</title>
    <style>
        td{
                text-align:center;
        }
    </style>
</head>
<body>
    <div>
        <p>List of Messages</p>
    </div>
    <table width="100%" border="2px">
        <tr>
            <th>Message Id</th>
            <th>Messaged By</th>
            <th>Email of customer</th>
            <th>Mobile Number</th>
            <th>Message</th>
            <th>Date Created</th>
            <th>Reply</th>
    </tr>
    <?php 
    $sql="SELECT * from `messages`";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
        $mid=$row['sid'];
        $mname=$row['sname'];
        $email=$row['mail'];
        $mbl=$row['mobile'];
        $msg=$row['smessage'];
        $date=$row['mdate'];
        echo "<tr>
             <td>$mid</td>
             <td>$mname</td>
             <td>$email</td>
             <td>$mbl</td>
             <td>$msg</td>
             <td>$date</td>
             <td><button><a href='replyform.php?mailid=$email&message=$msg&nam=$mname'>Reply</a></button></td>
             </tr>";
    }
    ?>
</table>
<script>
    function hello(email)
    {
        alert(email);
        //location.href="replyform.php";
    }
    </script>
</body>
</html>