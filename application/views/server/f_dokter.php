<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Dokter /</a> Form Input Data Dokter</li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Tambah Data Dokter
                    <a href="<?php echo base_url(); ?>server/dokter"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
                            <i class="fa fa-chevron-circle-left"></i> Kembali
                        </button></a>
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <input type="hidden" name="d_id" value="<?php echo $this->uri->segment(5) ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="d_fullname" value="<?php echo (isset($dokter['d_fullname'])) ? $dokter['d_fullname'] : ''; ?>" placeholder="Masukkan Nama" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="d_bday" value="<?php echo (isset($dokter['d_bday'])) ? $dokter['d_bday'] : ''; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Jenis Kelamin</label>
                                            <select class="form-control" name="d_gender" required>
                                                <?php
                                                $arr_jk = array('', 'LAKI - LAKI', 'PEREMPUAN');
                                                $out = '';
                                                foreach ($arr_jk as $r) {
                                                    if ($dokter['d_gender'] == $r) {
                                                        $out .= '<option value="' . $r . '" selected>' . $r . '</option>';
                                                    } else {
                                                        $out .= '<option value="' . $r . '">' . $r . '</option>';
                                                    }
                                                }
                                                echo $out;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Poli</label>
                                            <select class="form-control" name="d_poli" required>
                                                <?php
                                                $out = '<option></option>';
                                                if ($poli) :
                                                    foreach ($poli as $polis) :
                                                        if ($polis['poli_kode'] == $dokter['d_poli']) {
                                                            $out .= '<option value="' . $polis['poli_kode'] . '" selected>' . $polis['poli_nama'] . '</option>';
                                                        } else {
                                                            $out .= '<option value="' . $polis['poli_kode'] . '">' . $polis['poli_nama'] . '</option>';
                                                        }
                                                    endforeach;
                                                endif;
                                                echo $out;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Phone</label>
                                            <input type="text" class="form-control" name="d_phone" value="<?php echo (isset($dokter['d_phone'])) ? $dokter['d_phone'] : ''; ?>" placeholder="Masukkan Phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Email</label>
                                            <input type="email" class="form-control" name="d_mail" value="<?php echo (isset($dokter['d_mail'])) ? $dokter['d_mail'] : ''; ?>" placeholder="Masukkan Email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Password</label>
                                            <input type="password" class="form-control" name="d_pass" placeholder="Masukkan Password">
                                            <?php if ($mod == "edit") { ?>
                                                &nbsp; <i style="color:red;font-size:12px;">* Biarkan kosong jika password tidak diubah.</i>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Status</label>
                                            <select class="form-control" name="d_status" required>
                                                <?php
                                                $arrsts = array('' => '', 'ACTIVE', 'NOT ACTIVE');
                                                $out = '';
                                                foreach ($arrsts as $r) {
                                                    if ($r == $dokter['d_status']) {
                                                        $out .= '<option value="' . $r . '" selected>' . $r . '</option>';
                                                    } else {
                                                        $out .= '<option value="' . $r . '">' . $r . '</option>';
                                                    }
                                                }
                                                echo $out;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Moto</label>
                                            <textarea class="form-control" name="d_moto" placeholder="Masukkan Moto" required><?php echo (isset($dokter['d_moto'])) ? $dokter['d_moto'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Gambar</label>
                                            <?php if ($mod == "add") { ?>
                                                <input type="file" name="gambar" class="form-control"> &nbsp; <i style="color:red;font-size:12px;">* FROMAT HARUS PNG | GIF | JPG, MAX UKURAN 2MB</i>
                                            <?php } else { ?>
                                                <input type="file" name="gambar" class="form-control"> &nbsp; <i style="color:red;font-size:12px;">* Apabila gambar tidak diubah, kosongkan saja</i>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <?php if ($mod == "edit") { ?>
                                                <i class="fa fa-chevron-circle-right"></i> <img src="<?php echo base_url(); ?>image/dokter/<?php echo $dokter['d_image']; ?>" class="img-thumbnail" width="250" height="250">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <br>
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $submit; ?> </button>
                                    <button type="reset" name="reset" class="btn btn-md btn-default"><i class="fa fa-refresh"></i> Reset</a>
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