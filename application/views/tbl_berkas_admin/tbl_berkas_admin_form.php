<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_BERKAS_ADMIN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Kode Booking <?php echo form_error('kode_booking') ?></td><td><input type="text" class="form-control" name="kode_booking" id="kode_booking" placeholder="Kode Booking" value="<?php echo $kode_booking; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nik <?php echo form_error('nik') ?></td><td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Booking <?php echo form_error('tanggal_booking') ?></td>
						<td><input type="date" class="form-control" name="tanggal_booking" id="tanggal_booking" placeholder="Tanggal Booking" value="<?php echo $tanggal_booking; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users <?php echo form_error('id_users') ?></td><td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Bi Checking <?php echo form_error('bi_checking') ?></td><td><input type="text" class="form-control" name="bi_checking" id="bi_checking" placeholder="Bi Checking" value="<?php echo $bi_checking; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Ceklis <?php echo form_error('ceklis') ?></td><td><input type="text" class="form-control" name="ceklis" id="ceklis" placeholder="Ceklis" value="<?php echo $ceklis; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></td>
						<td><input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_berkas" value="<?php echo $id_berkas; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_berkas_admin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>