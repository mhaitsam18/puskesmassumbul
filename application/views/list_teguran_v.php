<!-- <link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">LIST</span> TEGURAN OPERATOR
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

            <div class="table-responsive mt-5">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Teguran</th>
                            <th scope="col">Balasan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        <?php foreach ($teguran as $p) : ?>
                            <tr>
                                <th scope="row"><?= ++$no ?></th>
                                <td><?= $p->teguran ?></td>
                                <td><?= $p->balasan ?></td>
                                <td><?= $p->created_at ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#balasModal<?= $p->id_teguran ?>">
                                        Balas
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <!-- Modal -->
    <?php foreach ($teguran as $t) :  ?>
        <div class="modal fade" id="balasModal<?= $t->id_teguran ?>" tabindex="-1" aria-labelledby="balasModalLabel<?= $t->id_teguran ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="balasModalLabel<?= $t->id_teguran ?>">Balas Teguran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('dokter/balasTeguran/') ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" value="<?= $t->id_teguran ?>" name="id_teguran">
                            <div class="form-group">
                                <label for="balasan">Balasan</label>
                                <textarea class="form-control" name="balasan" id="balasan"><?= $t->balasan ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<!-- Button trigger modal -->