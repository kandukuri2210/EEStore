<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<?php
include "connect.php";
session_start();
if($_SESSION['issubmit'])
{
//echo 'success';
$aname=$_SESSION['adname'];
//echo $aname;
}
else
{
    echo "The session is expired'<a href='admin.php'></a>";
}
?>
<frameset bordercolor="whitesmoke" cols="10%,*">
    <frame src="menu.php" name="leftpane">
        <frameset bordercolor="whitesmoke" rows="10%,*">
            <frame src="title.php" name="titlepane">
            <frame src="rightpane.php" name="right">
        </frame>
</frame>  
</html>