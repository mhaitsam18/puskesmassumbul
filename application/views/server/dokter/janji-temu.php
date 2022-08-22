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
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Status Perjanjian</th>
                                    <th scope="col">Waktu Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0 ?>
                                <?php foreach ($list_janji_temu as $janji_temu) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$no ?></th>
                                        <td><?= $janji_temu->d_fullname ?></td>
                                        <td><?= $janji_temu->r_fullname ?></td>
                                        <td>
                                            <?php if (is_null($janji_temu->status_pengajuan)) : ?>
                                                Anda Belum melakukan pengajuan
                                            <?php elseif ($janji_temu->status_pengajuan == 0) : ?>
                                                Sedang proses mengajukan janji temu dengan dokter
                                            <?php elseif ($janji_temu->status_pengajuan == 1) : ?>
                                                Pengajuan janji diterima
                                            <?php elseif ($janji_temu->status_pengajuan == 2) : ?>
                                                Pengajuan janji ditolak
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?= date('j F Y H:i:s', strtotime($janji_temu->created_at)) ?>
                                        </td>

                                    </tr>
                                <?php endforeach ?>

                            </tbody>
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