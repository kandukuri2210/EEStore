<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
<?php
include "connect.php";
session_start();
$aname=$_SESSION['adname'];
$sql="SELECT * from `services`";
$res=mysqli_query($con,$sql);
if($res)
{
$total=mysqli_num_rows($res);
}
else
{
    $total=0;
}
$rsql="SELECT * from `requests`";
$rres=mysqli_query($con,$rsql);
if($rres)
{
$rtotal=mysqli_num_rows($rres);
}
else
{
    echo "Query not executed";
}
$msql="SELECT * from `messages`";
$mres=mysqli_query($con,$msql);
if($mres)
{
$mtotal=mysqli_num_rows($mres);
}
else
{
    echo "Query not executed";
}
?>
    <b>Welcome, <?php echo $aname?></b><br><br>
    <div class="row" style="margin-top:5px;margin-left:-100px;">
        <div class="col1" style="border-radius:5px;margin-top:0px; height:50px;">
            <img src="bg.jfif" alt="text" style="border-radius:15px; height:45px;width:45px;margin:5px;float:left;">
            <div style="display:inline;">
                Services
                <p style="float:right;margin-right:5px;"><?php echo $total;?></p>
            </div>
        </div>
        <div class="col1" style="border-radius:5px;margin-top:0px;height:50px;">
        <img src="bg.jfif" alt="text" style="border-radius:15px; height:45px;width:45px;margin:5px;float:left;">
        <div style="display:inline;">
                Query requests
                <p style="float:right;margin-right:5px;"><?php echo $rtotal;?></p>
            </div>
        </div>
        <div class="col1" style="border-radius:5px;margin-top:0px;height:50px;">
        <img src="bg.jfif" alt="text" style="border-radius:15px; height:45px;width:45px;margin:5px;float:left;">
        <div style="display:inline;">
                Inquiries
                <p style="float:right;margin-right:5px;"><?php echo $mtotal;?></p>
            </div>
        </div>
    </div>
   <div><br><br><br>
   <img id="img" src="image.jpg" width="500" height="300"style="margin-left:30%;border:1px solid black;"/>
    </div>
</body>
</html>