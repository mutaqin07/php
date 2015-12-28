<div id="container">
    <h3>CodeIgniter with Highcharts</h3>
 
    <div id="body">
        <div id="chart"></div>
    </div>
 	<br/>
	<a href="<?php echo site_url('crud') ?>" class="easyui-linkbutton" iconCls="icon-back">Back</a>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/default/easyui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/icon.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/color.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/jeasyui/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jeasyui/jquery.easyui.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/exporting.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/themes/grid-light.js'); ?>"></script>
<script type="text/javascript">
jQuery(function(){
    new Highcharts.Chart({
        chart: {
            renderTo: 'chart',
            type: 'line',
        },
        title: {
            text: 'Pendapatan Tahun 2013',
            x: -20
        },
        subtitle: {
            text: 'sub judul',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Pendapatan (Juta) Y'
            }
        },
        series: [{
            name: 'Pendapatan (Juta) X',
            data: <?php echo json_encode($data); ?>
        }]
    });
}); 
</script>