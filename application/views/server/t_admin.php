<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Administrator /</a> Tabel Data</li>
                </ol>
            </div>
        </div>
        <br>

        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <a href="<?php echo base_url(); ?>server/admin/form/add"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a>
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <i class="fa fa-th"></i> List Data Administrator
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-striped table-responsive nowrap">
                        <thead>
                            <tr>
                              <th style="background:#ddd;text-align: center;">NO</th>
                              <th style="background:#ddd;text-align: center;">NAMA</th>
                              <th style="background:#ddd;text-align: center;">EMAIL</th>
                              <th style="background:#ddd;text-align: center;">NO HP</th>
                              <th style="background:#ddd;text-align: center;">USERNAME</th>
                              <th style="background:#ddd;text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no  = 0; 
                                if ($admin): 
                                    foreach ($admin as $admins):
                            echo '
                            <tr>
                                <td align="center">'.++$no.'</td>
                                <td>'.$admins['nama_lengkap'].'</td>
                                <td>'.$admins['email'].'</td>
                                <td>'.$admins['no_hp'].'</td>
                                <td>'.$admins['username'].'</td>
                                <td>
                                    <center>
                                        <a href="'.site_url('server/admin/form/edit/' . $admins['id_login']).'" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>

                                        
                                        <a href="javascript:;" data-id="'.$admins['id_login'].'" data-toggle="modal" data-target="#modal-hapus-admin" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
                                    </center>
                                </td>
                            </tr>
                            ';
                            endforeach;
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
    <div class="control-sidebar-bg"></div>
</div>

<!-- modal konfirmasi-->
<div id="modal-hapus-admin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <span class="glyphicon glyphicon-exclamation-sign"></span> Konfirmasi</h4>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-info" id="hapus-true-data"><i class="glyphicon glyphicon-ok"></i> Ya</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tidak</button>
            </div>
        </div>
    </div>
</div>