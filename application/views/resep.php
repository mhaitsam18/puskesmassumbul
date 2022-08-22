<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">KIRIM</span> RESEP OBAT
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

            <form action="<?= base_url('dokter/add_resep') ?>" method="POST" enctype="multipart/form-data">

                <label for="id_pasien">Pilih Pasien</label>
                <div class="">

                    <select class="custom-select" id="id_pasien" name="id_pasien" required>
                        <option selected value="">Pilih pasien</option>
                        <?php foreach ($pasiens as $p) : ?>
                            <option value="<?= $p->r_id ?>"><?= $p->r_fullname ?></option>
                        <?php endforeach ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_resep">Nama Resep</label>
                    <input type="text" name="nama_resep" id="id_resep" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Buat Resep</button>
            </form>
        </div>
    </div>
</div>