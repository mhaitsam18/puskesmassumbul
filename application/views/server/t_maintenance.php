<div class="content-wrapper">
    <div class="row">

        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <!--  <a href="<?php echo base_url(); ?>server/teguran/form/add"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a> -->
            <!-- <br><br> -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-th"></i> Histori Teguran
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                        <table id="example2" class="table table-bordered table-striped table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="background:#ddd;text-align: center;">NO</th>
                                    <th style="background:#ddd;text-align: center;">STATUS</th>
                                    <th style="background:#ddd;text-align: center;">TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no  = 0;
                                if ($teguran) :
                                    foreach ($teguran as $t) : ?>
                                        <tr>
                                            <td align="center"><?= ++$no ?> </td>
                                            <td><?= $t->status ?></td>
                                            <td><?= date('d-m-Y H:i:s', strtotime($t->created_at)) ?></td>
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