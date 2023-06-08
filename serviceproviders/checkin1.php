 <?php
 session_start();
 ?>
 <!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Payment Gateway</title>
    <style>
      body{
        background-color:grey;
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
          height:50%;
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
          color:white;
          text-align:center;
          margin-top:3%;
        }
        </style>
  </head>
  <body>
  <div class="container">
  <!--<p>Please complete the registration process as a service provider if not have an account..</p>-->
  <div class="row">
  <div class="col-2">
                <img src="../images/image.jpg" width="100%" height="45%" HSPACE="10">
  </div>
  <div class="col-2">
   <div class="container my-5">
   <form method="POST" action="checkout-charge.php">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="tel" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off">
  </div>
  <div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" placeholder="Enter your city" name="city" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Amount</label>
    <input type="text" class="form-control" placeholder="Enter your amount" name="amount" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Payment type</label>
    <input type="text" class="form-control" placeholder="Enter your payment mode as payu" name="payment_type" autocomplete="off">
  </div>
  <!--<div class="form-group">
    <label>Payment Type</label><br>
    <label for="payment_type">COD</label>
    <input type="radio" class="form-control" name="payment_type" autocomplete="off" value="cod">
    <label for="payment_type">PayU</label>
    <input type="radio" class="form-control" name="payment_type" autocomplete="off" value="payu">
  </div>
  <button type="submit" name="submit"></button>-->
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51MSeZhSCNamWnLjKl0nQXe6RDs9cLM4jXErzxOIO9Ow6K8iNFkqb3bltSvLcTz1wW3fQ6UWm2pn1AbJP3qUz8WYv00vrqA00hm" 
  data-amount="<?php echo '$_GET["amount"]'?>"
  data-currency="inr" 
  data-locate="auto">
  </script>
  
</form>
   </div>
      </div>
      </div>
      </div>
  </body>
</html>