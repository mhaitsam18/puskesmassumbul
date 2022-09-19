<!-- <link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">DAFTAR</span> DOKTER
                    </div>
                    <?php if ($this->session->userdata('jenis') == 'D') : ?>
                        <!-- <a href="<?= base_url('dokter/edit_jadwal') ?>" class="btn btn-primary">Edit Jadwal Saya</a> -->
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($this->session->flashdata('message')) : ?>
                <div class="section testimonial">
                    <div class="testimonial-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <p align="center"><?php echo $this->session->flashdata('message'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>



            <?php
            $id_user = $this->session->userdata('is_pasien');
            $no = 1;
            ?>
            <?php foreach ($dokter as $rs) : ?>
                <div class="box box-info">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title"><?= $no++ . '. ' . $rs['d_fullname'] ?></h3>
                                <br>
                                <span style="margin-left:20px;"><?= $rs['poli_nama'] ?></span>
                            </div>
                            <div class="col-md-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajukanPertemuanModal<?= $rs['d_id'] ?>">Ajukan Pertemuan</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<?php foreach ($dokter as $rs) : ?>
    <!-- Modal -->
    <div class="modal fade" id="ajukanPertemuanModal<?= $rs['d_id'] ?>" tabindex="-1" aria-labelledby="ajukanPertemuanModalLabel<?= $rs['d_id'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajukanPertemuanModalLabel<?= $rs['d_id'] ?>">Ajukan Pertemuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/ajukan_temu') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="d_id" value="<?= $rs['d_id'] ?>">
                        <div class="form-group">
                            <label for="dokter">Nama Dokter</label>
                            <input type="text" class="form-control" name="dokter" id="dokter" value="<?= $rs['d_fullname'] ?>" readonly>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" min="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col">
                                <label for="waktu">Waktu</label>
                                <input type="time" class="form-control" name="waktu" id="waktu">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>