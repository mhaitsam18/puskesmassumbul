<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">KIRIM</span> SURAT RUJUKAN
                    </div>
                </div>
            </div>

            <?php if ($this->session->flashdata('message')) : ?>
                <div class="section testimonial">
                    <div class="testimonial-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <p align="center"><?php echo $this->session->flashdata('message'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <form action="<?= base_url('dokter/kirim_surat_rujukan') ?>" method="POST" enctype="multipart/form-data">

                <label for="nama_pasien">Pilih Pasien</label>
                <div class="">

                    <select class="custom-select" id="nama_pasien" name="nama_pasien" required>
                        <option selected value="">Pilih pasien</option>
                        <?php foreach ($pasiens as $p) : ?>
                            <option value="<?= $p->r_id ?>"><?= $p->r_fullname ?></option>
                        <?php endforeach ?>

                    </select>
                </div>

                <!-- <div class="form-group">
                    <label for="exampleFormControlTextarea1">Keterangan Surat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        name="keterangan"></textarea>
                </div> -->

                <label for="nama_pasien">Upload Surat Rujukan</label>
                <div class="input-group mb-3">

                    <div class="">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="surat_rujuk">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Kirim Surat Rujukan</button>

            </form>




        </div>
    </div>
</div>