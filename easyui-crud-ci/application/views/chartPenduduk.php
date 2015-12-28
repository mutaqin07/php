<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Data Penduduk Indonesia </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/default/easyui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/icon.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/color.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/jeasyui/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jeasyui/jquery.easyui.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/exporting.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/themes/grid-light.js'); ?>"></script>
<script type="text/javascript">
 
$(function () {
	$('#container').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Data Penduduk Indonesia'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				}
			}
		},
		series: [{
			name: 'Persentase Penduduk',
			data: [
					<?php 
					// data yang diambil dari database
					if(count($graph)>0)
					{
					   foreach ($graph as $data) {
					   echo "['" .$data->provinsi . "'," . $data->jumlah ."],\n";
					   }
					}
					?>
			]
		}]
	});
});
 
</script>
</head>
<body>
 
<div id="container"></div>
<br/>
<a href="<?php echo site_url('crud') ?>" class="easyui-linkbutton" iconCls="icon-back">Back</a>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>