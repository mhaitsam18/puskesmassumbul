<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">HISTORI RESEP</span> OBAT
                    </div>
                </div>
            </div>
            <a href="<?= base_url('dokter/buat_resep') ?>" class="btn btn-primary">Buat Resep Obat</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Resep</th>
                        <th scope="col">Tanggal dibuat</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; ?>
                    <?php foreach ($resep as $s) : ?>
                        <tr>
                            <th scope="row"><?= ++$no ?></th>
                            <td><?= $s->r_fullname ?></td>
                            <td><?= $s->nama_resep ?></td>
                            <td><?= $s->created_at ?></td>
                            <td><a href="<?= base_url('dokter/detail_resep_obat/' . $s->id_resep) ?>" class="btn btn-info">Detail</a></td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>

        </div>
    </div>
</div>