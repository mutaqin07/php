<?php
$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$today=$date->format('d-m-Y');
?>
<!-- silakan desain dengan menggunakan CSS -->
<style type="text/css">
	table.gridtable {
		font-family: arial,sans-serif;
		font-size:9px;
		border-collapse: collapse;
	}
	table.gridtable th {
		border: 1px #000 solid;
		padding: 6px;
		background-color: #dedede;
		font-size: 12px;
	}
	table.gridtable td {
		border: 1px #000 solid;
		padding: 6px;
		font-size: 12px;
	}
</style>
<div style='text-align:center '>
<font style="font-weight:bold; font-size: 14px;">LAPORAN DAFTAR USER</font><br />
</div>
<br />
<div style="text-align: left">
	Tgl cetak: <?php echo $today; ?>
</div><br />
<table cellspacing="0" class="gridtable" width="100%" >
  <thead>
    <tr style="text-align: center;">
		<th style="width: 1%;">No</th>
		<th style="width: 15%;">First Name</th>
		<th style="width: 15%;">Last Name</th>
		<th style="width: 10%;">Phone No.</th>
		<th style="width: 10%;">Email</th>
	</tr>
  </thead>
  <tbody >
  <?php
  $no=1;
  foreach($data->result() as $row)
  {
  ?>
  <tr style="background: #FFFFFF; text-align: left;">
  	<td style="text-align: center;"><?php echo $no; ?></td>
    <td ><?php echo $row->firstname; ?></td>
	<td ><?php echo $row->lastname; ?></td>
	<td ><?php echo $row->phone; ?></td>
	<td ><?php echo $row->email; ?></td>
  </tr>
  <?php
  $no++;
  }
  ?>
  </tbody>
</table>