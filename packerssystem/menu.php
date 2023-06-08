<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Items</title>
    <style>
        a:hover{
            color:red;
        }
        a:visited
        {
            color:purple;
        }
    </style>
</head>
<body>
    <div style="background-color:blue;width:300px;height:65px;margin-left:-10px;margin-top:-8px;">
    <div style="padding:10px;">
    <img src="bg.jfif" alt="text" width=20px height=30px style="float:left;border-radius:50px;">
    <div style="color:white;padding:5px 2px;">PMMS - PHP</div>
    </div>
    </div>
    <div style="display:block;margin-top:20px;">
       <button style="border:1px solid white; height:50px;width:100px"><a href="rightpane.php" target="right" style="text-decoration:none;">Dashboard</a></button>
       <button style="border:1px solid white;height:50px;width:100px"><a href="servicelist.php" target="right" style="text-decoration:none;">Service List</a></button>
       <!--<button style="border:1px solid white;height:50px;width:100px"><a href="index.html" target="right" style="text-decoration:none;">Pages</a></button>-->
       <button style="border:1px solid white;height:50px;width:100px"><a href="requestlists.php" target="right" style="text-decoration:none;">Query Requests</a></button>
       <button style="border:1px solid white;height:50px;width:100px"><a href="inquiries.php" target="right" style="text-decoration:none;">Inquiries</a></button>
    </div>
</body>
</html>