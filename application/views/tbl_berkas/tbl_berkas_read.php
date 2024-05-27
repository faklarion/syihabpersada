
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PEMBERKASAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Kode Booking</td>
				<td><?php echo $kode_booking; ?></td>
			</tr>
	
			<tr>
				<td>Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
	
			<tr>
				<td>Nik</td>
				<td><?php echo $nik; ?></td>
			</tr>
	
			<tr>
				<td>Pekerjaan</td>
				<td><?php echo $pekerjaan; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Booking</td>
				<td><?php echo $tanggal_booking; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_berkas') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>