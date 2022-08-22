<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">RESEP</span> OBAT
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Resep Obat</th>
                        <th scope="col">Bentuk Obat</th>
                        <th scope="col">Dosis</th>
                        <!-- <th scope="col">Gambar</th> -->

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; ?>
                    <?php foreach ($resep as $s) : ?>
                        <tr>
                            <th scope="row"><?= ++$no ?></th>
                            <td><?= $s->d_fullname ?></td>
                            <td><?= $s->resep_obat ?></td>
                            <td><?= $s->bentuk_obat ?></td>
                            <td><?= $s->dosis ?></td>
                            <!-- <td><img src="<?= base_url('assets/img/resep-obat/' . $s->gambar) ?>" style="width: 200px; height: 200px;"></td> -->

                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>

        </div>
    </div>
</div>