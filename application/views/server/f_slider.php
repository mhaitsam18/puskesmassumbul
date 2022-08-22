<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                  <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Slider /</a> Form Input Slider</li>
                </ol>
            </div>
        </div>

            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Tambah Data Slider
                    <a href="<?php echo base_url(); ?>server/slider"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
                      <i class="fa fa-chevron-circle-left"></i> Kembali
                    </button></a>
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <?php if ($mod == "add") { ?>
                                <div class="row">
                                    <div class="col-md-5" >
                                        <label for="exampleInputtextpe">Gambar</label>
                                            <input type="file" name="gambar" class ="form-control"> &nbsp; <i style="color:red;font-size:12px;">* FROMAT HARUS PNG | JPG, MAX UKURAN 2MB (W : 700px , H : 394px)</i>
                                    </div>
                                </div>
                                <?php }?>

                                <div class="row">
                                    <div class="col-md-2" >
                                    </div>
                                    <div class="col-md-8" >
                                        <div class="form-group">
                                            <?php if ($mod == "edit") { ?>
                                                <img src="<?php echo base_url(); ?>image/slider/<?php echo $slider['slid_image']; ?>" class="img-thumbnail" width="100%" height="auto">
                                            <?php }?>
                                        </div>                    
                                    </div>
                                    <div class="col-md-2" >
                                    </div>
                                </div>

                                <?php if ($mod == "add") { ?>
                                <div class="form-group">
                                    <br>
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $submit; ?> </button>
                                    <button type="reset" name="reset" class="btn btn-md btn-default"><i class="fa fa-refresh"></i> Reset</a>
                                </div>
                                <?php }?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="control-sidebar-bg"></div>
</div>

 
