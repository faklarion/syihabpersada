<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PEMBERKASAN</h3>
			</div>
			<div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
			<form action="<?php echo $action; ?>" method="post" id="myForm">

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

					<?php
                    	if ($this->uri->segment(2) == 'create') {
                    ?>

					<tr>
						<td width='200'>Rumah</td>
						<td>
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Pilih Rumah</button>
							<input type="hidden" name="id_rumah_input" id="id_rumah_input" class="form-control" required>
						</td>
					</tr>
					<tr>
                        <td width='200'>Nama Komplek</td>
                        <td><span id="nama_komplek">-</span></td>
                    </tr>
                    <tr>
                        <td width='200'>Blok</td>
                        <td><span id="blok">-</span><span id="nomer">-</span></td>
                    </tr>

					<?php } ?>

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
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Pilih Rumah</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
				<form action="#" method="post">
					<label for="id_rumah">Rumah</label>
						<select name="id_rumah" id="id_rumah_select" class="form-control">
							<?php foreach ($data_rumah as $rumah): ?>
								<option value="<?php echo $rumah->id_rumah; ?>" data-nama-komplek="<?php echo $rumah->nama_komplek; ?>" data-blok="<?php echo $rumah->blok; ?>" data-nomer="<?php echo $rumah->nomer; ?>" data-id-rumah="<?php echo $rumah->id_rumah; ?>" <?php echo set_select('id_rumah', $rumah->id_rumah, isset($id_rumah) && $id_rumah == $rumah->id_rumah); ?>>
									<?php echo $rumah->nama_komplek; ?> - <?php echo $rumah->blok; ?><?php echo $rumah->nomer; ?>
								</option>
							<?php endforeach; ?>
						</select>
					<button type="button" class="btn btn-sm btn-danger" id="select_rumah">Pilih</button>
				</form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

<script>
  document.getElementById('myForm').addEventListener('submit', function(event) {
    var hiddenInput = document.getElementById('id_rumah_input');
    if (hiddenInput.value.trim() === '') {
      event.preventDefault(); // Mencegah formulir dikirim
      alert('Pilih Rumah Terlebih Dahulu !');
    }
  });
</script>