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
        $servicename=$_POST['servicename'];
        $msg=$_POST['content'];
        $status=$_POST['status'];
        $date=$_POST['bookdate'];
        $img=$_FILES['photo']['name'];
        $tempimg=$_FILES['photo']['tmp_name'];
        move_uploaded_file($tempimg,"./images/$img");
        include "connect.php";
        if(!$con)
        {
            echo "Not connected";
        }
        else
        {
           /* $chk="";
            foreach($service as $ser)
            {
                $chk.=$ser.",";
            }*/
            $sql="INSERT into services(sname,content,symbol,sstatus,sdate) values('$servicename','$msg','$img','$status','$date')";
            $query=mysqli_query($con,$sql);
            if($query)
            {
                echo "<script>alert('Success');window.location='servicelist.php';</script>";
            }
            else{
                echo "Not inserted";
            }
        }
    }
    ?>
    <div class="request">
        <div class="title">
            <div>
            <p style="color:white;padding:20px;margin-left:10px;"><strong>Adding Service</strong></p>
            </div>
        </div>
        <div class="form" style="background-color:white;">
            <form method="POST" action="" class="form1" enctype="multipart/form-data"> 
                <b>Name</b> <input type="text" name="servicename" required size="20"><br>
                <b>Description</b><br><textarea rows="5" cols="45" name="content" required placeholder="Message here.."></textarea>
                <br><br>
                <b>Status</b><input type="text" name="status" required size="20"><br>
                <b>Schedule Date</b><br><br><input type="date" name="bookdate" required size="20"><br><br>
                <input type="file" name="photo">
                <input type="submit" value="Add"  name="submit" class="submit"><br>
            </form>
        </div>
    </div>
    <footer class="footer1">Copy@sarvajan</footer>
</body>
</html>