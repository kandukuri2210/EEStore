<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packers and Movers Services offered</title>
    <style>
        .card{
            height:fit-content;
            width:50%;
            border-radius:20%;
            border:2px solid green;
           margin-left:20px;
        }
        .img{
            margin-left:30%;
            margin-top:20px;
        }
        .h5{
            text-align:center;
        }
        .cont{
            margin-left:3px;
        }
        h2{
            text-align:center;
            color:violet;
        }
        .row{
            display:flex;
        }
    </style>
</head>
<body>
    <h2>The list of services being offered through Sarvajan Packers and Movers Management System</h2>
    <div class="row">
<?php
include "connect.php";
$sql="SELECT * from `services` where sstatus='Active'";
$query=mysqli_query($con,$sql);
if($query)
{   
    while($row=mysqli_fetch_assoc($query))
    {
        $name=$row['sname'];
        $desc=$row['content'];
        $img=$row['symbol'];
        echo '
                <div class="card">
                <div class="img"><img src="images/'.$img.'" style="border-radius:50%;width:50px;height:50px;"></div>
                <div class="h5"><h5>'.$name.'</h5></div>
                <div class="cont"><p>'.$desc.'</p></div>
                </div><br><br>';

    }
}
else
{
    echo "The query is not executed";
}
?>
</div>
</body>
</html>