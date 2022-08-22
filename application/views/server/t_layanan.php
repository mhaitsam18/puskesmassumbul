<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Layanan /</a> Tabel Data</li>
                </ol>
            </div>
        </div>
        <br>

        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <a href="<?php echo base_url(); ?>server/layanan/form/add"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a>
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <i class="fa fa-th"></i> List Data Layanan
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-striped table-responsive nowrap">
                        <thead>
                            <tr>
                              <th style="background:#ddd;text-align: center;">NO</th>
                              <th style="background:#ddd;text-align: center;min-width: 250px;">LAYANAN</th>
                              <th style="background:#ddd;text-align: center;width: 100px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no  = 0; 
                                if ($layanan): 
                                    foreach ($layanan as $layanans):
                            echo '
                            <tr>
                                <td align="center">'.++$no.'</td>
                                <td>'.substr($layanans['c_name'],0,255).'</td>
                                <td>
                                    <center>
                                        <a href="'.site_url('server/layanan/form/edit/' . $layanans['c_id']).'" class="btn btn-primary btn-sm" title="Edit">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                                        
                                        <a href="javascript:;" data-id="'.$layanans['c_id'].'" data-toggle="modal" data-target="#modal-hapus-layanan" class="btn btn-danger btn-sm" title="Hapus">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
<div id="modal-hapus-layanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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