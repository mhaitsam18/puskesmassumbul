<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                            <th>Nama Dokter</th>
                            <th>Status Perjanjian</th>
                            <th>Waktu Pengajuan</th>
                            <th>Tanggal dan waktu Pertemuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        <?php foreach ($janji as $p) : ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $p->d_fullname ?></td>
                                <td>
                                    <?php if (is_null($p->status_pengajuan)) : ?>
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

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>