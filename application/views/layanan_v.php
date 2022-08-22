<!-- CONTENT -->
<div id="page-content">
  <div class="section news">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            FASILITAS <span class="theme-secondary-color">&</span> LAYANAN
          </div>
        </div>
      </div>
      <div class="row">
        <?php
            if ($layanan): 
                foreach ($layanan as $rs):
                    echo '<div class="col s12">
                            <div class="news-content">
                              <img src="'.base_url().'image/layanan/'.$rs["c_image"].'" alt="image-news">
                              <div class="news-detail">
                                <h5 class="news-title"><a href="'.base_url().'layanan/detail/'.$rs["permalink"].'">'.$rs["c_name"].'</a></h5>
                                <div class="readmore-news">
                                  <a class="readmore-btn" href="'.base_url().'layanan/detail/'.$rs["permalink"].'"> <i style="color:#ffffff;" class="fa fa-edit"></i> Selengkapnya</a>
                                </div>
                              </div>
                            </div>
                          </div>';
                endforeach;
            endif;
        ?>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->

