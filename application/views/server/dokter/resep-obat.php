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
                                    <th scope="col">Resep Obat</th>
                                    <th scope="col">Bentuk Obat</th>
                                    <th scope="col">Dosis</th>
                                    <th scope="col">Keterangan</th>
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
                                        <td><?= $resep_obat->keterangan ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir content -->
</div>
<div class=" control-sidebar-bg">
</div>
</div>