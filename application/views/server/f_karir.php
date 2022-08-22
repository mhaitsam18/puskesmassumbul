<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                  <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Karir /</a> Form Karir</li>
                </ol>
            </div>
        </div>

            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Karir
                    <a href="<?php echo base_url(); ?>server/karir"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
                      <i class="fa fa-chevron-circle-left"></i> Kembali
                    </button></a>
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <div class="row">
                                     <div class="col-md-11" >
                                        <div class="form-group">
                                            <input type="hidden" readonly name="c_id" value="<?php echo $karir['c_id']; ?>">
                                            <label for="exampleInputtextpe">Gambar</label>
                                            <?php if ($mod == "add") { ?>
                                                <input type="file" name="gambar" class ="form-control"> &nbsp; <i style="color:red;font-size:12px;">* FROMAT HARUS PNG | GIF | JPG, MAX UKURAN 2MB</i>
                                            <?php } else { ?>
                                                <i class="fa fa-chevron-circle-right"></i> <img src="<?php echo base_url(); ?>image/karir/<?php echo $karir['c_image']; ?>" class="img-thumbnail" width="80%" height="250">
                                                <br><p>&nbsp;</p>
                                                <input type="file" name="gambar" class ="form-control"> &nbsp; <i style="color:red;font-size:12px;">* Apabila gambar tidak diubah, kosongkan saja</i>
                                            <?php } ?>
                                        </div>                    
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <textarea class="form-control" name="c_desc" rows="50" id="editor1"><?php echo(isset($karir['c_desc']))?$karir['c_desc']:'';?></textarea>
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

 
