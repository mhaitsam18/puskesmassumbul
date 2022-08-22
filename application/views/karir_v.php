<!-- CONTENT -->
<div id="page-content">
  <div class="container">
    <div class="row row-title">
      <div class="col s12">
        <div class="section-title">
          KARIR
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
       <div class="news-content">
        <br>
            <div class="news-detail">
              <?php
                if(!empty($karir['c_image'])){
              ?>
                <img src="<?php echo base_url()?>image/karir/<?php echo $karir['c_image']; ?>" alt="image-news">
              <?php
                }
              ?>
              
              <br>
              <br>
              <p>
                 <?php echo $karir['c_desc']; ?>
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