<?php
session_start();
unset($_SESSION['submit']);  
session_destroy();
echo "<script>alert('The session is expired');window.location='index.html';</script>";
//header("Location:admin.php");
exit();
?>