<!-- <link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">LIST</span> JANJI TEMU
                    </div>
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

            <div class="table-responsive mt-5">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Status Perjanjian</th>
                            <th>Waktu Pengajuan</th>
                            <th>Tanggal dan waktu Pertemuan</th>
                            <?php if ($this->session->userdata('jenis') == 'D') : ?>
                                <th>Aksi</th>
                            <?php endif; ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        <?php foreach ($janji as $p) : ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $p->r_fullname ?></td>
                                <td>
                                    <?php if ($p->d_id_asal) : ?>
                                        <?php
                                        $dokter_asal = $this->db->get_where('tb_dokter', [
                                            'd_id' => $p->d_id_asal
                                        ])->row();
                                        ?>
                                        peralihan dari dokter <?= $dokter_asal->d_fullname ?>
                                    <?php elseif (is_null($p->status_pengajuan)) : ?>
                                        Anda Belum melakukan pengajuan
                                    <?php elseif ($p->status_pengajuan == 0) : ?>
                                        Sedang proses mengajukan janji temu dengan dokter
                                    <?php elseif ($p->status_pengajuan == 1) : ?>
                                        Pengajuan janji diterima
                                    <?php elseif ($p->status_pengajuan == 2) : ?>
                                        Pengajuan janji ditolak
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?= date('j F Y H:i:s', strtotime($p->created_at)); ?>
                                </td>
                                <td>
                                    <?php if ($p->tanggal && $p->waktu) : ?>
                                        <?= date('j F Y', strtotime($p->tanggal)) . ' ' . $p->waktu; ?>
                                    <?php endif; ?>
                                </td>

                                <?php if ($this->session->userdata('jenis') == 'D') : ?>
                                    <td>

                                        <?php if ($p->status_pengajuan == 0) : ?>
                                            <a href="<?= base_url('dokter/kelola_janji/1/' . $p->id_janji_temu) ?>" class="btn btn-primary">Terima janji</a>
                                            <!-- <a href="<?= base_url('dokter/kelola_janji/2/' . $p->id_janji_temu) ?>" class="btn btn-danger">Tolak janji</a> -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#janjiTemuModal<?= $p->id_janji_temu ?>">Alihkan Janji Temu</button>
                                        <?php endif ?>
                                    </td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">DATA</span> JANJI TEMU YANG DIALIHKAN
                    </div>
                </div>
            </div>

            <div class="table-responsive mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        <?php foreach ($peralihan as $p) : ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $p->r_fullname ?></td>
                                <td><?= $p->d_fullname ?></td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php foreach ($janji as $p) : ?>
    <!-- Modal -->
    <div class="modal fade" id="janjiTemuModal<?= $p->id_janji_temu ?>" tabindex="-1" aria-labelledby="janjiTemuModalLabel<?= $p->id_janji_temu ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="janjiTemuModalLabel<?= $p->id_janji_temu ?>">Ajukan Pertemuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/alihkan_janji') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_janji_temu" value="<?= $p->id_janji_temu ?>">
                        <div class="form-group">
                            <label for="d_id">Nama Dokter</label>
                            <select class="form-control" name="d_id" id="d_id">
                                <option value="" selected disabled>Pilih Dokter</option>
                                <?php foreach ($data_dokter as $dokter) : ?>
                                    <option value="<?= $dokter->d_id ?>"><?= $dokter->d_fullname ?></option>
                                <?php endforeach; ?>
                            </select>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>