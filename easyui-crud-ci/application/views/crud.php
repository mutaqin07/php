<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CRUD CodeIgniter dengan EasyUI</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/default/easyui.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/icon.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jeasyui/themes/color.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/jeasyui/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jeasyui/jquery.easyui.min.js'); ?>"></script>
</head>
<body class="easyui-layout">
    
    <!-- top -->
    <div data-options="region:'north',split:true" title="North Title" style="height:100px;padding:10px;">
        <span style="font-size:30px">CRUD CodeIgniter dengan EasyUI</span>
    </div>
     
    <!-- center -->
    <div data-options="region:'center'" title="Main Content" style="overflow:hidden;padding:1px">
        <?php $this->load->view('grid'); ?>
    </div>
</body>
</html>