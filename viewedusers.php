<!DOCTYPE html>
<html>
<head>
    <title>Bar Chart</title>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <style>
    #myChart{
        width:800px;
        height:400px;
    }
    </style>
</head>
<body>
<canvas id="myChart"></canvas>
    <?php
    include "conn.php";
        $data=array();
        $labels=array();
        $sql="Select email,COUNT(*) as cnt from `booking` group by email";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $email=$row['email'];
            $cnt=$row['cnt'];
            array_push($data,$cnt);
            $find="Select name from `crud` where email='$email'";
            $result=mysqli_query($con,$find);
            while($rows=mysqli_fetch_assoc($result))
            $name=$rows['name'];
            array_push($labels,$name);
        }
    ?>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Number of users booked for respective service provider',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
               animation:{
                duration:0
               },
               hover:{
                animationDuration:0
               },
               responsiveAnimationDuration:0,
               maintainAspectRatio:false
            }
        });


    </script>
</body>
</html>
