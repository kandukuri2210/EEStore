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
        $labels=array('stove','bulb','mixi','grinder','calc','heater');
        $sql="SELECT uproduct,COUNT(*) as cnt from `booking` WHERE ucategory='Electric' group by uproduct;";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $uproduct=$row['uproduct'];
            $cnt=$row['cnt'];
            if($uproduct=='stove')
            {
                $data[0]=$cnt;
            }
            else if($uproduct=='bulb')
            {
                $data[1]=$cnt;
            }
            else if($uproduct=='mixi')
            {
                $data[2]=$cnt;
            }
            else if($uproduct=='grinder')
            {
                $data[3]=$cnt;
            }
            else if($uproduct=='calculator')
            {
                $data[4]=$cnt;
            }
            else if($uproduct=='heater')
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
                    label: 'Number of users booked for respective Electric Product',
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
