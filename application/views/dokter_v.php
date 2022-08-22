<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
<!-- CONTENT -->
<div id="page-content">
    <div class="section section_team">
        <div class="container">
            <div class="row row-title ">
                <div class="col s12">
                    <div class="section-title row-title-team">
                        <span class="theme-secondary-color">DAFTAR</span> DOKTER
                    </div>
                    <?php if ($this->session->userdata('jenis') == 'D') : ?>
                        <!-- <a href="<?= base_url('dokter/edit_jadwal') ?>" class="btn btn-primary">Edit Jadwal Saya</a> -->
                    <?php endif; ?>
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



            <?php $id_user = $this->session->userdata('is_pasien'); ?>



            <?php
            if ($dokter) :
                $out = '';
                $no = 0;
                $href = '';
                $col_aksi = '';
                $ajukan = '';

                foreach ($dokter as $rs) :

                    if ($id_user) {

                        $href = base_url('dokter/ajukan_temu/' . $rs['d_id']);
                        $col_aksi = '<th class="text-center">Aksi</th>';
                        $ajukan = '<td class="text-center" nowrap><a class="btn btn-primary" href="' . $href . '">Ajukan Pertemuan</a></td>';
                    }

                    $out .= '<div class="box box-info">
																																																                <div class="table-responsive">
																																																                    <div class="box-header">
																																																                        <h3 class="box-title">' . ++$no . '. ' . $rs['d_fullname'] . '</h3>
																																																                        <br>
																																																                        <span style="margin-left:20px;">' . $rs['poli_nama'] . '</span>
																																																                    </div>
																																																                    <div class="box-body no-padding">
																																																                        <table class="table table-bordered table-striped">
																																																                            <tr>
																																																                                <th class="text-center">HARI</th>
																																																                                <th class="text-center">Pukul</th>
																																																                                ' . $col_aksi . '
																																																                            </tr>';

                    $did = $rs['d_id'];
                    if (isset($jadwal[$did])) {
                        foreach ($jadwal[$did] as $hari => $value) {
                            $val = explode('@@', $value);
                            $out .= '<tr>
																																																                                <td class="text-center" nowrap>' . strtoupper(cekhari($hari)) . '</td>
																																																                                <td class="text-center" nowrap>' . $val[0] . '</td>
																																																                                ' . $ajukan . '
																																																                            </tr>';
                        }
                    }

                    $out .= '
																																																                        </table>
																																																                    </div>
																																																                </div>
																																																            </div>';
                endforeach;
                echo $out;
            endif;
            ?>
        </div>
    </div>
</div>