<?php 
//Password for admin login is: Priya@123
session_start();
if(!isset($_SESSION['islogin']))
{
if(isset($_POST['Login']))
{
    $maid = $_POST['maid'];
    $pard = $_POST['pard'];
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin_details";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    $salt="codeflix";
    $decpwd=sha1($pard.$salt);//Chandana@16
    $pwd=substr($decpwd,0,8);
    //$pwd=md5($pard)
    $query="SELECT * FROM admi WHERE mail='$maid' AND pas='$pwd'";
    $fire=mysqli_query($con,$query);
    if($fire)
    {
        if(mysqli_num_rows($fire)==1)
        {
            $_SESSION['is_login']=true;
            $_SESSION['mail']=$maid;
            header("Location:viewpage.html");
        }
        else{
            //echo $decpwd;
            echo "Invalid username or password <a href='adlogin.html'>Login Again</a>";
        }
    }
}
}
else{
    header("Location:servicepage.php");
}
?>
