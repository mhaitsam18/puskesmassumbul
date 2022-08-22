<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                  <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Member /</a> Form Input Data Member</li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Tambah Data Member
                    <a href="<?php echo base_url(); ?>server/member"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
                      <i class="fa fa-chevron-circle-left"></i> Kembali
                    </button></a>
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <input type="hidden" name="r_id" value="<?php echo $this->uri->segment(5) ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="r_fullname" value="<?php echo (isset($member['r_fullname']))?$member['r_fullname']:''; ?>" placeholder="Masukkan Nama" required>
                                        </div>  
                                    </div>
                                    <div class="col-md-5">                 
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="r_bday" value="<?php echo (isset($member['r_bday']))?$member['r_bday']:''; ?>" required>
                                        </div>                    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Email</label>
                                            <input type="email" class="form-control" name="r_mail" value="<?php echo (isset($member['r_mail']))?$member['r_mail']:''; ?>" placeholder="Masukkan Email" required>
                                        </div> 
                                    </div>
                                    <div class="col-md-5">                   
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Validasi Email</label>
                                            <select class="form-control" name="r_validate" required>
                                                <?php 
                                                    $arrvl = array('' => '', 'Y' => 'YA', 'N' => 'TIDAK');
                                                    $out = '';
                                                    foreach ($arrvl as $rkd => $rval) {
                                                        if ($rkd == $member['r_validate']) { 
                                                            $out .= '<option value="'.$rkd.'" selected>'.$rval.'</option>';
                                                        }else{
                                                            $out .= '<option value="'.$rkd.'">'.$rval.'</option>';
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
                                            <label for="exampleInputtextpe">Jenis Kelamin</label>
                                            <select class="form-control" name="r_gender" required>
                                                <?php 
                                                    $arrjk = array('', 'LAKI - LAKI', 'PEREMPUAN');
                                                    $out = '';
                                                    foreach ($arrjk as $r) {
                                                        if ($r == $member['r_gender']) { 
                                                            $out .= '<option value="'.$r.'" selected>'.$r.'</option>';
                                                        }else{
                                                            $out .= '<option value="'.$r.'">'.$r.'</option>';
                                                        }
                                                    }
                                                    echo $out;
                                                ?>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-5">                   
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Status</label>
                                            <select class="form-control" name="r_status" required>
                                                <?php 
                                                    $arrsts = array('' => '', 'ACTIVE', 'NOT ACTIVE', 'SUSPEND');
                                                    $out = '';
                                                    foreach ($arrsts as $r) {
                                                        if ($r == $member['r_status']) { 
                                                            $out .= '<option value="'.$r.'" selected>'.$r.'</option>';
                                                        }else{
                                                            $out .= '<option value="'.$r.'">'.$r.'</option>';
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
                                            <label for="exampleInputtextpe">Password</label>
                                            <input type="password" class="form-control" name="r_pass"> &nbsp; <i style="color:red;font-size:12px;">* Apabila password tidak diubah, kosongkan saja</i>
                                        </div>                
                                    </div>
                                     <div class="col-md-5" >
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Gambar</label>
                                            <input type="file" name="gambar" class ="form-control"> &nbsp; <i style="color:red;font-size:12px;">* Apabila gambar tidak diubah, kosongkan saja</i>
                                        </div>                    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <?php if ($mod == "edit") { ?>
                                                <i class="fa fa-chevron-circle-right"></i> <img src="<?php echo base_url(); ?>image/member/<?php echo $member['r_image']; ?>" class="img-thumbnail" width="250" height="250" alt="profile-img">
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

 
