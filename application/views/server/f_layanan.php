<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                  <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Layanan /</a> Form Input Data Layanan</li>
                </ol>
            </div>
        </div>

            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Tambah Data Layanan
                    <a href="<?php echo base_url(); ?>server/layanan"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
                      <i class="fa fa-chevron-circle-left"></i> Kembali
                    </button></a>
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Nama</label>
                                            <input type="hidden" readonly name="c_id" value="<?php echo (isset($layanan['c_id']))?$layanan['c_id']:''; ?>">
                                            <input type="text" class="form-control" name="c_name" value="<?php echo (isset($layanan['c_name']))?$layanan['c_name']:''; ?>" placeholder="Masukkan Nama">
                                        </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11" >
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Deskripsi</label>
                                            <textarea class="form-control" rows="20" name="c_desc" id="editor1" required> <?php echo (isset($layanan['c_desc']))?$layanan['c_desc']:''; ?></textarea>
                                        </div>                    
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-11" >
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Gambar</label>
                                            <?php if ($mod == "add") { ?>
                                                <input type="file" name="gambar" class ="form-control"> &nbsp; <i style="color:red;font-size:12px;">* FROMAT HARUS PNG | JPG, MAX UKURAN 2MB</i>
                                            <?php } else { ?>
                                                <i class="fa fa-chevron-circle-right"></i> <img src="<?php echo base_url(); ?>image/layanan/<?php echo $layanan['c_image']; ?>" class="img-thumbnail" width="80%" height="500">
                                                <br><p>&nbsp;</p>
                                                <input type="file" name="gambar" class ="form-control"> &nbsp; <i style="color:red;font-size:12px;">* Apabila gambar tidak diubah, kosongkan saja</i>
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

 
