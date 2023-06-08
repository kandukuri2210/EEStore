<?php
if(isset($_POST['Register']))
{
    $user = $_POST['user'];
    $mail = $_POST['mail'];
    $phno = $_POST['phno'];
    $pas=$_POST['pas'];
    $cpass=$_POST['cpass'];
}
$host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin_details";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    $query="SELECT * from `admi` where mail='$mail'";
    $res=mysqli_query($con,$query);
    $pres=mysqli_num_rows($res);
    if($pres>0){
        echo "Email already exists.. please register again using another email";
    }else{
        $uname=preg_match('@[A-Z]@',$user);
        $unames=preg_match('@[a-z]@',$user);
        $upperCase=preg_match('@[A-Z]@',$pas);
        $lowerCase=preg_match('@[a-z]@',$pas);
        $number=preg_match('@[0-9]@',$pas);
        $specialChars=preg_match('@[^\w]@',$pas);
        $salt="codeflix";
        $encpwd=sha1($pas.$salt);
        $cencpwd=sha1($cpwd.$salt);
        //$encpwd=md5($pas);
        if(($uname||$unames)&&$upperCase&&$lowerCase&&$number&&$specialChars){
    $sql = "INSERT INTO admi (user, mail, phno, pas, cpass) VALUES ('$user', '$mail', '$phno', '$encpwd', '$encpwd')";
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        //echo "Entries added!";
        header("Location:adlogin.html");
    }
    else{
        echo "Error!!";
    }
    }
    if($uname==false && $unames==false)
    {
        echo "Username should only have letters";
    }
    else{
        echo "Password is not strong..";
    }
    }
    mysqli_close($con);

?>