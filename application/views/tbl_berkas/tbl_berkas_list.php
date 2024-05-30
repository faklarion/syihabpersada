<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PEMBERKASAN</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
                                    <?php echo anchor(site_url('tbl_berkas/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <form action="<?php echo site_url('tbl_berkas/index'); ?>" class="form-inline"
                                    method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                                ?>
                                                <a href="<?php echo site_url('tbl_berkas'); ?>"
                                                    class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                            ?>
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4 text-center">
                                <div style="margin-top: 8px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                            </div>
                            <div class="col-md-3 text-right">

                            </div>
                        </div>
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Tanggal Booking</th>
                                <th>Status</th>
                                <th>BI Checking</th>
                                <th>Marketing</th>
                                <th>Action</th>
                            </tr><?php
                            foreach ($tbl_berkas_data as $tbl_berkas) {
                                ?>
                                <tr>
                                    <td width="10px"><?php echo ++$start ?></td>
                                    <td><?php echo $tbl_berkas->kode_booking ?></td>
                                    <td><?php echo $tbl_berkas->nama ?></td>
                                    <td><?php echo $tbl_berkas->nik ?></td>
                                    <td><?php echo $tbl_berkas->pekerjaan ?></td>
                                    <td><?php echo tanggalIndo($tbl_berkas->tanggal_booking) ?></td>
                                    <td><?php echo $tbl_berkas->status ?></td>
                                    <td>
                                        <?php
                                        if ($tbl_berkas->bi_checking == 1) {
                                            echo 'Bersih';
                                        } elseif ($tbl_berkas->bi_checking == 2) {
                                            echo 'Kol-2';
                                        } elseif ($tbl_berkas->bi_checking == 3) {
                                            echo 'Kol-5';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $tbl_berkas->full_name ?></td>
                                    <td style="text-align:center" width="200px">
                                        <?php if ($this->session->userdata('id_user_level') == 1) { ?>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#myModal<?php echo $tbl_berkas->id_berkas ?>"><i
                                                    class="fa fa-calendar-check-o" aria-hidden="true"> Ceklis
                                                    Berkas</i></button>
                                        <?php } ?>
                                        <?php
                                        echo '  ';
                                        echo anchor(site_url('tbl_berkas/update/' . $tbl_berkas->id_berkas), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                        echo '  ';
                                        echo anchor(site_url('tbl_berkas/delete/' . $tbl_berkas->id_berkas), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-right">
                                <?php echo $pagination ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL SUB -->
<?php
foreach ($tbl_berkas_data as $row): ?>
    <div class="modal fade bd-example-modal-md" id="myModal<?php echo $row->id_berkas ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document" style="width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ceklis Berkas <span><?php echo $row->nama ?></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- FORM -->
                    <form action="<?php echo site_url('tbl_berkas/simpan_syarat') ?>" method="post">

                        <table class='table table-bordered'>

                            <tr>
                                <td width='200'>Kelengkapan Berkas</td>
                                <?php 
                                            $query = $this->db->query('SELECT * FROM tbl_syarat_berkas WHERE id_berkas = '.$row->id_berkas.'');
                                            $result = $query->result_array(); 
                                            foreach ($result as $res) {
                                                //echo $res['id_syarat'];
                                                $ids[] = $res['id_syarat'];
                                            }
                                            if($result) {
                                                $idsa = $ids;
                                            } else {
                                                $idsa = array(0);
                                            }
                                ?>
                                <td>
                                    <?php foreach ($data_syarat as $aresult): ?>
                                        
                                        <label><input type="checkbox" name="id_syarat[]" id="id_syarat" value="<?= $aresult->id_syarat ?>" <?php if (in_array($aresult->id_syarat,$idsa)){ echo "checked"; }?>>
                                            <?php echo $aresult->syarat; ?></label> <small>
                                            (<?php echo $aresult->keterangan; ?>)</small><br>
                                        <!-- Ganti 'id' dengan nama kolom yang sesuai dari tabel database -->
                                       
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                          

                            <tr>
                                <td>
                                    <input type="text" name="id_berkas" value="<?= $row->id_berkas ?>" hidden>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> SIMPAN</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>

        </div>

    </div>


<?php endforeach; ?>
<!-- END MODAL SUB -->