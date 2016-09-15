<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Browser market shares. January, 2015 to May, 2015'
        },
        subtitle: {
            text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

				series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [
						<?php
						$dbh = new PDO('mysql:host=localhost; dbname=angular', "root","");
						$hasil=array();
						$sql = $dbh->query("SELECT*FROM city");
						while ($data=$sql->fetch()) {?>
						{
						name : '<?php echo $data['nama_kota']; ?>',
						y : <?php echo $data['dataY'] ?>,
						drilldown: '<?php echo $data['nama_kota']; ?>'
						},
						<?php } ?>
					]
        }],
        drilldown: {
            series: [
						<?php
						$dbh = new PDO('mysql:host=localhost; dbname=angular', "root","");
						$sql = $dbh->query("SELECT*FROM city");
						while ($data=$sql->fetch()) {?>
						{
						name : '<?php echo $data['nama_kota']; ?>',
						id : '<?php echo $data['nama_kota']; ?>',
						data: [
							<?php
							$sql1 = $dbh->query("SELECT*FROM data_drill_down WHERE id_city='$data[id_city]'");
							while ($data1=$sql1->fetch()) { ?>
							['<?php echo $data1['nama_versi']?>',<?php echo $data1['data']?>],
							<?php } ?>
						]},
						<?php } ?>
						]
        }
    });
});
		</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="data.js"></script>
<script src="drilldown.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
