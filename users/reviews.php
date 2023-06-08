<?php 
/*
 #demo{
            display:none;
           }
*/
include "../conn.php";
if(isset($_POST['submit']))
{
    $uname=$_POST['username'];
    $spname=$_POST['sp'];
    $rating=$_POST['feedback'];
    $review=$_POST['review'];
    $sql="INSERT INTO `reviews`(uname,spname,rating,review) VALUES('$uname','$spname',$rating,'$review')";
    $query=mysqli_query($con,$sql);
    if($query)
    {
        //echo "Details saved successfully";
        //header("Location:../classify.html");
       //echo "<script>window.location.href='../classify.html';</script>";
       //header("location:javascript://history.go(-2)");
       echo "<script>window.open('frame.html', '_top');</script>";
    }
    else
    {
        echo "Error";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Feedback!</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            p{
                text-align:center;
                margin-top:3px;
                padding:3px;
            }
            a:hover{
color:orange;}
           body{
            background-color:lightblue;
           }
           .feedback{
            align-items:center;
            justify-content:center;
            border:2px solid grey;
            width:300px;
            margin-left:38%;
            margin-top:100px;
            padding:10px;
            background-color:white;
           }
           .star{
            text-align:center;
           }
           .ref{
            text-align:center;
            padding:10px;
           }
           .ref1{
            text-align:right;
            padding:10px;
           }
           .star i{
            color: #e6e6e6;
            font-size:35px;
            cursor:pointer;
            transition:color 0.2s ease;
           }
           .star i.active{
            color:#ff9c1a;
           }
           .required::after{
            content:' * ';
            color:red;
           }
            </style>
</head>
<body>
        <div class="content" style="height:fit-content; margin-top:-5%;">
        <div class="feedback">
        <h6 style="text-align:center;">Thanks for your time!! Hope you had a great time and chosen your valuable service provider</h6><br><br>
        <p>We value your time but kindly leave your feedback here..</p><br><br><br>
        <div class="star">
           <!-- <a href="#" onclick="change1()" id="one"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change2()" id="two"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change3()" id="three"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change4()" id="four"><span class="fa fa-star"></span></a>
            <a href="#" onclick="change5()" id="five"><span class="fa fa-star"></span></a>--> 
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="ref" style="height:fit-content;">
            <form method="POST">
                <label for="user">Username</label>
                <input id="user" name="username" placeholder="Enter your user name given while booking yourself" required/><br><br>
                <input  type="hidden" id="demo" name="feedback" value=0 placeholder="star"></input>
                <!--<button><a href="feed.php" target="_top">Submit</a></button>-->
                <label for="sp" class="required">Service Provider name</label><br>
                <select id="sp" name="sp" placeholder="Enter your user name given while booking yourself" required>
                    <?php include("../conn.php");
                          $var="SELECT * from `crud`";
                          $query=mysqli_query($con,$var);
                          if($query)
                          {
                            while($row=mysqli_fetch_assoc($query))
                            {
                                $sname=$row['name'];
                                $prod=$row['product'];
                    echo "<option>$sname-$prod</option>";
                            }
                          }
                          else
                          {
                            echo "<script>alert('Error');</script>";
                          }
                    ?>
                </select>
                    <br><br>
                <textarea rows="5"  placeholder="Type here" name="review"></textarea><br>
                <button type="submit" name="submit">Submit</button>
        </form>
        <div class="ref1">
            <button><a href="frame.html" target="_top">Not now</a></button>
        </div>
        </div>
        </div>
        </div>
<script>
    //var count=0;
function change1(){
let x=document.getElementById("one");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=1;
//count++;
}
function change2(){
let x=document.getElementById("two");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=2;
//count++;
}
function change3(){
let x=document.getElementById("three");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=3;
//count++;
}
function change4(){
let x=document.getElementById("four");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=4;
//count++;
}
function change5(){
let x=document.getElementById("five");
x.style.color="orange";
var s=document.getElementById("demo");
s.value=5;
//count++;
}
const stars=document.querySelectorAll(".star i");
//console.log(stars);
//let cnt=0
stars.forEach((star,index1)=>{
    star.addEventListener("click",()=>{
        console.log(index1);
        document.getElementById("demo").value=index1+1;
        stars.forEach((star,index2)=>{
            index1>=index2?star.classList.add("active"):star.classList.remove("active")
           // cnt=index2;
        });
    });
});

</script>
</body>
</html>