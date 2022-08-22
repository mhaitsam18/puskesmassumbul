<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                  <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Administrator /</a> Form Input Data Administrator</li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Tambah Data Administrator
                    <a href="<?php echo base_url(); ?>server/useradmin"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
                      <i class="fa fa-chevron-circle-left"></i> Kembali
                    </button></a>
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Nama</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?php echo (isset($useradmin['nama_lengkap']))?$useradmin['nama_lengkap']:''; ?>" placeholder="Masukkan Nama" required>
                                        </div>  
                                    </div>
                                    <div class="col-md-5">                 
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo (isset($useradmin['username']))?$useradmin['username']:''; ?>" placeholder="Masukkan Username" required>
                                        </div>                    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">No Hp</label>
                                            <input type="text" class="form-control" name="no_hp" value="<?php echo (isset($useradmin['no_hp']))?$useradmin['no_hp']:''; ?>" placeholder="Masukkan No Hp" required>
                                        </div> 
                                    </div>
                                    <div class="col-md-5">                   
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo (isset($useradmin['email']))?$useradmin['email']:''; ?>" placeholder="Masukkan Email" required>
                                        </div>                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Password</label>
                                            <input type="password" class="form-control" name="password">
                                            <?php
                                                if($mod == 'edit'){
                                                    echo '<span style="color:red;">*Biarkan kosong jika tidak merubah password</span>';
                                                }
                                            ?>
                                        </div>  
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Role</label>
                                            <select class="form-control" name="role" required><?php echo $cmbrole?></select>
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Status</label>
                                            <select class="form-control" name="active" required><?php echo $cmbstatus?></select>
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

 
