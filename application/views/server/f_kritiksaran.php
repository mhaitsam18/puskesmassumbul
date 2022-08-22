<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                  <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> Kritik & Saran /</a> Data Kritik & Saran</li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Form Kritik & Saran
                    <a href="<?php echo base_url(); ?>server/kritiksaran"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
                      <i class="fa fa-chevron-circle-left"></i> Kembali
                    </button></a>
                </div>
                <div class="panel-body" id="panel-body">
                    <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="container">
                                <input type="hidden" name="c_id" value="<?php echo $this->uri->segment(5) ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Nama</label>
                                            <input type="text" class="form-control" name="c_name" value="<?php echo (isset($kritiksaran['c_name']))?$kritiksaran['c_name']:''; ?>" placeholder="Masukkan Nama" required>
                                        </div>  
                                    </div>
                                    <div class="col-md-5">                 
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Email</label>
                                            <input type="email" class="form-control" name="c_email" value="<?php echo (isset($kritiksaran['c_email']))?$kritiksaran['c_email']:''; ?>" required>
                                        </div>                    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-11">    
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Kritik & Saran</label>
                                            <textarea class="form-control" name="c_desc" required><?php echo (isset($kritiksaran['c_desc']))?$kritiksaran['c_desc']:''; ?></textarea>
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

 
