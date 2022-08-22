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
      <div class="section-title"><span class="theme-secondary-color">FORM</span> RECOVERY</div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col s2"></div>
  <div class="col s8">
    <div class="comment-wrap">
      <div class="c-form">
        <?php if ($this->session->flashdata('message')): ?>
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
          <br>
        <?php endif;?>
        <form action="<?php echo base_url() ?>login/actrecovery" enctype="multipart/form-data" method="POST">
          <label for="u_email">Email :</label>
          <div class="input-field">
            <input id="u_email" name="u_email" type="email" class="validate" placeholder="Email">
          </div>

          <label for="u_pass">Jenis akun :</label>
          <div class="input-field">
            <input type="radio" name="u_jenis" required style="position: inherit;opacity: 1;pointer-events: auto;" value="U"> Umum
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="u_jenis" required style="position: inherit;opacity: 1;pointer-events: auto;" value="D"> Dokter
          </div>


          <button class="btn">Submit</button>
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