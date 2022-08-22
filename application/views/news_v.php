<!-- CONTENT -->
<div id="page-content">
  <div class="section news">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">BERITA</span> KESEHATAN
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        if ($katalog) :
          foreach ($katalog as $rs) :
            echo '<div class="col s12">
                            <div class="news-content">
                              <img src="' . base_url() . 'image/news/' . $rs["c_image"] . '" alt="image-news">
                              <div class="news-detail">
                                <h5 class="news-title"><a href="' . base_url() . 'news/detail/' . $rs["permalink"] . '">' . $rs["c_title"] . '</a></h5>
                                <div class="date">
                                  <span><i class="fa fa-calendar"></i> ' . date('d F Y', strtotime($rs['created_on'])) . '</span>
                                </div>
                                <p>' . $rs["c_intro"] . '</p>
                                <div class="readmore-news">
                                  <a class="readmore-btn" href="' . base_url() . 'news/detail/' . $rs["permalink"] . '"> <i style="color:#ffffff;" class="fa fa-edit"></i> Selengkapnya</a>
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
  <div class="container">
    <div class="row">
      <div class="col s12">
        <ul class="pagination">
          <?php echo $pagination; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->


<!-- NEWS -->
<div class="section list-news">
  <div class="container">
    <div class="row row-title">
      <div class="col s12">
        <div class="section-title">
          <span class="theme-secondary-color">BERITA</span> TERBARU
        </div>
      </div>
    </div>
    <div class="row row-list-news">
      <div class="col s12">
        <?php
        if ($recentnews) :
          foreach ($recentnews as $rnews) :
            echo '<div class="news-item">
                        <div class="news-tem-image">
                          <img src="' . base_url() . 'image/news/' . $rnews['c_image'] . '">
                        </div>
                        <div class="news-item-info">
                          <div class="list-news-title">
                            ' . $rnews['c_title'] . '
                          </div>
                          ' . $rnews['c_intro'] . '
                          <a href="' . base_url() . 'news/detail/' . $rnews['permalink'] . '" class="readmore"><i class="fa fa-edit"></i> Selengkapnya</a>
                        </div>
                      </div>';
          endforeach;
        endif;
        ?>
      </div>
    </div>
    <div class="mt-2">
      <?php
      // echo youtube("_JtsswlZzPg");
      ?>
    </div>
  </div>
</div>