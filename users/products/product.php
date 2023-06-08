<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "admin_details";
$con = mysqli_connect($host, $username, $password, $dbname);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Products to be serviced</title>
        <style>
            img{
                float:right;
                margin-top:0%;
            }
            i{
                text-align:left;
            }
            .cont{
                text-align:center;
            }
            .close{
                margin-top:0%;
            }
            body{
                background-color:lightseagreen;
            }
            </style>
</head>
    <body>
        <div class="header">
        <i>Welcome Users</i>
        <div class="cont">
        <b>Products</b><a href="../../classify.html" title="close" target="_top" style="text-align:right"><img src="../../images/close.jpg" alt="close" width="50px" height="25px"/></a>
        </div>
    </div>
</body>

</html>