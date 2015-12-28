<!-- Data Grid -->
<table id="datagrid-crud" title="User" class="easyui-datagrid" style="width:auto; height: auto;" url="<?php echo site_url('crud/index'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
    <thead>
        <tr>
            <th field="id" width="30" sortable="true">ID</th>
            <th field="firstname" width="50" sortable="true">firstname</th>
            <th field="lastname" width="50" sortable="true">lastname</th>
            <th field="phone" width="50" sortable="true">phone</th>
			<th field="email" width="50" sortable="true">email</th>
        </tr>
    </thead>
</table>
<br /><br />
<a href="<?php echo site_url('crud/cart') ?>" class="easyui-linkbutton" iconCls="icon-print">View Cart</a>&emsp;
<a href="<?php echo site_url('crud/pendudukDiagram') ?>" class="easyui-linkbutton" iconCls="icon-print">View Grafik Penduduk</a>
<!-- Toolbar -->
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="create()">Tambah </a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update()">Edit </a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus()">Hapus </a>||
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak()">Cetak </a>
	<a href="javascript:void(0)" class="easyui-linkbutton c4" plain="true" onclick="excel()">Export to Excel </a>
</div>
 
<!-- Dialog Form -->
<div id="dialog-form" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#dialog-buttons">
    <form id="form" method="post" novalidate>
        <div class="form-item">
            <label for="type">Firstname</label><br />
            <input type="text" name="firstname" class="easyui-validatebox" required="true" size="53" maxlength="50" />
        </div>
        <div class="form-item">
            <label for="type">lastname</label><br />
            <input type="text" name="lastname" class="easyui-validatebox" required="true" size="53" maxlength="50" />
        </div>
        <div class="form-item">
            <label for="type">phone</label><br />
            <input type="text" name="phone" class="easyui-validatebox" required="true" size="53" maxlength="50" />
        </div>
		 <div class="form-item">
            <label for="type">email</label><br />
            <input type="text" name="email" class="easyui-validatebox" required="true" size="53" maxlength="50" />
        </div>
    </form>
</div>
 
<!-- Dialog Button -->
<div id="dialog-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Simpan</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#dialog-form').dialog('close')">Batal</a>
</div>
<script type="text/javascript">
var url;
 
function create(){
    jQuery('#dialog-form').dialog('open').dialog('setTitle','Tambah user');
    jQuery('#form').form('clear');
    url = '<?php echo site_url('crud/create'); ?>';
}
 
function update(){
    var row = jQuery('#datagrid-crud').datagrid('getSelected');
    if(row){
        jQuery('#dialog-form').dialog('open').dialog('setTitle','Edit user');
        jQuery('#form').form('load',row);
        url = '<?php echo site_url('crud/update'); ?>/' + row.id;
    }
}
 
function save(){
    jQuery('#form').form('submit',{
        url: url,
        onSubmit: function(){
            return jQuery(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if(result.success){
                jQuery('#dialog-form').dialog('close');
                jQuery('#datagrid-crud').datagrid('reload');
            } else {
                jQuery.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}
 
function hapus(){
    var row = jQuery('#datagrid-crud').datagrid('getSelected');
    if (row){
        jQuery.messager.confirm('Confirm','Are you sure you want to remove this user?',function(r){
            if (r){
                jQuery.post('<?php echo site_url('crud/delete'); ?>',{id:row.id},function(result){
                    if (result.success){
                        jQuery('#datagrid-crud').datagrid('reload');
                    } else {
                        jQuery.messager.show({
                            title: 'Error',
                            msg: result.msg
                        });
                    }
                },'json');
            }
        });
    }
}

function cetak(){
	var mywindow = window.open('<?php echo site_url('crud/cetak'); ?>','Laporan Users','size=800,height=600,scrollbars=yes,resizeable=no,status=yes,menubar=yes,scrollbars=yes');
	mywindow.moveTo(30,0);
	mywindow.resizeTo(screen.width-50,screen.height-50);

}

function excel(){
	location.href='<?php echo site_url('crud/excel'); ?>';
}
</script>
 