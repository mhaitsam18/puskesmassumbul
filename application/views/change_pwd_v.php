<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="section-title"><span class="theme-secondary-color">CHANGE</span> PASSWORD</div>
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
        <form action="<?php echo base_url() ?>myprofile<?php echo $this->session->userdata('linkto');?>/recoverypwd" enctype="multipart/form-data" method="POST">
          <label for="old_pass">Password lama :</label>
          <div class="input-field">
            <input id="old_pass" name="old_pass" type="password" class="validate" placeholder="Password Lama" required>
          </div>

          <label for="new_pass1">New Password :</label>
          <div class="input-field">
            <input id="new_pass1" name="new_pass1" type="password" class="validate" placeholder="Password baru" required>
          </div>

          <label for="new_pass2">Konfirmasi :</label>
          <div class="input-field">
            <input id="new_pass2" name="new_pass2" type="password" class="validate" placeholder="Konfirmasi" required>
          </div>
          
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>