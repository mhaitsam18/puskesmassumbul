<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">Detail</span> RESEP OBAT
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

            <div class="resep-obat">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Resep Obat</th>
                            <th scope="col">Bentuk Obat</th>
                            <th scope="col">Dosis</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php foreach ($list_resep_obat as $resep_obat) : ?>
                            <tr>
                                <th scope="row"><?= ++$no ?></th>
                                <td><?= $resep_obat->resep_obat ?></td>
                                <td><?= $resep_obat->bentuk_obat ?></td>
                                <td><?= $resep_obat->dosis ?></td>
                                <td><?= $resep_obat->jumlah ?></td>
                                <td><?= $resep_obat->satuan ?></td>
                                <td><?= $resep_obat->keterangan ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($resep_obat->created_at)) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>