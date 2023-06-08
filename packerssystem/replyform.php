<?php
session_start();
if(isset($_POST['submit']))
{
  $email=$_POST['cmail'];
  $name=$_POST['cname'];
  $msg=$_POST['cmsg'];
  $reply=$_POST['reply'];
  include('../PHPMailer-5.2-stable/class.phpmailer.php');
  include('../PHPMailer-5.2-stable/class.smtp.php');
  require '../PHPMailer-5.2-stable/PHPMailerAutoload.php';
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
    $mail->Subject='From Sarvjan PMMS';
    $mail->Body="Hello '$name', <br>Here is the reply to your inquiry $msg<br><p>Reply:$reply</p>Thank you for visiting our portal."; 
    $mail->AltBody='hello..';
    if(!$mail->send()){
        // echo 'Error...Some one will contact you..'.$mail->ErrorInfo;}
         echo "Mail not sent..".$mail->ErrorInfo;}
     else{
         echo 'Success mail sent to  '.$name;
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            padding:20px;
            margin-top:20px;
        }
        input{
            margin-top:20px;
        }
        textarea{
            margin-left:20px;
            margin-top:20px;
            padding:20px;
        }
        form{
            border:2px solid black;
            width:fit-content;
            margin-left:30%;
            margin-top:25px;
        }
        .submit{
            margin-left:25px;
            margin-bottom:5px;
        }
        </style>
</head>
<body>
    <form method="POST">
        <label>Client Name</label>
        <input type="text" value=<?php echo $_GET['nam'];?> name="cname"><br>
        <label>Client Mail</label>
        <input type="email" value=<?php echo $_GET['mailid'];?> name="cmail"><br>
        <label>Client Message</label>
        <input type="text" value="<?php echo ($_GET['message']);?>" name="cmsg"><br><br>
        <label>Reply Message</label><br>
        <textarea rows='10' cols="20" name="reply" required placeholder="Type here.."></textarea><br>
        <label></label>
        <button type="submit" class="submit" name="submit">Send</button>
    </form>
</body>
</html>