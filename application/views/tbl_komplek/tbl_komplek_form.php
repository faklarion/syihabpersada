<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_KOMPLEK</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Komplek <?php echo form_error('nama_komplek') ?></td><td><input type="text" class="form-control" name="nama_komplek" id="nama_komplek" placeholder="Nama Komplek" value="<?php echo $nama_komplek; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_komplek" value="<?php echo $id_komplek; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_komplek') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>