<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="section-title"><span class="theme-secondary-color">FORM</span> REGISTRASI</div>
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
        <form action="<?php echo base_url() ?>register/save" enctype="multipart/form-data" method="POST">

          <label for="u_name">Nama Lengkap :</label>
          <div class="input-field">
            <input id="u_name" name="u_name" type="text" class="validate" required placeholder="Nama Lengkap">
          </div>

          <label for="u_email">Email :</label>
          <div class="input-field">
            <input id="u_email" name="u_email" type="email" class="validate" placeholder="Email">
          </div>

          <label for="u_pass">Password :</label>
          <div class="input-field">
            <input id="u_pass" name="u_pass" type="password" class="validate" required placeholder="Password">
          </div>
          <button class="btn"><i class="fa fa-save"></i> Submit</button>
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