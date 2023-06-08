<?php
include '../conn.php';
session_start();
$email=$_GET['emailid'];
$payment_status="Paid";
//$sql="UPDATE `paymentdetails` SET payment_status='PAID' WHERE email=$email";
//$result=mysqli_query($con,$sql);
//if($result)
//{
    function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }

    return $str;
}
    echo "<a href='../users/userdisplay.php' target='_self'>Back</a>";
    echo "<h2 style='text-align:center;'>Your transaction is successful!! Thank you...</h2>";
    $disp="Select * from `crud` where email=$email";
    $res=mysqli_query($con,$disp);
    $payid=randString(12);
    $ins="update `crud` set id='$payid' where email=$email";
    $query=mysqli_query($con,$ins);
    if($ins)
    {
    while($row=mysqli_fetch_assoc($res))
    {
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $city=$row['locality'];
        $amount=$row['amount'];
        $payment_type=$row['payment_type'];
        $payment_date=$row['payment_date'];
        $payment_status=$row['status'];
        $date=date("Y-m-d");
        echo "<div style='border:2px solid white;width:30%;padding:10px;margin:10 35%;'>
        <table border=2px solid black width=100%>
        <tr>
        <td colspan=2 style='text-align:center;'><b>Acknowledgement</b></td>
        </tr>
        <tr>
        <td>Transaction Id</td>
        <td>$payid</td>
        </tr>
        <tr>
        <td>Name</td>
        <td>$name</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>$email</td>
        </tr>
        <tr>
        <td>Mobile</td>
        <td>$mobile</td>
        </tr>
        <tr>
        <td>City</td>
        <td>$city</td>
        </tr>
        <tr>
        <td>Amount</td>
        <td>$amount</td>
        </tr>
        <tr>
        <td>Date</td>
        <td>$date</td>
        </tr>
        <tr>
        <td>Payment Type</td>
        <td>$payment_type</td>
        </tr>
        <tr>
        <td>Status</td>
        <td>$payment_status</td>
        </tr>
        <tr>
        <td colspan=2 style='text-align:center;'><b>Preserve this Acknowledgement for future use</b></td>
        </tr>
        </table>
        <p style='text-align:center;'>
        <button onclick='window.print()'>Print</button>
        </p>
        </div>";
       // echo "<button onclick='window.print()'>Print</button>";
    }
}
else
{
    echo "Insertion failed!!";
}
?>