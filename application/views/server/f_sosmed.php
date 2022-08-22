<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                  <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Sosial Media /</a> Form Input Data Sosial Media</li>
                </ol>
            </div>
        </div>

            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Tambah Data Sosial Media
                    <a href="<?php echo base_url(); ?>server/sosmed"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
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
                                            <label for="exampleInputtextpe">Akun</label>
                                            <input type="hidden" readonly name="sm_id" value="<?php echo (isset($sosmed['sm_id']))?$sosmed['sm_id']:''; ?>">
                                            <input type="text" class="form-control" name="sm_desc" value="<?php echo (isset($sosmed['sm_desc']))?$sosmed['sm_desc']:''; ?>" disabled>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11"> 
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Url</label>
                                            <input type="text" class="form-control" name="sm_value" value="<?php echo (isset($sosmed['sm_value']))?$sosmed['sm_value']:''; ?>" placeHolder="Masukkan URL">
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

 
