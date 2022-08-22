<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">SURAT</span> RUJUKAN
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;?>
                    <?php foreach ($surats as $s): ?>
                    <tr>
                        <th scope="row"><?=++$no?></th>
                        <td><?=$s->d_fullname?></td>
                        <td><?=$s->keterangan_surat?></td>
                        <td>
                            <a href="<?=base_url('assets/img/surat_rujukan/' . $s->file_surat)?>"
                                class="btn btn-primary" target="_blank">Download Surat</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>

        </div>
    </div>
</div>