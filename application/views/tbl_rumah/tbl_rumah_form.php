<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA RUMAH</h3>
			</div>
			<div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Komplek <?php echo form_error('id_komplek') ?></td>
						<td>
							<?php echo cmb_dinamis('id_komplek', 'tbl_komplek', 'nama_komplek', 'id_komplek', $id_komplek)?>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Blok <?php echo form_error('blok') ?></td>
						<td>
						<select name="blok" class="form-control">
							<option value="A" <?php if($blok == 'A') echo 'selected'; ?>>A</option>
							<option value="B" <?php if($blok == 'B') echo 'selected'; ?>>B</option>
							<option value="C" <?php if($blok == 'C') echo 'selected'; ?>>C</option>
							<option value="D" <?php if($blok == 'D') echo 'selected'; ?>>D</option>
							<option value="E" <?php if($blok == 'E') echo 'selected'; ?>>E</option>
							<option value="F" <?php if($blok == 'F') echo 'selected'; ?>>F</option>
							<option value="G" <?php if($blok == 'G') echo 'selected'; ?>>G</option>
							<option value="H" <?php if($blok == 'H') echo 'selected'; ?>>H</option>
							<option value="I" <?php if($blok == 'I') echo 'selected'; ?>>I</option>
							<option value="J" <?php if($blok == 'J') echo 'selected'; ?>>J</option>
							<option value="K" <?php if($blok == 'K') echo 'selected'; ?>>K</option>
							<option value="L" <?php if($blok == 'L') echo 'selected'; ?>>L</option>
							<option value="M" <?php if($blok == 'M') echo 'selected'; ?>>M</option>
							<option value="N" <?php if($blok == 'N') echo 'selected'; ?>>N</option>
							<option value="O" <?php if($blok == 'O') echo 'selected'; ?>>O</option>
							<option value="P" <?php if($blok == 'P') echo 'selected'; ?>>P</option>
							<option value="Q" <?php if($blok == 'Q') echo 'selected'; ?>>Q</option>
							<option value="R" <?php if($blok == 'R') echo 'selected'; ?>>R</option>
							<option value="S" <?php if($blok == 'S') echo 'selected'; ?>>S</option>
							<option value="T" <?php if($blok == 'T') echo 'selected'; ?>>T</option>
							<option value="U" <?php if($blok == 'U') echo 'selected'; ?>>U</option>
							<option value="V" <?php if($blok == 'V') echo 'selected'; ?>>V</option>
							<option value="W" <?php if($blok == 'W') echo 'selected'; ?>>W</option>
							<option value="X" <?php if($blok == 'X') echo 'selected'; ?>>X</option>
							<option value="Y" <?php if($blok == 'Y') echo 'selected'; ?>>Y</option>
							<option value="Z" <?php if($blok == 'Z') echo 'selected'; ?>>Z</option>
						</select>

						</td>
					</tr>
	
					<tr>
						<td width='200'>Nomer <?php echo form_error('nomer') ?></td><td><input type="number" class="form-control" name="nomer" id="nomer" placeholder="Nomer" value="<?php echo $nomer; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_rumah" value="<?php echo $id_rumah; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_rumah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>