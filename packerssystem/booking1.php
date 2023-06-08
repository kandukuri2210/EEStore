<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Request Booking</title>
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
                echo "<script>alert('Success')</script>";
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
        <div class="title">
            <div>
            <p style="color:white;padding:20px;margin-left:10px;"><strong>Request Quote</strong></p>
            </div>
        </div>
        <div class="form" style="background-color:white;">
            <form method="POST" action="" class="form1" enctype="multipart/form-data"> 
                <b>Name</b> <input type="text" name="bookname" required size="20">
                <b>Email</b> <input type="email" name="bookmail" required size="20"><br><br>
                <b>Mobile</b> <input type="text" name="bookmbl" required size="20"><br><br>
                <b>Origin</b> <input type="text" name="bookorigin" required size="15">
                <b>Destination</b> <input type="text" name="bookdest" required size="15"><br><br>
                <b>Service(s) Needed</b><br><br>
                <input type="checkbox" name="service[]" value="Car Transport">Car Transport 
                <input type="checkbox" name="service[]" value="Home Furniture">Home Furniture
                <input type="checkbox" name="service[]" value="Officce Furniture">Office Furniture
                <input type="checkbox" name="service[]" value="Movers and Packers">Movers&Packers<br><br>
                <b>Schedule Date</b><br><br><input type="date" name="bookdate" required size="20"><br><br>
                <b>Remarks</b><small> (Share the other information)</small><br><br>
                <textarea rows="5" cols="45" name="msg" required placeholder="Message here.."></textarea>
                <br><br>
                <input type="submit" value="Submit Request"  name="submit" class="submit"><br>
            </form>
        </div>
    </div>
    <footer class="footer1">Copy@sarvajan</footer>
</body>
</html>