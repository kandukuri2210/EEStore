<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Request Booking</title>
    <style>
        
        nav ul li{
            padding:10px;
        }
        .navbar{
            height:2%;
        }
        .form{
            margin-top:1%;
        }
        .required::after{
            content:' * ';
            color:red;
        }
        .form1{
            margin-bottom:-2%;
        }
    </style>
</head>
<body>
    <?php 
    if(isset($_POST['submit']))
    {
        $bookname=$_POST['bookname'];
        $bookmail=$_POST['bookmail'];
        $bookmbl=$_POST['bookmbl'];
        $bookorigin=$_POST['bookorigin'];
        $bookdest=$_POST['bookdest'];
        $service=$_POST['service'];
        $bookdate=$_POST['bookdate'];
        $msg=$_POST['msg'];
        include "connect.php";
        if(!$con)
        {
            echo "Not connected";
        }
        else
        {
            $chk="";
            foreach($service as $ser)
            {
                $chk.=$ser.",";
            }
            $sql="INSERT into requests(rname,rmail,rmobile,rorigin,rdest,rservice,rdate,rmessage) values('$bookname','$bookmail','$bookmbl','$bookorigin','$bookdest','$chk','$bookdate','$msg')";
            $query=mysqli_query($con,$sql);
            if($query)
            {
                echo "<script>alert('Success');window.location='../call.php';</script>";
            }
            else{
                echo "Not inserted";
            }
        }
    }
    ?>
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="serviceprovider.html">Service Provider</a></li>
                <li><a href="booking.php">Book Request</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </div>
    <div class="request">
        <!--<div class="title">
            <div>
            <p style="color:white;padding:20px;margin-left:10px;"><strong>Request Quote</strong></p>
            </div>
        </div>-->
        <h1>Request form</h1>
        <div class="form" style="background-color:white;">
            <form method="POST" action="" class="form1" enctype="multipart/form-data"> 
                <b class="required">Name</b> <input type="text" name="bookname" required  width="20"><br><br>
                <b class="required">Email</b> <input type="email" name="bookmail" required  width="20"><br><br>
                <b class="required">Mobile</b> <input type="text" name="bookmbl" required  width="20"><br><br>
                <b class="required">Origin</b> <input type="text" name="bookorigin" required  width="20"><br><br>
                <b class="required">Destination</b> <input type="text" name="bookdest" required  width="20"><br><br>
                <b class="required">Service(s) Needed</b><br><br>
                <?php 
                include "connect.php";
                $ssql="SELECT * from `services`";
                $squery=mysqli_query($con,$ssql);
                if($squery)
                {
                    while($row=mysqli_fetch_assoc($squery))
                    {
                        $sname=$row['sname'];
                       echo "<input type='checkbox' name='service[]' value=$sname>$sname<br>"; 
                    }
                }
                ?>
                <br><b class="required">Schedule Date</b><br><br><input type="date" name="bookdate" required size="20"><br><br>
                <b>Remarks</b><small> (Share the other information)</small><br><br>
                <textarea rows="5" cols="45" name="msg" required placeholder="Message here.."></textarea>
                <br><br>
                <input type="submit" value="Submit Request"  name="submit" class="submit"><br>
            </form>
        </div>
    </div>
   <!-- <footer class="footer1">Copy@sarvajan</footer>-->
</body>
</html>