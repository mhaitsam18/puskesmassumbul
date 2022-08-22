<!-- CONTENT -->
<div id="page-content">
  <div class="section section_team">
    <div class="container">
      <div class="row row-title ">
        <div class="col s12">
          <div class="section-title row-title-team">
            <span class="theme-secondary-color">PROFILE</span>
          </div>
        </div>
      </div>
      <div class="row row-team">
        <div class="col s12">
          <div class="wrap-team">
            <div class="wt-left">
              <div class="wt-photo">
                <img src="<?php echo base_url(); ?>image/dokter/<?php echo $users['d_image']; ?>" alt="profile-img">
              </div>
            </div>
            <div class="wt-right">
              <div class="wtr-name">Nama : <?php echo $users['d_fullname']; ?></div>
              <div class="wtr-title">
                Email : <?php echo $users['d_mail']; ?>
              </div>
              <div class="wtr-info">Tanggal Lahir : <?php echo $users['d_bday']; ?></div>
              <div class="wtr-info">Jenis Kelamin : <?php echo $users['d_gender']; ?></div>
              <br>
              <a href="<?php echo base_url() ?>myprofile<?php echo $this->session->userdata('linkto') ?>/edit" class="btn"><i class="fa fa-edit"></i></a>
              <a href="<?php echo base_url() ?>myprofile<?php echo $this->session->userdata('linkto') ?>/changepwd" class="btn"><i class="fa fa-lock"></i></a>
              <a href="<?php echo base_url() ?>konsultasidokter" class="btn"><i class="fa fa-comment"></i></a>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <a href="<?= base_url('myprofiledokter/print_rekap') ?>" class="btn btn-primary" target="_blank">Print PDF</a>
      <h4>Rekap Data Konsultasi</h4>

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
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>