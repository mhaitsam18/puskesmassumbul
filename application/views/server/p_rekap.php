<?php include "assets/fungsi.php"; ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rekap Pasien</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/server/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <h4>Rekap Data Konsultasi</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Jumlah User Pasien</div>
                        <div class="panel-body">
                            <p><?= $this->db->get('tb_member')->num_rows(); ?> Orang</p>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pesan</th>
                        <th scope="col">Waktu Konsultasi</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($konsultasi as $k) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $k->r_fullname ?></td>
                            <td><?= $k->r_mail ?></td>
                            <td><?= $k->r_bday ?></td>
                            <td><?= $k->r_gender ?></td>
                            <td><?= $k->c_value ?></td>
                            <td><?= $k->created_on ?></td>
                            <td><img src="<?= base_url('image/member/' . $k->r_image) ?>" style="width: 100px; height: 100px;" alt=""></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>