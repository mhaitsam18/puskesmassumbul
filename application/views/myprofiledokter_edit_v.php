<?php
function gender($n){
  $qry = array('LAKI - LAKI', 'PEREMPUAN');
  $out = '';
  foreach ($qry as $r) {
    if($n == $r){
      $out .= '<input type="radio" name="d_gender" style="position: inherit;opacity: 1;pointer-events: auto;" value="'.$r.'" checked> '.$r.'&nbsp;&nbsp;&nbsp;&nbsp;';
    }else{
      $out .= '<input type="radio" name="d_gender" style="position: inherit;opacity: 1;pointer-events: auto;" value="'.$r.'"> '.$r.'&nbsp;&nbsp;&nbsp;&nbsp;';
    }
  }
  return $out;
}
?>
<style type="text/css">
.sty-radio{
  position: inherit;
  opacity: 1;
  pointer-events: auto;
}
</style>
<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="section-title"><span class="theme-secondary-color">EDIT</span> PROFILE</div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col s2"></div>
  <div class="col s8">
    <div class="comment-wrap">
      <div class="c-form">
        <?php if ($this->session->flashdata('error')): ?>
          <div class="section testimonial">
            <div class="testimonial-wrap">
              <div class="container">
                <div class="row">
                  <div class="col s12">
                    <p align="center"><?php echo $this->session->flashdata('error'); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
            
        <?php endif;?>
        <form action="<?php echo base_url() ?>myprofile<?php echo $this->session->userdata('linkto');?>/editsave" enctype="multipart/form-data" method="POST">

          <label for="d_fullname">Nama Lengkap :</label>
          <div class="input-field">
            <input id="d_fullname" name="d_fullname" type="text" class="validate" required placeholder="Nama Lengkap" value="<?php echo $users['d_fullname']?>">
          </div>

          <label for="d_mail">Email :</label>
          <div class="input-field">
            <input id="d_mail" name="d_mail" type="email" class="validate" placeholder="Email" required value="<?php echo $users['d_mail']?>">
          </div>

          <label for="d_bday">Tanggal Lahir :</label>
          <div class="input-field">
            <input id="d_bday" name="d_bday" type="date" class="validate" required value="<?php echo $users['d_bday']?>">
          </div>

          <label for="d_gender">Jenis Kelamin :</label>
          <div class="input-field">
            <?php echo gender($users['d_gender']);?>
          </div>
          <br>
          <div class="li-profile-info" style="min-height: 100px;">
            <img src="<?php echo base_url()?>image/dokter/<?php echo $users['d_image'];?>" alt="profile-img" style="width: 200px;height: 250px;">
          </div>
          <br>
          <label for="d_image">Foto : </label>
          <div class="input-field">
            <input type="file" id="d_image" name="d_image" class="validate">
          </div>
          <br>
          
          <a href="<?php echo base_url()?>myprofile<?php echo $this->session->userdata('linkto');?>" class="btn"><i class="fa fa-reply"></i> Back</a>
          <button class="btn"><i class="fa fa-save"></i> Save</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col s2"></div>
</div>
<br>
<br>
<br>
<br>
<br>