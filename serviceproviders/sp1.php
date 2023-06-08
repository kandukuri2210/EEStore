<?php
//<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
include '../conn.php';
session_start();
if(isset($_POST['submit'])){
  if(!isset($con)){
    die(mysqli_error($con));
  }
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $area=$_POST['area'];
    $locality=$_POST['locality'];
    $category=$_POST['category'];
    $product=$_POST['product'];
    $password=$_POST['password'];
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['mobile']=$mobile;
    $_SESSION['area']=$area;
    $_SESSION['locality']=$locality;
    $_SESSION['category']=$category;
    $_SESSION['product']=$password;
    $flag=true;
    //$valid_name=preg_match("/^[a-zA-Z]*$/",$name);
    $valid_mbl=preg_match("/^[0-9]*$/",$mobile);
    $pattern="^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    $valid_email=preg_match($pattern,$email);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(!preg_match("/^[a-zA-Z]*$/",$name))
    {
      echo "<script>alert('Name should contain only letters');</script>";
     // echo "Invalid";
      $flag=false;
    }
    if(!$valid_email)
    {
      echo "<script>alert('Invalid email id');</script>";
      $flag=false;
    }
    if(!$valid_mbl)
    {
      echo "<script>alert('Mobile number should be of only digits');</script>";
      $flag=false;
    }
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
    {
      echo "<script>alert('Password should be strong with minimum 8 characters including special character with a digit alphabet');</script>";
      $flag=false;
    }
    if($flag){
    $query="select * from `crud` where email='$email' and name='$name'";
    $res=mysqli_query($con,$query);
    $pres=mysqli_num_rows($res);
    if($pres>0){
      echo "Email already exists please register again";
    }else{
      //$salt="codeflix";
        //$encpwd=sha1($password.$salt);
        $encpwd=md5($password);
    $sql="insert into `crud` (name,email,mobile,area,locality,category,product,password) values('$name','$email','$mobile','$area','$locality','$category','$product','$encpwd')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('Location:splog.php');
    }
  }
  }
  }
//class="btn btn-primary"->for submit button
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Crud Operations</title>
    <style>
      body{
        background-color:ghostwhite;
        background-image:url("images/bg.jpg");
        background-repeat:no-repeat;
        background-size: cover;
      }
        form{
            border:2px solid black;
            width: 170%;
            margin-right:3px;
        }
        .form-control{
            margin:5px;
            width:48%;
            border-color:black;
        }
        label{
            margin:5px;
            padding:2px;
            font-size:18px;
            color:brown;
        }
        img{
          height:75%;
        }
        button{
            padding:1px;
            width:50%;
            background-color:blue;
            border-color:blue;
            margin-left:25%;
            margin-right:25%;
            color:white;
        }
        a{
           size:30%;
            color:blue;
        }
        p{
          color:brown;
          text-align:center;
          margin-top:3%;
        }
        .control{
          width:15px;
          height:10px;
        }
        .term{
          font-size:12px;
        }
        
        </style>
        <script>
        function validate()
    {
      var a=document.getElementById("name");
      var y=document.forms["Form"]["email"].value;
      var p=document.forms["Form"]["password"].value;
      var namevalid=/^[a-zA-Z]$/.test(a);
      if(namevalid==false)
      {
        document.getElementById("message").innerHTML="Invalid username";
        if(!y.includes("@gmail.com"))
        {
            alert("Please enter a valid mail id");
                return false;
        }
        if(p.length!=8)
        {
            alert("Password must be of length 8 characters");
            return false;
        }
        return false;
      }
    }
    function fun()
        {
          var x = document.getElementById("myInput");
          if (x.type === "password") 
          {
              x.type = "text";
          } else 
          {
              x.type = "password";
          }
        }
    </script>
    <script language="javascript" type="text/javascript">
    function dynamicdropdown(listindex)
    {
        switch (listindex)
        {
        case "Electric" :
            document.getElementById("product").options[0]=new Option("stove","stove");
            document.getElementById("product").options[1]=new Option("bulb","bulb");
            document.getElementById("product").options[2]=new Option("calculator","calculator");
            document.getElementById("product").options[3]=new Option("mixi","mixi");
            document.getElementById("product").options[4]=new Option("grinder","grinder");
            document.getElementById("product").options[5]=new Option("heater","heater");
            break;
        case "Electronic" :
            document.getElementById("product").options[0]=new Option("ac","ac");
            document.getElementById("product").options[1]=new Option("fan","fan");
            document.getElementById("product").options[2]=new Option("laptop","laptop");
            document.getElementById("product").options[3]=new Option("mobile","mobile");
            document.getElementById("product").options[4]=new Option("refrigerator","refrigerator");
            document.getElementById("product").options[5]=new Option("speaker","speaker");
            break;
        }
        return true;
    }
    </script>
  </head>
  <body>
  <div class="container">
  <p>Please complete the registration process as a service provider if not have an account..</p>
  <div class="row">
  <div class="col-2">
                <img src="../images/image.jpg" width="100%" height="95%" HSPACE="10">
  </div>
  <div class="col-2">
   <div class="container my-5">
   <form method="POST" name="Forms" action="">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" value ="<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>" autocomplete="off" required>
    <span id="message"></span>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" value ="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" value ="<?php if(isset($_SESSION['mobile'])) echo $_SESSION['mobile'] ?>" autocomplete="off" minlength="10" maxlength="10" required>
  </div>
  <div class="form-group">
    <label>State</label>
    <input type="text" class="form-control" placeholder="Enter your State" name="area" value ="<?php if(isset($_SESSION['area'])) echo $_SESSION['area'] ?>" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label>Locality</label>
    <input type="text" class="form-control" placeholder="Enter your locality" name="locality" value ="<?php if(isset($_SESSION['locality'])) echo $_SESSION['locality'] ?>" autocomplete="off" required>
  </div>
  <!--<div class="form-group">
    <label>Product Category</label>
    <input type="text" class="form-control" placeholder="Enter your product category" name="category" autocomplete="off" required>
  </div>-->
  <div class="form-group">
    <label>Product Category</label>
   <select id="category" name="category" onclick="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
    <option value="Electric">Electric</option>
    <option value="Electronic">Electronic</option>
</select>
  </div>
  <!--<div class="form-group">
    <label>Product</label>
    <input type="text" class="form-control" placeholder="Enter your Product" name="product" autocomplete="off" required>
  </div>-->
  <div class="form-group">
  <label>Product Type</label>
  <script type="text/javascript" language="JavaScript">
        document.write('<select name="product" id="product"><option value="">Product</option></select>')
        </script>
        <noscript>
    <label>Product</label>
   <select id="product" name="product">
    <option value="stove">stove</option>
    <option value="calculator">calculator</option>
   <!-- <option value="mixi">mixi</option>
    <option value="grinder">grinder</option>
    <option value="heater">heater</option>
    <option value="laptop">laptop</option>
    <option value="refrigerator">refrigerator</option>
    <option value="fan">fan</option>
    <option value="mobile">mobile</option>
    <option value="ac">ac</option>
    <option value="speaker">speaker</option>
    <option value="bulb">bulb</option>-->
</select>
</noscript>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" value ="<?php if(isset($_SESSION['password'])) echo $_SESSION['password'] ?>" minimum=8 autocomplete="off" required id="myInput">
    <input type="checkbox" onclick="fun()" class="control">Show Password</input>
  </div>
  <div>
  <!--<input type="checkbox" class="form-control" name="Accept" autocomplete="off" required/>-->
  <label class="term"><input type="checkbox" class="control" name="Accept" autocomplete="off" required/>Accept the <a href="term.html" target="_top">Terms and Conditions</a></label>
      </div>
  <button type="submit" name="submit">Submit</button>
  <p>Already have an account? <a href="splog.php" target="_top">Login</a></p>
</form>
   </div>
      </div>
      </div>
      </div>
  </body>
</html>