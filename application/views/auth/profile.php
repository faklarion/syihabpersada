<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">PROFILE</h3>
                    </div>
        
        <div class="box-body">
        <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
        <div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
                <?php if(($images == NULL) || ($images == '')) { ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/ppkosong.jpg'); ?>" style="width:125px; height:125px">
                <?php } else { ?>
				<img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/foto_profil/'.$images); ?>" style="width:125px; height:125px">
                <?php } ?>
				<h3 class="profile-username text-center"><?= $full_name; ?></h3>

				<p class="text-muted text-center">
					<?= $nama_level;?>
				</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item" style="text-align:center">
						<b>Email</b><br><a><?= $email; ?></a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#settings" data-toggle="tab">Ubah Identitas</a></li>
				<li><a href="#password" data-toggle="tab">Ubah Password</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="settings">
					<form class="form-horizontal" action="<?php echo site_url('user/updateProfile') ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">	
							<div class="col-sm-10">
							<p><b>Note :</b> Jika ingin mengubah nama dan email silakan hubungi tim IT</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" placeholder="Email" name="email" value="<?= $email; ?>" required readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Nama" name="full_name" value="<?= $full_name; ?>" required readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" placeholder="Foto" name="images" value="<?= $images; ?>">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="password">
					<form class="form-horizontal" action="<?php echo site_url('user/updatePassword') ?>" method="POST">
						
						<div class="form-group">
							<label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Password Baru" name="password" required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
        