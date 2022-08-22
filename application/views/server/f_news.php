<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #fff"><a style="color: #fff" href="#"><i class="fa fa-cube"></i> News /</a> Form Input Data News</li>
                </ol>
            </div>
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-pencil"></i> Tambah Data News
                    <a href="<?php echo base_url(); ?>server/news"><button type="button" class="btn btn-sm" style="float:right;background-color:#ffffff;color:#000;line-height:0.8">
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
                                            <label for="exampleInputtextpe">Judul</label>
                                            <input type="hidden" readonly name="c_id" value="<?php echo (isset($news['c_id'])) ? $news['c_id'] : ''; ?>">
                                            <input type="text" class="form-control" name="c_title" value="<?php echo (isset($news['c_title'])) ? $news['c_title'] : ''; ?>" placeholder="Masukkan Judul">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Isi Singkat</label>
                                            <textarea class="form-control" name="c_intro"><?php echo (isset($news['c_intro'])) ? $news['c_intro'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Deskripsi</label>
                                            <textarea class="form-control" rows="20" name="c_desc" id="editor1" required> <?php echo (isset($news['c_desc'])) ? $news['c_desc'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Gambar</label>
                                            <?php if ($mod == "add") { ?>
                                                <input type="file" name="gambar" class="form-control"> &nbsp; <i style="color:red;font-size:12px;">* FROMAT HARUS PNG | GIF | JPG, MAX UKURAN 2MB</i>
                                            <?php } else { ?>
                                                <i class="fa fa-chevron-circle-right"></i> <img src="<?php echo base_url(); ?>image/news/<?php echo $news['c_image']; ?>" class="img-thumbnail" width="80%" height="500">
                                                <br>
                                                <p>&nbsp;</p>
                                                <input type="file" name="gambar" class="form-control"> &nbsp; <i style="color:red;font-size:12px;">* Apabila gambar tidak diubah, kosongkan saja</i>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputtextpe">Status</label>
                                            <select class="form-control" name="c_flag" id="c_flag">
                                                <?php
                                                $arr_flag = array('' => '', '0' => 'Tidak Terbit', '1' => 'Terbit');
                                                foreach ($arr_flag as $idf => $fval) {
                                                    if ($idf == $news['c_flag']) {
                                                        echo '<option value="' . $idf . '" selected>' . $fval . '</option>';
                                                    } else {
                                                        echo '<option value="' . $idf . '">' . $fval . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="referensi">Referensi</label>
                                    <input type="text" class="form-control" name="referensi" id="referensi" value="<?php echo (isset($news['referensi'])) ? $news['referensi'] : ''; ?>">
                                </div>
                                <div class=" row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="youtube">URL YouTube</label>
                                            <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Ex: FM7MFYoylVs" value="<?php echo (isset($news['youtube'])) ? $news['youtube'] : ''; ?>">
                                            <small class=" text-primary">
                                                Ambil bagian Belakang URL Youtube Contoh : <br>
                                                <s>https://youtu.be/</s>FM7MFYoylVs
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Contoh</label>
                                        <img src="<?= base_url('assets/img/tutorial.png') ?>" alt="">
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