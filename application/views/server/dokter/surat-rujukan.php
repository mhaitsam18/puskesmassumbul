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
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php foreach ($list_surat_rujukan as $surat_rujukan) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$no ?></th>
                                        <td><?= $surat_rujukan->d_fullname ?></td>
                                        <td><?= $surat_rujukan->r_fullname ?></td>
                                        <td>
                                            <a href="<?= base_url('assets/img/surat_rujukan/' . $surat_rujukan->file_surat) ?>" class="btn btn-primary" target="_blank">Download Surat</a>
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