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
                <img src="<?php echo base_url();?>image/member/<?php echo $users['r_image'];?>" alt="profile-img">
              </div>
            </div>
            <div class="wt-right">
              <div class="wtr-name">Nama : <?php echo $users['r_fullname'];?></div>
              <div class="wtr-title">
                Email : <?php echo $users['r_mail'];?>
                <?php
                  if($users['r_validate'] == 'Y'){
                    echo '<i class="fa fa-check" style="color:green;" title="Sudah Verifikasi"></i>';
                  }else{
                    echo '<i class="fa fa-info" style="color:red;" title="Belum Verifikasi"></i>';
                  }
                ?>
              </div>
              <div class="wtr-info">Tanggal Lahir : <?php echo $users['r_bday'];?></div>
              <div class="wtr-info">Jenis Kelamin : <?php echo $users['r_gender'];?></div>
              <br>
              <a href="<?php echo base_url()?>myprofile/edit" class="btn"><i class="fa fa-edit"></i></a>
              <a href="<?php echo base_url()?>myprofile/changepwd" class="btn"><i class="fa fa-lock"></i></a>
              <a href="<?php echo base_url()?>konsultasi" class="btn"><i class="fa fa-comment"></i></a>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
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
