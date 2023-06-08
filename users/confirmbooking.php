<?php 
include("../conn.php");
session_start();
if($_SESSION['is_submit'])
{    //keep user on same
    include('../PHPMailer-5.2-stable/class.phpmailer.php');
    include('../PHPMailer-5.2-stable/class.smtp.php');
    //require_once('PHPMailer-5.2-stable/class.smtp.php');
    $email=$_SESSION['email'];
    $umail=$_SESSION['umail'];
    $sql="Select * from `crud` where email='$email'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
   // $fb=4;
   // $query="update `booking` set feedback='$fb' where uname='$uname'";
    //$r=mysqli_query($con,$query);
    if($result){
        /*$sq="Select * from `booking` where email='$email'";
        $re=mysqli_query($con,$sq);
        $ro=mysqli_fetch_assoc($re);
        $uname=$ro['uname'];
        $fb=4;
        $query="update `booking` set feedback='$fb' where uname='$uname'";
        $r=mysqli_query($con,$query);*/
         $name=$row['name'];
         $product=$row['product'];
         $mobile=$row['mobile'];
        // echo $name;
         //echo $product;
         require '../PHPMailer-5.2-stable/PHPMailerAutoload.php';
        //  ini_set('SMTP','myserver');
        //  //ini_set("sendmail_from","kandukurisaipriya1@gmail.com");
        //  ini_set('smtp_port','465');
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;//3
        $mail->isSMTP();
        //$mail->Host='sg3plcpnl0082.prod.sin3.secureserver.net';
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='kandukurisaipriya1@gmail.com';
        $mail->Password='wbetfxixkuzmotpx';
        $mail->SMTPSecure='ssl';
        $mail->Port=465;
        $mail->setFrom('kandukurisaipriya1@gmail.com');
        //echo $email;
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject='From EEStore';
        $mail->Body="Hello '.$name.' <br><b>There is a booking for your service center. Kindly check the details in the portal below. <br><a href='../serviceproviders/splog.php'>Click here</a></b>"; 
        $mail->AltBody='hello..';

        if(!$mail->send()){
           // echo 'Error...Some one will contact you..'.$mail->ErrorInfo;}
            echo "Mail not sent..".$mail->ErrorInfo;}
        else{
            echo 'Success mail sent to your service provider '.$name;
            echo "<br><br>";
            echo $name." will be contacting you shortly";
            echo "<h2 style='text-align:center;'>Your Booking for $product is confirmed!! Thank you...</h2>";
             $ssql="SELECT * from `booking` where email='$email' and umail='$umail'";
             $query=mysqli_query($con,$ssql);
             while($record=mysqli_fetch_assoc($query))
             {
                $uid=$record['uid'];
                $email=$record['email'];
                $uname=$record['uname'];
                $umail=$record['umail'];
                $uphno=$record['uphno'];
                $ulocality=$record['ulocality'];
                $ucategory=$record['ucategory'];
                $uproduct=$record['uproduct'];
                $uissue=$record['uissue'];
                $dateofbook=$record['dateofbook'];
                //echo "header('Location:sms.php')";
                echo "<div style='border:2px solid white;width:30%;padding:10px;margin:10 35%;'>
        <table border=2px solid black width=100%>
        <tr>
        <td colspan=2 style='text-align:center;'><b>Acknowledgement</b></td>
        </tr>
       <tr>
       <td colspan=2 style='text-align:center;'>User Details</td>
       </tr>
        <tr>
        <td>User Id</td>
        <td>$uid</td>
        </tr>
        <tr>
        <td>Name</td>
        <td>$uname</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>$umail</td>
        </tr>
        <tr>
        <td>Mobile</td>
        <td>$uphno</td>
        </tr>
        <tr>
        <td>City</td>
        <td>$ulocality</td>
        </tr>
        <tr>
        <td>Product</td>
        <td>$uproduct</td>
        </tr>
        <tr>
        <td>Issue</td>
        <td>$uissue</td>
        </tr>
        <tr>
        <td>Booked Date</td>
        <td>$dateofbook</td>
        </tr>
        <tr>
        <td colspan=2 style='text-align:center;'>Service Provider Details</td>
        </tr>
        <tr>
        <td>Service Provider Name</td>
        <td>$name</td>
        </tr>
        <tr>
        <td>Service Provider Mail</td>
        <td>$email</td>
        </tr>
        <tr>
        <td>Service Provider Mobile</td>
        <td>$mobile</td>
        </tr>
        <tr>
        <td colspan=2 style='text-align:center;'><b>Preserve this Acknowledgement for future use</b></td>
        </tr>
        </table>
        <p style='text-align:center;'>
        <button onclick='window.print()'>Print</button>
        </p>
        </div>";
        echo "<a href='feedbackform.php' style='text-align:center;'>Leave your valuable feedback here..</a>";
             }
        }
    }
    else{
        echo 'failed try again';
    }

}
else{
    //redirect
    echo 'The session is not login';
    //header('Location:frame.html');
}
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <title>Booking Confirmed!</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            p{
                text-align:center;
                margin-top:3px;
                padding:3px;
            }
            a:hover{
color:orange;}
           body{
            background-color:lightblue;
           }
           .feedback{
            align-items:center;
            justify-content:center;
            border:2px solid grey;
            width:300px;
            margin-left:38%;
            margin-top:100px;
            padding:10px;
            background-color:white;
           }
           .star{
            text-align:center;
           }
           .ref{
            text-align:center;
            padding:10px;
           }
           .ref1{
            text-align:right;
            padding:10px;
           }
           #demo{
            display:none;
           }
            </style>
</head>
<body>
        <div class="content" style="height:fit-content; margin-top:-5%;">
        <div class="feedback">
        <h6 style="text-align:center;">Thanks for your time!! Hope you had a great time and chosen your valuable service provider</h6><br><br>
        <p>We value your time but kindly leave your feedback here..</p><br><br><br>
        <div class="star">
            <a href="#" onclick="change1()" id="one"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change2()" id="two"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change3()" id="three"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change4()" id="four"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change5()" id="five"><span class="fa fa-star"></span></a>
        </div>
        <div class="ref" style="height:fit-content;">
            <form method="POST" action="feed.php">
                <label for="user">Username</label><br><br>
                <input id="user" name="username" placeholder="Enter your user name given while booking yourself"/><br><br>
                <input type="hidden" id="demo" name="feedback" value=0></input>
                <button type="submit" name="submit">Submit</button>
        </form>
        <div class="ref1">
            <button><a href="frame.html" target="_top">Not now</a></button>
        </div>
        </div>
        </div>
        </div>
<script>
    //var count=0;
function change1(){
let x=document.getElementById("one");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=1;
//count++;
}
function change2(){
let x=document.getElementById("two");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=2;
//count++;
}
function change3(){
let x=document.getElementById("three");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=3;
//count++;
}
function change4(){
let x=document.getElementById("four");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=4;
//count++;
}
function change5(){
let x=document.getElementById("five");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=5;
//count++;
}
</script>
</body>
</html>-->