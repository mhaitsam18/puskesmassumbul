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
                <div class="form-group">
                    <label for="nama_pasien">Nama Pasien</label>
                    <input type="text" class="form-control" value="<?= $pasien->r_fullname ?>" readonly>
                    <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $pasien->r_id ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_pasien">Nama Resep</label>
                    <input type="text" class="form-control" value="<?= $resep->nama_resep ?>" readonly>
                    <input type="hidden" name="id_resep" id="id_resep" value="<?= $resep->id_resep ?>">
                </div>
                <div class="form-group">
                    <label for="bentuk_obat">Pilih Bentuk Obat</label>
                    <select class="form-control" id="bentuk_obat" name="bentuk_obat" required>
                        <option selected value="">Pilih Bentuk</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Kapsul">Kapsul</option>
                        <option value="Kaplet">Kaplet</option>
                        <option value="Pil">Pil</option>
                        <option value="Bubuk">Bubuk</option>
                        <option value="Sirup">Sirup</option>
                        <option value="Suppositoria Rektal">Suppositoria Rektal</option>
                        <option value="Suppositoria Vagina">Suppositoria Vagina</option>
                        <option value="Suppositoria Uretra">Suppositoria Uretra</option>
                        <option value="Suntikan">Suntikan</option>
                        <option value="Salep">Salep</option>
                        <option value="Krim">Krim</option>
                        <option value="Bedak">Bedak</option>
                        <option value="Gel">Gel</option>
                        <option value="Lation">Lation</option>
                        <option value="Tetes Mata">Tetes Mata</option>
                        <option value="Tetes Telinga">Tetes Telinga</option>
                        <option value="Tetes Hidung">Tetes Hidung</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dosis">Pilih Dosis</label>
                    <select class="form-control" id="dosis" name="dosis" required>
                        <option selected value="">Pilih Dosis</option>
                        <option value="Dosis Terapi">Dosis Terapi</option>
                        <option value="Dosis Minimum">Dosis Minimum</option>
                        <option value="Dosis Maksimum">Dosis Maksimum</option>
                        <option value="Dosis Toksik">Dosis Toksik</option>
                        <option value="Dosis Letal 50">Dosis Letal 50</option>
                        <option value="Dosis Letal 100">Dosis Letal 100</option>
                        <option value="Oral">Oral</option>
                        <option value="Parenteral">Parenteral</option>
                        <option value="Topikal">Topikal</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="resep_obat">Resep Obat</label>
                    <input type="text" class="form-control" id="resep_obat" name="resep_obat">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" id="satuan" name="satuan">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input class="form-control" id="keterangan" name="keterangan">
                </div>
                <!-- <div class="form-group">
                    <label for="">Gamabar</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                </div> -->


                <button class="btn btn-primary insert-resep-obat" type="button">Tambah</button>
            </form>
            <div class="resep-obat">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Resep Obat</th>
                            <th scope="col">Bentuk Obat</th>
                            <th scope="col">Dosis</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal dibuat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php foreach ($list_resep_obat as $resep_obat) : ?>
                            <tr>
                                <th scope="row"><?= ++$no ?></th>
                                <td><?= $resep_obat->resep_obat ?></td>
                                <td><?= $resep_obat->bentuk_obat ?></td>
                                <td><?= $resep_obat->dosis ?></td>
                                <td><?= $resep_obat->jumlah ?></td>
                                <td><?= $resep_obat->satuan ?></td>
                                <td><?= $resep_obat->keterangan ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($resep_obat->created_at)) ?></td>
                                <td>
                                    <button type="button" class="delete-resep-obat" data-id_resep="<?= $resep_obat->id_resep ?>" data-id_resep_obat="<?= $resep_obat->id_resep_obat ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="<?= base_url('dokter/resep_obat') ?>" class="btn btn-primary float-right">Simpan</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.insert-resep-obat').on('click', function(e) {
        const id_pasien = $('#id_pasien').val();
        const id_resep = $('#id_resep').val();
        const bentuk_obat = $('#bentuk_obat').val();
        const dosis = $('#dosis').val();
        const jumlah = $('#jumlah').val();
        const satuan = $('#satuan').val();
        const resep_obat = $('#resep_obat').val();
        const keterangan = $('#keterangan').val();
        $.ajax({
            url: "<?= base_url('dokter/add_jquery_resep_obat') ?>",
            type: "post",
            data: {
                'id_pasien': id_pasien,
                'id_resep': id_resep,
                'bentuk_obat': bentuk_obat,
                'dosis': dosis,
                'jumlah': jumlah,
                'satuan': satuan,
                'resep_obat': resep_obat,
                'keterangan': keterangan,
            },
            success: function(data) {
                $('.resep-obat').html(data);
                $('#bentuk_obat').val("");
                $('#dosis').val("");
                $('#jumlah').val("");
                $('#satuan').val("");
                $('#resep_obat').val("");
                $('#keterangan').val("");
            }
        });
    });
    $('.delete-resep-obat').on('click', function(e) {
        const id_resep_obat = $(this).data('id_resep_obat');
        const id_resep = $(this).data('id_resep');
        $.ajax({
            url: "<?= base_url('dokter/hapus_resep_obat_jquery') ?>",
            type: "post",
            data: {
                'id_resep': id_resep,
                'id_resep_obat': id_resep_obat,
            },
            success: function(data) {
                $('.resep-obat').html(data);
            }
        });
    });
</script>