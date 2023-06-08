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
    include "../../conn.php";
        $data=array(0,0,0,0,0,0);
        $labels=array('ac','fan','laptop','mobile','refrigerator','speaker');
        $sql="SELECT uproduct,COUNT(*) as cnt from `booking` WHERE ucategory='Electronic' group by uproduct;";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $uproduct=$row['uproduct'];
            $cnt=$row['cnt'];
            if($uproduct=='ac')
            {
                $data[0]=$cnt;
            }
            else if($uproduct=='fan')
            {
                $data[1]=$cnt;
            }
            else if($uproduct=='laptop')
            {
                $data[2]=$cnt;
            }
            else if($uproduct=='Mobile')
            {
                $data[3]=$cnt;
            }
            else if($uproduct=='refrigerator')
            {
                $data[4]=$cnt;
            }
            else if($uproduct=='speaker')
            {
                $data[5]=$cnt;
            }
            //array_push($data,$cnt);
            //array_push($labels,$name);
        }
    ?>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Number of users booked for respective electronic product',
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
