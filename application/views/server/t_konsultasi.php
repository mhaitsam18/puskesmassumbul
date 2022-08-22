<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> konsultasi /</a> Tabel Data</li>
                </ol>
            </div>
        </div>
        <br>

        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <i class="fa fa-th"></i> List Data konsultasi
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-striped table-responsive nowrap">
                        <thead>
                            <tr>
                              <th style="background:#ddd;text-align: center;">NO</th>
                              <th style="background:#ddd;text-align: center;">DARI</th>
                              <th style="background:#ddd;text-align: center;">KEPADA</th>
                              <th style="background:#ddd;text-align: center;">PESAN</th>
                              <th style="background:#ddd;text-align: center;width: 100px;">TANGGAL</th>
                              <th style="background:#ddd;text-align: center;width: 100px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no  = 0; 
                                if ($konsul): 
                                    foreach ($konsul as $r):

                                        if($r['created_by'] == 'M'){
                                            $dari = $r['r_fullname'];
                                            $kpd  = $r['d_fullname'];
                                        }else{
                                            $dari = $r['d_fullname'];
                                            $kpd  = $r['r_fullname'];

                                        }
                            echo '
                            <tr>
                                <td align="center">'.++$no.'</td>
                                <td>'.$dari.'</td>
                                <td>'.$kpd.'</td>
                                <td>'.substr($r['c_value'],0,40).'</td>
                                <td align="center">'.$r['created_on'].'</td>
                                <td>
                                    <center>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm" title="View" onclick="view(\''.$r['c_id'].'\')">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </a>

                                        <a href="javascript:;" data-id="'.$r['c_id'].'" data-toggle="modal" data-target="#modal-hapus-konsultasi" class="btn btn-danger btn-sm" title="Hapus">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
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
<div id="modal-hapus-konsultasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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


<!-- modal chat-->
<div id="modal-chat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <span class="fa fa-comments"></span> Chat</h4>
            </div>
            <div class="modal-body">
                <p id="isichat" align="justify"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function view($id){
    $.post('<?php echo base_url()?>server/konsultasi/view',{id:$id},function(result){
      $('#isichat').html(result.content);
      $('#modal-chat').modal('show');
    },'json');
}
</script>
