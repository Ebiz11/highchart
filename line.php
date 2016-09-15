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
    $('#container').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
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
          data : [<?php echo $datanya ?>]
          },
          <?php } ?>
         ]
    });
});
		</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
