<div class="content-wrapper">
    <div class="row">
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div>
                <ol class="breadcrumb" style="background-color: #3c8dbc">
                    <li class="active" style="color: #000"><a style="color: #fff" href="#">Dashboard</a></li>
                </ol>
            </div>
        </div>

        <!-- content -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 20px; padding-right: 20px">
            <div class="panel panel-default">
                <div class="panel-body" id="panel-body">
                    <center>
                        <h2>SELAMAT DATANG DI ADMIN PANEL</h2>
                    </center>
                    <hr>

                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Jumlah User</div>
                                <div class="panel-body">
                                    <p><?= $member; ?> Member/Pasien</p>
                                    <p><?= $dokter; ?> Dokter</p>
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-primary " role="alert" style="background-color: #26c142;color: white;">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                    <?php endif ?>

                    <div class="row" style="margin: 10px;">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addMaintenance">Tambah
                            Maintenance</button>

                        <button class="btn btn-primary" data-toggle="modal" data-target="#addTeguran">Tampilkan Teguran
                            Operator</button>
                    </div>
                    <a href="<?= base_url('server/home/print_rekap') ?>" class="btn btn-primary" target="_blank">Print PDF</a>
                    <div class="p-4">
                        <h4>Rekap Data Konsultasi</h4>
                        <table class="table table-hover table-bordered" id="example1">
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
                                        <td><img src="<?= base_url('image/member/' . $k->r_image) ?>" style="width: 100px; overflow: hidden;" alt=""></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- akhir content -->
    </div>
</div>
<div class="control-sidebar-bg"></div>

<?php

$maintenance = $this->db->get('tb_maintenance')->row_array();
$operator = $this->db->get('tb_dokter')->result();

?>

<!-- maintenance -->
<div class="modal fade in" id="addMaintenance">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Maintenance Website</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="<?= base_url('server/home/add_maintenance') ?>" method="POST">
                    <div class="form-group">
                        <label for="maintenance">Pesan Maintenance</label>
                        <textarea cols="20" rows="10" class="form-control" id="maintenance" name="maintenance" required><?= $maintenance['maintenance'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Status Maintenance</label>

                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect01" name="status">
                                <option value="0" <?= $maintenance['status'] == 0 ? 'selected' : '' ?>>Sedang
                                    Berlangsung
                                </option>
                                <option value="1" <?= $maintenance['status'] == 1 ? 'selected' : '' ?>>Selesai
                                </option>
                            </select>
                        </div>

                    </div>




                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- teguran -->
<div class="modal fade in" id="addTeguran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Teguran untuk Operator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="<?= base_url('server/home/add_teguran') ?>" method="POST">

                    <div class="form-group">
                        <label for="nama_lengkap">Pilih Operator</label>

                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect01" name="operator_id">

                                <?php foreach ($operator as $op) : ?>
                                    <option value="<?= $op->d_id ?>"><?= $op->d_fullname ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="teguran">Pesan Teguran</label>
                        <textarea cols="20" rows="10" class="form-control" id="teguran" name="teguran" required></textarea>
                    </div>






                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    const DATA_COUNT = 2;
    const NUMBER_CFG = {
        count: DATA_COUNT,
        min: 0,
        max: 100
    };

    const data = {
        labels: ["Hadir", "Alpa"],
        datasets: [{
            label: '# of Votes',
            data: [<?php
                    echo "$member,$dokter";
                    ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                "Dokter",
                "Pasien"
            ],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo "$dokter,$member"; ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255,99,132,1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>