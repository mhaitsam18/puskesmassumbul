<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">BALAS</span> TEGURAN OPERATOR
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

            <form action="<?= base_url('dokter/balasTeguran/') ?>">
                <input type="hidden" value="<?= $teguran->id_teguran ?>">
                <div class="form-group">
                    <label for="balasan">Balasan</label>
                    <textarea class="form-control" name="balasan" id="balasan"><?= $teguran->balasan ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>

        </div>
    </div>