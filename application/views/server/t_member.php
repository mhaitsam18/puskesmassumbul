<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Member /</a> Tabel Data</li>
                </ol>
            </div>
        </div>
        <br>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <i class="fa fa-th"></i> List Data Member
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                    <table id="example1" class="table table-bordered table-striped table-responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                              <th style="background:#ddd;text-align: center;">NO</th>
                              <th style="background:#ddd;text-align: center;">NAMA</th>
                              <th style="background:#ddd;text-align: center;">EMAIL</th>
                              <th style="background:#ddd;text-align: center;">LAST LOGIN</th>
                              <th style="background:#ddd;text-align: center;">VALIDASI</th>
                              <th style="background:#ddd;text-align: center;">STATUS</th>
                              <th style="background:#ddd;text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no  = 0; 
                                if ($member): 
                                    foreach ($member as $members):
                            echo '
                            <tr>
                                <td align="center">'.++$no.'</td>
                                <td width="200px;">'.$members['r_fullname'].'</td>
                                <td>'.$members['r_mail'].'</td>
                                <td  align="center">'.$members['r_last_login'].'</td>';

                            echo '<td align="center">';         
                                if($members['r_validate'] == 'Y'){
                                    echo '<a href="#" class="btn btn-success btn-sm"><span class="fa fa-check"></span></a>';
                                }else{
                                    echo '<a href="#" class="btn btn-danger btn-sm"><span class="fa fa-minus"></span></a>';    
                                }
                            echo '</td>'; 

                            echo '<td align="center">';         
                                if($members['r_status'] == 'ACTIVE'){
                                    echo '<a href="#" class="btn btn-success btn-sm" title="'.$members['r_status'].'"><span class="fa fa-check"></span></a>';
                                }elseif($members['r_status'] == 'SUSPEND'){
                                    echo '<a href="#" class="btn btn-warning btn-sm" title="'.$members['r_status'].'"><span class="fa fa-warning"></span></a>';
                                }else{
                                    echo '<a href="#" class="btn btn-danger btn-sm" title="'.$members['r_status'].'"><span class="fa fa-minus"></span></a>';    
                                }
                            echo '</td>'; 

                            echo '
                                 <td>
                                    <center>
                                        <a href="'.site_url('server/member/form/edit/' . $members['r_id']).'" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>

                                        <a href="javascript:;" data-id="'.$members['r_id'].'" data-toggle="modal" data-target="#modal-hapus-member" class="btn btn-danger btn-sm">
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
<div id="modal-hapus-member" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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