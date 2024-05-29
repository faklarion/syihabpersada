<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PEMBERKASAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered'>

					<tr>
						<td width='200'>Kode Booking <?php echo form_error('kode_booking') ?></td>
						<td><input type="text" class="form-control" name="kode_booking" id="kode_booking"
								placeholder="Kode Booking" value="<?php echo $kode_booking; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Nama <?php echo form_error('nama') ?></td>
						<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"
								value="<?php echo $nama; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>NIK <?php echo form_error('nik') ?></td>
						<td><input type="text" class="form-control" name="nik" id="nik" placeholder="NIK"
								value="<?php echo $nik; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td>
						<td>
						<select id="pekerjaan" name="pekerjaan" class="form-control">
							<option value="Karyawan Swasta" <?php if($pekerjaan=="Karyawan Swasta") echo 'selected="selected"'; ?>>Karyawan Swasta</option>
							<option value="PNS/ASN" <?php if($pekerjaan=="PNS/ASN") echo 'selected="selected"'; ?>>PNS/ASN</option>
							<option value="Wiraswasta" <?php if($pekerjaan=="Wiraswasta") echo 'selected="selected"'; ?>>Wiraswasta</option>
							<option value="Lainnya" <?php if($pekerjaan=="Lainnya") echo 'selected="selected"'; ?>>Lainnya</option>
						</select>
						</td>
					</tr>

					<tr>
						<td width='200'>BI Checking</td>
						<td>
							<select name="bi_checking" id="bi_checking" class="form-control">
								<option value="1" <?php if($bi_checking=="1") echo 'selected="selected"'; ?> >Bersih</option>
								<option value="2" <?php if($bi_checking=="2") echo 'selected="selected"'; ?> >Kol-2</option>
								<option value="3" <?php if($bi_checking=="3") echo 'selected="selected"'; ?> >Kol-5</option>
							</select>
						</td>
					</tr>


					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_berkas" value="<?php echo $id_berkas; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i>
								<?php echo $button ?></button>
							<a href="<?php echo site_url('tbl_berkas') ?>" class="btn btn-info"><i
									class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>

				</table>
			</form>
		</div>
	</section>
</div>