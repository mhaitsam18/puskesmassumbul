<div class="content-wrapper">
    <div id="page-content">
        <div class="section section_team">
            <div class="container">
                <div class="row align-self-center">
                    <div class="col-md-12">
                        <a href="<?= base_url('RekamMedis/create') ?>" class="btn btn-primary">Tambah Rekam Medis</a>
                        <div class="card">
                            <?= $this->session->flashdata('message') ?>
                            <div class="card-header">Data Rekam Medis</div>
                            <div class="card-body">
                                <h4 class="card-title">Data Rekam Medis</h4>
                                <table class="table table-bordered">

                                    <head>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Pasien</th>
                                            <th scope="col">Golongan Darah</th>
                                            <th scope="col">Tekanan Darah</th>
                                            <th scope="col">Suhu Tubuh</th>
                                            <th scope="col">Tinggi Badan</th>
                                            <th scope="col">Berat Badan</th>
                                            <th scope="col">Alergi Makanan</th>
                                            <th scope="col">Alergi Obat</th>
                                            <th scope="col">Keluhan</th>
                                            <th scope="col">Diagnosa</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </head>

                                    <body>
                                        <?php $n = 1; ?>
                                        <?php foreach ($rekam_medis as $rm) : ?>
                                            <tr>
                                                <th scope="row"><?= $n++ ?></th>
                                                <td><?= $rm->r_fullname ?></td>
                                                <td><?= $rm->golongan_darah ?></td>
                                                <td><?= $rm->tekanan_darah ?></td>
                                                <td><?= $rm->suhu_tubuh ?></td>
                                                <td><?= $rm->tinggi_badan ?></td>
                                                <td><?= $rm->berat_badan ?></td>
                                                <td><?= $rm->alergi_makanan ?></td>
                                                <td><?= $rm->alergi_obat ?></td>
                                                <td><?= $rm->keluhan ?></td>
                                                <td><?= $rm->diagnosa ?></td>
                                                <td><?= $rm->keterangan ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </body>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>