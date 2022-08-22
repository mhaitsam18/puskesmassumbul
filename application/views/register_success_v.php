<?php if ($this->session->flashdata('success')){?>
<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="section-title"><span class="theme-secondary-color">REGISTRASI</span> BERHASIL</div>
    </div>
  </div>
</div>
<div id="page-content">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <br>
        <p align="center">
            <p align="center"><?php echo $this->session->flashdata('success'); ?></p>
        </p>
        <br>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php
}else{
  redirect(base_url(),'refresh');
}
?>