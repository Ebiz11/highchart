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
            type: 'pie'
        },
        title: {
            text: 'Browser market shares. January, 2015 to May, 2015'
        },
        subtitle: {
            text: 'Click the slices to view versions. Source: netmarketshare.com.'
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
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

<div id="container" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>

<!-- Data from www.netmarketshare.com. Select Browsers => Desktop share by version. Download as tsv. -->
<!-- <pre id="tsv" style="display:none">Browser Version    Total Market Share
Microsoft Internet Explorer 8.0    26.61%
Microsoft Internet Explorer 9.0    16.96%
Chrome 18.0    8.01%
Chrome 19.0    7.73%
Firefox 12    6.72%
Microsoft Internet Explorer 6.0    6.40%
Firefox 11    4.72%
Microsoft Internet Explorer 7.0    3.55%
Safari 5.1    3.53%
Firefox 13    2.16%
Firefox 3.6    1.87%
Opera 11.x    1.30%
Chrome 17.0    1.13%
Firefox 10    0.90%
Safari 5.0    0.85%
Firefox 9.0    0.65%
Firefox 8.0    0.55%
Firefox 4.0    0.50%
Chrome 16.0    0.45%
Firefox 3.0    0.36%
Firefox 3.5    0.36%
Firefox 6.0    0.32%
Firefox 5.0    0.31%
Firefox 7.0    0.29%
Proprietary or Undetectable    0.29%
Chrome 18.0 - Maxthon Edition    0.26%
Chrome 14.0    0.25%
Chrome 20.0    0.24%
Chrome 15.0    0.18%
Chrome 12.0    0.16%
Opera 12.x    0.15%
Safari 4.0    0.14%
Chrome 13.0    0.13%
Safari 4.1    0.12%
Chrome 11.0    0.10%
Firefox 14    0.10%
Firefox 2.0    0.09%
Chrome 10.0    0.09%
Opera 10.x    0.09%
Microsoft Internet Explorer 8.0 - Tencent Traveler Edition    0.09%</pre> -->

	</body>
</html>
