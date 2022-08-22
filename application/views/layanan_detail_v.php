<!-- CONTENT -->
<div id="page-content">
  <div class="container">
    <div class="row row-title">
      <div class="col s12">
        <div class="section-title">
          FASILITAS <span class="theme-secondary-color">&</span> LAYANAN
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
       <div class="news-content">
        <br>
            <div class="news-detail">
              <h5 class="news-title"><a href="#"><?php echo $layanan['c_name']; ?></a></h5>
              <hr>
              <?php
                if(!empty($layanan['c_image'])){
              ?>
                <img src="<?php echo base_url()?>image/layanan/<?php echo $layanan['c_image']; ?>" alt="image-news">
              <?php
                }
              ?>
              
              <p>
                 <?php echo $layanan['c_desc']; ?>
              </p> 
            </div>
          </div>
      </div>
    </div>
   <div class="row">
     <div class="col s12">
     </div>
   </div>
  </div>
</div>
<!-- END CONTENT -->