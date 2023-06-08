<?php 
/*include("config.php");
$token=$_POST["stripeToken"];
$contact_name=$_POST["name"];
$email=$_POST["email"];
$amount=$_POST["amount"];
$charge=\Stripe\Charge::create(['amount'=>$amount,'currency'=>'inr','source'=>$token,]);
if($charge){
    header("Location:success.php?amount=$amount");
}*/
include '../conn.php';
if(!isset($con)){
    die(mysqli_error($con));
  }
  $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $city=$_POST['city'];
    $amount=$_POST['amount'];
    $payment_type=$_POST['payment_type'];
    $date=date("Y/m/d");
   // $sql="insert into `paymentdetails` (sname,email,mobile,city,amount,payment_date,payment_type) values('$name','$email',$mobile,'$city',$amount,'$date','$payment_type')";
   $sql="update `crud` set payment_date='$date',payment_type='online',status='paid' where email='$email'";
    $result=mysqli_query($con,$sql);
    if($result){
header("Location:success.php?emailid='$email'");}
else{
    echo "Your Transaction failed!! Please try again...";
}
?>
