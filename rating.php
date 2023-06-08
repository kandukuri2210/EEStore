<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #myChart {
            width: 500px;
            height: 500px;
            margin-left:auto;
            margin-right:auto;
        }
    </style>
</head>
<body>
    <canvas id="myChart"></canvas>
    <?php
    include "conn.php";
        $data = array(0, 0, 0, 0, 0, 0);
        $labels = array(0, 1, 2, 3, 4, 5);
        $sql = "SELECT feedback, COUNT(*) as cnt FROM `booking` GROUP BY feedback";
        $res = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $feedback = $row['feedback'];
            $cnt = $row['cnt'];
            $data[$feedback] = $cnt;
        }
    ?>
    <!--<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php //echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Number of reviews',
                    data: <?php //echo json_encode($data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(10, 200, 60, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false
            }
        });
    </script>-->
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Number of ratings',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(10, 200, 60, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    generateLabels: function(chart) {
                        var data = chart.data;
                        if (data.labels.length && data.datasets.length) {
                            return data.labels.map(function(label, i) {
                                var dataset = data.datasets[0];
                                var meta = chart.getDatasetMeta(0);
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[i];
                                var percentage = parseFloat(((currentValue / total) * 100).toFixed(1));
                                return {
                                    text: label + ": " + currentValue + " (" + percentage + "%)",
                                    fillStyle: meta.controller.getStyle(i)
                                };
                            });
                        }
                        return [];
                    }
                }
            }
        }
    });
</script>
</body>
</html>







