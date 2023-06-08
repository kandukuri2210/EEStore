<?php 
function pending()
    {
      include "conn.php";
      if($con)
      {
      $pend="Select * from `booking` where status='Pending'";
      $result=mysqli_query($con,$pend);
      echo "<table class='table'>
        <thead>
          <tr>
            <th scope='col'>User Id</th>
            <th scope='col'>Service Provider</th>
            <th scope='col'>Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Mobile</th>
            <th scope='col'>Locality</th>
            <th scope='col'>Category</th>
            <th scope='col'>Product</th>
            <th scope='col'>Issue</th>
            <th scope='col'>Rating(/5)</th>
            <th scope='col'>Status</th>
            <th scope='col'>Operation</th>
          </tr>
        </thead>";
      }
    }

?>