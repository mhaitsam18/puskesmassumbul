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
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Nama Resep</th>
                                    <th scope="col">Tanggal dibuat</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php foreach ($list_resep as $resep) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$no ?></th>
                                        <td><?= $resep->d_fullname ?></td>
                                        <td><?= $resep->r_fullname ?></td>
                                        <td><?= $resep->nama_resep ?></td>
                                        <td><?= $resep->created_at ?></td>
                                        <td><a href="<?= base_url('server/dokter/resep_obat/' . $resep->id_resep) ?>" class="btn btn-info">Detail</a></td>

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