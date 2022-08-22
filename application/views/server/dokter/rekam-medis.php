<div class="content-wrapper">
    <div class="row">
        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px; padding-top:20px;">
            <!-- <br><br> -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-th"></i> <?= $judul ?>
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                        <table class="table table-hover">

                            <head>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Dokter</th>
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
                                <?php foreach ($list_rekam_medis as $rekam_medis) : ?>
                                    <tr>
                                        <th scope="row"><?= $n++ ?></th>
                                        <td><?= $rekam_medis->d_fullname ?></td>
                                        <td><?= $rekam_medis->r_fullname ?></td>
                                        <td><?= $rekam_medis->golongan_darah ?></td>
                                        <td><?= $rekam_medis->tekanan_darah ?></td>
                                        <td><?= $rekam_medis->suhu_tubuh ?></td>
                                        <td><?= $rekam_medis->tinggi_badan ?></td>
                                        <td><?= $rekam_medis->berat_badan ?></td>
                                        <td><?= $rekam_medis->alergi_makanan ?></td>
                                        <td><?= $rekam_medis->alergi_obat ?></td>
                                        <td><?= $rekam_medis->keluhan ?></td>
                                        <td><?= $rekam_medis->diagnosa ?></td>
                                        <td><?= $rekam_medis->keterangan ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir content -->
    </div>
    <div class=" control-sidebar-bg">
    </div>
</div>