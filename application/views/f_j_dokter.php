<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Dokter /</a> Form Input Jadwal Dokter</li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Jadwal Dokter
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?= base_url('dokter/update_jadwal') ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <input type="hidden" name="d_id" readonly value="<?php echo $this->session->userdata('idlogin') ?>">

                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Dokter</label>
                                            <input type="text" readonly class="form-control" name="dname" value="<?php echo $dokter['d_fullname']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-11">
                                        <table class="table table-striped">
                                            <tr>
                                                <th style="text-align: center;width: 150px;">HARI</th>
                                                <th style="text-align: center;">JADWAL</th>
                                                <th style="text-align: center;">KETERANGAN</th>
                                            </tr>

                                            <?php
                                            for ($hari = 1; $hari <= 7; $hari++) {

                                                if (isset($jadwal[$hari])) {
                                                    $val = explode('@@', $jadwal[$hari]);
                                                    $jam = $val[0];
                                                    $ket = $val[1];
                                                } else {
                                                    $jam = '';
                                                    $ket = '';
                                                }

                                                echo '<tr>
                                                        <td style="text-align: left;">
                                                            <input type="text" class="form-control text-center" readonly name="jd" value="' . strtoupper(cekhari($hari)) . '">
                                                            
                                                            <input type="hidden" readonly name="d_hari[' . $hari . ']" value="' . $hari . '">
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <input type="text" class="form-control" name="d_jam[' . $hari . ']" value="' . $jam . '">
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <input type="text" class="form-control" name="d_desc[' . $hari . ']" value="' . $ket . '">
                                                        </td>
                                                    </tr>';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br>
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="control-sidebar-bg"></div>
</div>