<div class="content-wrapper">
    <div class="row">

        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <!--  <a href="<?php echo base_url(); ?>server/teguran/form/add"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a> -->
            <!-- <br><br> -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-th"></i> List Data Teguran
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                        <table id="example2" class="table table-bordered table-striped table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="background:#ddd;text-align: center;">NO</th>
                                    <th style="background:#ddd;text-align: center;">NAMA DOKTER</th>
                                    <th style="background:#ddd;text-align: center;">TEGURAN</th>
                                    <th style="background:#ddd;text-align: center;">BALASAN</th>
                                    <th style="background:#ddd;text-align: center;">TANGGAL</th>
                                    <th style="background:#ddd;text-align: center;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no  = 0;
                                if ($teguran) :
                                    foreach ($teguran as $t) : ?>
                                        <tr>
                                            <td align="center"><?= ++$no ?> </td>
                                            <td><?= $t->d_fullname ?></td>
                                            <td><?= $t->teguran ?></td>
                                            <td><?= $t->balasan ?></td>
                                            <td><?= $t->created_at ?></td>
                                            <td>
                                                <a href="<?= base_url('server/teguran/tutup/' . $t->id_teguran) ?>" class="btn btn-secondary">Tutup</a>
                                            </td>
                                        </tr>
                                <?php endforeach;
                                endif;
                                ?>
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