<!-- CONTENT -->
<div id="page-content">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="news-content">
          <br>
          <div class="news-detail">
            <h5 class="news-title"><a href="#"><?php echo $news['c_title']; ?></a></h5>
            <div class="date">
              <span><i class="fa fa-calendar"></i> <?php echo date('d F Y', strtotime($news['created_on'])); ?></span>
              <br><br>
              <small>Sumber: <?= $news['referensi'] ?></small>
            </div>
            <img src="<?php echo base_url() ?>image/news/<?php echo $news['c_image']; ?>" alt="image-news">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#WhatsAppModal">
              <i class="fab fa-whatsapp"></i> Share WhatsApp
            </button>


            <!-- Modal -->
            <div class="modal fade" id="WhatsAppModal" tabindex="-1" aria-labelledby="WhatsAppModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="WhatsAppModalLabel">Masukkan Nomor WhatsApp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?= base_url('news/kirimWhatsApp') ?>" method="post" target="_blank">
                    <div class="modal-body">
                      <input type="hidden" name="url" value="<?= base_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3)) ?>">
                      <div class="form-group">
                        <label for="no_wa">Nomor WhatsApp</label>
                        <input type="text" class="form-control" name="no_wa" id="no_wa">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <p>
              <?php echo $news['c_desc']; ?>
            </p>
            <div>
              <?php
              echo youtube($news['youtube']);
              ?>
            </div>
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
        <div class="more-news-list">
          <a href="<?php echo base_url() ?>news" class="readmore">Lainnya >></a>
        </div>
      </div>
    </div>
  </div>
</div>