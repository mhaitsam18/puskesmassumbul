<?php if ($this->session->flashdata('success')){?>
<br>
<br>
<br>
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