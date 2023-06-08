<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
    <script type = "text/javascript">
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function displayPreviousImage() {
              x = (x <= 0) ? images.length - 1 : x - 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 2000);
          }

          var images = [], x = -1;
          images[0] = "image.jpg";
          images[1] = "truck.jpg";
          images[2] = "bolero.jpg";
      </script>
      <style>
        
        nav ul li{
            padding:10px;
        }
        .navbar{
            height:2%;
        }
    </style>
</head>
<body onload = "startTimer()">
    <?php 
    if(isset($_POST['submit']))
    {
    $sendname=$_POST['sendname'];
    $sendmail=$_POST['sendmail'];
    $sendmbl=$_POST['sendmbl'];
    $msg=$_POST['msg'];
    include "connect.php";
    if(!$con)
    {
        echo "Not connected";
    }
    else
    {
        $sql="INSERT into messages(sname,mail,mobile,smessage) values('$sendname','$sendmail','$sendmbl','$msg')";
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
    <div class="content">
        <div>
        <img id="img" src="image.jpg" width="500" height="300"/>
        <button type="button" onclick="displayPreviousImage()">Previous</button>
        <button type="button" onclick="displayNextImage()">Next</button><br>
        </div>
        <br>
        <div class="row">
        <div class="card">
            <div>
                <h5>Contact Us</h5> <hr>
            </div>
            <div>
                <p style="text-align:left;margin-left:5px;"><b>Email</b></p>
                <p style="text-align:left;margin-left:12px;">sarvajan@gmail.com</p>
            </div>
            <div>
                <p style="text-align:left;margin-left:5px;"><b>Telephone #</b></p>
                <p style="text-align:left;margin-left:12px;">08514-244222</p>
            </div>
            <div>
                <p style="text-align:left;margin-left:5px;"><b>Mobile #</b></p>
                <p style="text-align:left;margin-left:12px;">8309930071</p>
            </div>
            <div>
                <p style="text-align:left;margin-left:5px;"><b>Address</b></p>
                <p style="text-align:left;margin-left:12px;">Flat #343 GandhiNagar, 500001</p>
            </div>
        </div>
        <div class="card1">
            <div>
                <h5>Send us a message</h5> <hr>
            </div>
                <div class="f">
                    <form method="POST" action=""> 
                        Name<input type="text" name="sendname" required><br><br>
                        Email<input type="email" name="sendmail" required><br><br>
                        Mobile<input type="text" name="sendmbl" required><br><br>
                        <textarea rows="5" name="msg" required placeholder="Message here.."></textarea>
                        <br>
                        <input type="submit" value="submit" name="submit"><br><br>
                    </form>
                </div>
        </div>
    </div>
    <footer class="footer">Copyright @ sarvajan</footer>
    </div>
</body>
</html>