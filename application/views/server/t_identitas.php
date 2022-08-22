<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Identitas /</a> Tabel Data</li>
                </ol>
            </div>
        </div>
        <br>

        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px;padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <i class="fa fa-th"></i> Data Identitas
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="table-responsive" style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-striped table-responsive nowrap">
                        <thead>
                            <tr>
                              <th style="background:#ddd;text-align: center;">DESKRIPSI</th>
                              <th style="background:#ddd;text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no  = 0; 
                                if ($identitas): 
                                    foreach ($identitas as $r):
                            echo '
                            <tr>
                                <td><center>'.strtoupper($r).'</center></td>
                                <td>
                                    <center>
                                        <a href="'.site_url('server/identitas/form/edit/' . $r).'" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
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
