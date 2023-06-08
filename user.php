<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
          <button class="btn btn-primary my-5"><a href="admin/rightpane.html" class="text-light">Back</a></button>
          <!--  <button class="btn btn-primary my-5"><a href="sp.php" class="text-light">Add user</a>
        </button>
        <button class="btn3"><a href="qr.html" class="text">Paymentgateway</a></button>-->
         <button class="btn btn-primary my-5" name="pending"><a href="user.php?pending" class="text-light">Pending </a> </button>
            <button class="btn btn-primary my-5"><a href="user.php?completed" class="text-light">Completed</a>  </button>
        </div>
        
        <?php 
        include_once "conn.php";
        function func($feedback){
            $stars = "";
          for ($i = 1; $i <= 5; $i++) { 
            $i <= $feedback ? $stars .= "&#9733" : $stars .= "&#9734;";
          }
          
          return $stars;
          }
        if(isset($_GET['pending']))
        {
            $query="Select * from `booking` where status='Pending'";
            echo "<table style='border:2px solid black;width:100%;'><th></th>
            <th>User ID</th>
            <th>Service Provider</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Locality</th>
            <th>Category</th>
            <th>Product</th>
            <th>Issue</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Operation</th>";
            $res=mysqli_query($con,$query);
            while( $row=mysqli_fetch_assoc($res))
            {
                $feedback=func($row['feedback']);
                $uid=$row['uid'];
                $email=$row['email'];
                $uname=$row['uname'];
                $umail=$row['umail'];
                $uphno=$row['uphno'];
                $ulocality=$row['ulocality'];
                $ucategory=$row['ucategory'];
                $uproduct=$row['uproduct'];
                $uissue=$row['uissue'];
                //$feedback=$row['feedback'];
                $status=$row['status'];
                echo "<tr><td></td>
                <td>$uid</td>
                <td>$email</td>
                <td>$uname</td>
                <td>$umail</td>
                <td>$uphno</td>
                <td>$ulocality</td>
                <td>$ucategory</td>
                <td>$uproduct</td>
                <td>$uissue</td>
                <td>$feedback</td>
                <td>$status</td>
                <td><button class='btn btn-primary'><a href='users/complete.php?completeid=$uid'class='text-light'>Complete</a></button></td>
                </tr>
                </table>";
            }
        }
        ?>
</body>
</html>