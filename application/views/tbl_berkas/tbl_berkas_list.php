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
                            <!-- <div class='col-md-3'>
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
                            </div> -->
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
                        <table class="table table-striped table-bordered dt-responsive nowrap" style="margin-bottom: 10px" id="tabelberkas">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Tanggal Booking</th>
                                <th>Rumah</th>
                                <th>Status</th>
                                <th>BI Checking</th>
                                <th>Marketing</th>
                                <th>Keterangan Ceklis</th>
                                <th>Tanggal Selesai</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($tbl_berkas_data as $tbl_berkas) {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $tbl_berkas->kode_booking ?></td>
                                    <td><?php echo $tbl_berkas->nama ?></td>
                                    <td><?php echo $tbl_berkas->nik ?></td>
                                    <td><?php echo $tbl_berkas->pekerjaan ?></td>
                                    <td><?php echo tanggalIndo($tbl_berkas->tanggal_booking) ?></td>
                                    <td><?php echo $tbl_berkas->nama_komplek?> - <?php echo $tbl_berkas->blok?><?php echo $tbl_berkas->nomer?></td>
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
                                    <td>
                                    <?php
                                        $checklist = explode(',', $tbl_berkas->ceklis);

                                        $completed = [
                                            '1',
                                            '2',
                                            '3',
                                            '4',
                                            '5',
                                            '6',
                                            '7',
                                            '8',
                                            '9',
                                            '10',
                                            '11',
                                        ];

                                        // Memeriksa apakah semua item di $checklist ada di $completed
                                        if (empty(array_diff($completed, $checklist))) {
                                            echo "<button class='btn btn-success btn-sm'>Semua ceklis sudah lengkap!</button><br>";
                                            if($tbl_berkas->status != 'Diserahkan ke Admin') {
                                            $link = site_url('tbl_berkas/simpan_marketing/'.$tbl_berkas->id_berkas.'');
                                            echo "<a href='$link' class='btn btn-sm btn-warning' onclick='return confirm(\"Serahkan Ke Admin?\")'><i class='fa fa-floppy-o' aria-hidden='true'></i> Serahkan ke admin</a>";
                                            }
                                        } else {
                                            echo "<button class='btn btn-danger btn-sm'>Masih ada ceklis yang belum selesai.</button>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if($tbl_berkas->tanggal_selesai == NULL) {
                                            echo 'Belum Selesai !';
                                        } else {
                                            echo tanggalIndo($tbl_berkas->tanggal_selesai);
                                            // Mengambil tanggal dari objek (asumsi formatnya adalah string tanggal)
                                             $date1 = $tbl_berkas->tanggal_booking;
                                             $date2 = $tbl_berkas->tanggal_selesai;
 
                                             // Mengonversi string tanggal menjadi objek DateTime
                                             $dateTime1 = new DateTime($date1);
                                             $dateTime2 = new DateTime($date2);
 
                                             // Menghitung selisih
                                             $interval = $dateTime1->diff($dateTime2);
                                             $daysWithAddition = $interval->days + 1;
 
                                             // Menampilkan hasil
                                             echo "<br>Waktu Pengerjaan: " . $daysWithAddition . " Hari";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align:center" width="200px">
                                        <?php 
                                        if($tbl_berkas->status != 'Diserahkan ke Admin') {
                                            if ($this->session->userdata('id_user_level') == 1) { ?>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#myModal<?php echo $tbl_berkas->id_berkas ?>"><i
                                                    class="fa fa-calendar-check-o" aria-hidden="true"> Ceklis
                                                    Berkas</i></button>
                                        <?php } ?>
                                        <?php
                                        echo '  ';
                                        echo anchor(site_url('tbl_berkas/update/' . $tbl_berkas->id_berkas), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm"');
                                        echo '  ';
                                        echo anchor(site_url('tbl_berkas/delete/' . $tbl_berkas->id_berkas), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"');
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL SUB -->
<?php foreach ($tbl_berkas_data as $row): ?>
    <div class="modal fade bd-example-modal-md" id="myModal<?php echo $row->id_berkas ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document" style="width: 100%;">
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
                        <input type="hidden" name="id_berkas" value="<?php echo $row->id_berkas?>">
                        <?php 
                            $checkedValues      = explode(',', $row->ceklis);
                            $checkboxChecked1   = in_array('1', $checkedValues);
                            $checkboxChecked2   = in_array('2', $checkedValues);
                            $checkboxChecked3   = in_array('3', $checkedValues);
                            $checkboxChecked4   = in_array('4', $checkedValues);
                            $checkboxChecked5   = in_array('5', $checkedValues);
                            $checkboxChecked6   = in_array('6', $checkedValues);
                            $checkboxChecked7   = in_array('7', $checkedValues);
                            $checkboxChecked8   = in_array('8', $checkedValues);
                            $checkboxChecked9   = in_array('9', $checkedValues);
                            $checkboxChecked10  = in_array('10', $checkedValues);
                            $checkboxChecked11  = in_array('11', $checkedValues);
                        ?>
                        <table class='table table-bordered'>
                            <tr>
                                <td>Kelengkapan Berkas</td>
                                <td>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="1" 
                                        <?php if ($checkboxChecked1) echo 'checked'; ?>>
                                            1. Pas Foto Berwarna 3x4 2 Lembar
                                        </label> 
                                        <small>
                                            (Total 6 Lembar 1 Orang)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="2"
                                        <?php if ($checkboxChecked2) echo 'checked'; ?>>
                                            2. Fotocopy KTP (Suami dan Istri jika sudah menikah)
                                        </label> 
                                        <small>
                                            (Total 3 Lembar Copy-an)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="3"
                                        <?php if ($checkboxChecked3) echo 'checked'; ?>>
                                            3. Surat Keterangan Belum Memiliki Rumah dari Kelurahan
                                        </label> 
                                        <small>
                                            (1 Asli, 2 Copy-an)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="4"
                                        <?php if ($checkboxChecked4) echo 'checked'; ?>>
                                            4. Fotocopy Kartu Keluarga
                                        </label> 
                                        <small>
                                            (Total 3 Lembar Copy-an)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="5"
                                        <?php if ($checkboxChecked5) echo 'checked'; ?>>
                                            5. Fotocopy Buku Menikah/Surat Asli Ket. Belum Menikah dari Kelurahan
                                        </label> 
                                        <small>
                                            (1 Asli, 2 Copy-an untuk yang single)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="6"
                                        <?php if ($checkboxChecked6) echo 'checked'; ?>>
                                            6. Fotocopy NPWP
                                        </label> 
                                        <small>
                                            (Konsulkan ke admin pemberkasan jika belum punya)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="7"
                                        <?php if ($checkboxChecked7) echo 'checked'; ?>>
                                            7. Fotocopy SK. PNS/Surat Ket. Kerja min. 2 Tahun
                                        </label> 
                                        <small>
                                            (Total 3 Lembar Copy-an)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="8"
                                        <?php if ($checkboxChecked8) echo 'checked'; ?>>
                                            8. Fotocopy Slip Gaji 3 Bulan Terakhir
                                        </label> 
                                        <small>
                                            (Copy 3x Per-slip)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="9"
                                        <?php if ($checkboxChecked9) echo 'checked'; ?>>
                                            9. Fotocopy Rekening Koran 3 Bulan Terakhir
                                        </label> 
                                        <small>
                                            (Copy 3x Per-lembar)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="10"
                                        <?php if ($checkboxChecked10) echo 'checked'; ?>>
                                            10. Surat Domisili dari RT/Kelurahan jika alamat beda dari KTP/KTP Luar BJB, MTP
                                        </label> 
                                        <small>
                                            (1 Asli, 2 Copy-an)
                                        </small>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="id_syarat[]" id="id_syarat" value="11"
                                        <?php if ($checkboxChecked11) echo 'checked'; ?>>
                                            11. Surat Bukti Pembayaran Listrik Bulanan, jika online, sertakan screenshot
                                        </label> 
                                        <small>
                                            (Jika Token, tidak perlu)
                                        </small>
                                        <br>
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