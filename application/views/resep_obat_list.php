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
                    <span type="button" class="delete-resep-obat" data-id_resep="<?= $resep_obat->id_resep ?>" data-id_resep_obat="<?= $resep_obat->id_resep_obat ?>"><i class="fas fa-trash"></i></span>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>
<a href="<?= base_url('dokter/resep_obat') ?>" class="btn btn-primary float-right">Simpan</a>

<script>
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