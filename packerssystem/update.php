<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Booking</title>
</head>
<body>
    <?php 
    include "connect.php";
    $updateid=$_GET['updateid'];
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
            $sql="Update services set sname='$servicename',content='$msg',symbol='$img',sstatus='$status',sdate='$date' where sid=$updateid";
            $query=mysqli_query($con,$sql);
            if($query)
            {
                echo "<script>alert('Success');window.location='servicelist.php';</script>";
            }
            else{
                echo "Not updated";
            }
        }
    }
    ?>
    <div class="request">
        <div class="title">
            <div>
            <p style="color:white;padding:20px;margin-left:10px;"><strong>Update Service</strong></p>
            </div>
        </div>
        <div class="form" style="background-color:white;">
            <form method="POST" action="" class="form1" enctype="multipart/form-data"> 
                <b>Name</b> <input type="text" name="servicename"  value="<?php echo $_GET['sn']?>"required size="20"><br>
                <b>Description</b><br><textarea rows="5" cols="45" name="content"  required placeholder="<?php echo $_GET['con']?>"></textarea>
                <br><br>
                <b>Status</b><input type="text" name="status" value="<?php echo $_GET['st']?>" required size="20"><br>
                <b>Schedule Date</b><br><br><input type="date" value="<?php echo $_GET['da']?>" name="bookdate" required size="20"><br><br>
                <input type="file" name="photo"><p><?php echo $_GET['sym']?> Chosen</p>
                <input type="submit" value="Update"  name="submit" class="submit"><br>
            </form>
        </div>
    </div>
    <footer class="footer1">Copy@sarvajan</footer>
</body>
</html>