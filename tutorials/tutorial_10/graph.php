<?php include "connection.php"; ?>
<html>

<head>
    <title>Users Graph</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Years', 'Ages'],
                <?php
                $query = "select * from users";
                $res = mysqli_query($con, $query);
                while ($data = mysqli_fetch_array($res)) {
                    $year = $data['year'];
                    $age = $data['age'];
                ?>['<?php echo $year; ?>', <?php echo $age; ?>],
                <?php
                }
                ?>
            ]);
            var options = {
                chart: {
                    title: 'Login users year and age counts',
                    subtitle: 'Years and ages',
                },
                bars: 'vertical'
            };
            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>

<body>
    <div id="barchart_material" style="width: 900px;height: 500px;"></div>
    <a href="index.php" class="link-primary pl-3">Read</a>
    <a href="create.php" class="link-primary pl-5">Create</a>
</body>

</html>