<?php
//Displaying in the grid format from service providers(crud here) table on clicking admin page
include '../conn.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud operation</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <script>
          function func(){
            return confirm("Are you sure?");
          }
          </script>
          <style>
            table,th,td 
            {
              border:2px solid black;
              border-collapse:collapse;
            }
          </style>
    </head>
    <body>
        <div class="container">
          <button class="btn btn-primary my-5"><a href="../admin/rightpane.html" class="text-light">Back</a></button>
            <button class="btn btn-primary my-5"><a href="sp.php" class="text-light">Add Service Provider</a>
        </button>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Area</th>
      <th scope="col">Locality</th>
      <th scope="col">Category</th>
      <th scope="col">Product</th>
      <th scope="col">Password</th>
      <th scope="col" colspan=2>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
$sql="Select * from `crud`";
$result=mysqli_query($con,$sql);
if($result){
    while( $row=mysqli_fetch_assoc($result)){
        $sid=$row['sid'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $area=$row['area'];
        $locality=$row['locality'];
        $category=$row['category'];
        $product=$row['product'];
        $password=$row['password'];
        echo '<tr>
        <th scope="row">'.$sid.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$area.'</td>
        <td>'.$locality.'</td>
        <td>'.$category.'</td>
        <td>'.$product.'</td>
        <td>'.$password.'</td>
        <td>
        <button class="btn btn-primary"><a href="../admin/update.php?updateid='.$sid.'" class="text-light" onclick="return func()">Update</a></button>
        </td>
        <td>
        <button class="btn btn-danger"><a href="../admin/delete.php?deleteid='.$sid.'" class="text-light" onclick="return func()">Delete</a></button>
        </td>
      </tr>';
    }
}
    ?>
  </tbody>
</table>
        </div>
    </body>
</html>
