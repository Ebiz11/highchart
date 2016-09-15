<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
#container {
    height: 400px;
    min-width: 310px;
    max-width: 800px;
    margin: 0 auto;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            }
        },

        title: {
            text: 'Total fruit consumption, grouped by gender'
        },

        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Number of fruits'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [
				// {
        //     name: 'John',
        //     data: [5, 3, 4, 7, 2],
        //     stack: 'male'
        // }, {

					<?php
					$dbh = new PDO('mysql:host=localhost; dbname=angular', "root","");
					$hasil=array();
					$sql = $dbh->query("SELECT*FROM city ORDER BY id_city");
					while ($data=$sql->fetch()) {
						$hasil_s['name'] =$data['nama_kota'];
						$datanya="";
						$sql1 = $dbh->query("SELECT*FROM data WHERE id_city ='$data[id_city]' ORDER BY id_data");
						while ($data1=$sql1->fetch()) {
								$datanya.=$data1['data'].",";
						} ?>
						{
						name : '<?php echo $data['nama_kota']; ?>',
						data : [<?php echo $datanya ?>],
						stack : '<?php echo $data['jenis']; ?>'
						},
						<?php } ?>
			]
    });
});


		</script>
	</head>
	<body>

		<script src="highcharts.js"></script>
		<script src="highcharts-3d.js"></script>
		<script src="exporting.js"></script>

<div id="container" style="height: 400px"></div>
	</body>
</html>
