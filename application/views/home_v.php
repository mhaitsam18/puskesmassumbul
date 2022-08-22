<div class="main-slider" data-indicators="true">
    <div class="carousel carousel-slider " data-indicators="true">
        <?php
        if ($slider) :
            foreach ($slider as $sliders) :
                echo '<a class="carousel-item"><img src="' . base_url() . 'image/slider/' . $sliders['slid_image'] . '" alt="slider"></a>';
            endforeach;
        endif;
        ?>
    </div>
</div>


<div class="section home-category">
    <div class="container">

        <div class="row icon-service">

            <?php $pasien = $this->session->userdata('is_pasien'); ?>
            <?php $dokter = $this->session->userdata('is_dokter'); ?>

            <?php if ($pasien) : ?>
                <div class="col s4 m4 l2">
                    <a class="icon-content" href="<?php echo base_url('home/') ?>surat_rujukan">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="<?php echo base_url() ?>image/menutengah/surat_rujukan.png" alt="category">
                                    <h5>Surat <br> Rujukan</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col s4 m4 l2">
                    <a class="icon-content" href="<?php echo base_url('home/') ?>resep_obat">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="<?php echo base_url() ?>image/menutengah/obat.png" alt="category">
                                    <h5>Resep Obat <br> Dari Dokter</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s4 m4 l2">
                    <a class="icon-content" href="<?php echo base_url('dokter/janji_temu') ?>">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="<?php echo base_url() ?>image/menutengah/care.png" alt="Janji temu">
                                    <h5>Janji Temu</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endif ?>

            <?php if ($dokter) : ?>

                <div class="col s4 m4 l2">
                    <a class="icon-content" href="<?php echo base_url('dokter/') ?>janji_temu">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="<?php echo base_url() ?>image/menutengah/care.png" alt="category">
                                    <h5>Janji <br> Temu</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col s4 m4 l2">
                    <a class="icon-content" href="<?php echo base_url('dokter/') ?>surat_rujukan">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="<?php echo base_url() ?>image/menutengah/surat_rujukan.png" alt="category">
                                    <h5>Buat Surat <br> Rujukan</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col s4 m4 l2">
                    <a class="icon-content" href="<?php echo base_url('dokter/') ?>resep_obat">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="<?php echo base_url() ?>image/menutengah/obat.png" alt="category">
                                    <h5>Resep Obat</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col s4 m4 l2">
                    <a class="icon-content" href="<?php echo base_url('dokter/') ?>list_teguran">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="<?php echo base_url() ?>image/menutengah/warning.png" alt="category">
                                    <h5>Tampilkan Teguran Operator</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endif ?>
            <!-- <div class="col s4 m4 l2">
                <a class="icon-content" href="<?php echo base_url() ?>layanan">
                    <div class="content fadetransition">
                        <div class="in-content">
                            <div class="in-in-content">
                                <img src="<?php echo base_url() ?>image/menutengah/care.png" alt="category">
                                <h5>Janji Temu Dokter</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->

            <div class="col s4 m4 l2">
                <a class="icon-content" href="<?php echo base_url() ?>profile/index/sejarah">
                    <div class="content fadetransition">
                        <div class="in-content">
                            <div class="in-in-content">
                                <img src="<?php echo base_url() ?>image/menutengah/hospital.png" alt="category">
                                <h5>Tentang <br> Kami</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col s4 m4 l2">
                <a class="icon-content" href="<?php echo base_url() ?>dokter">
                    <div class="content fadetransition">
                        <div class="in-content">
                            <div class="in-in-content">
                                <img src="<?php echo base_url() ?>image/menutengah/doctor.png" alt="category">
                                <h5>Cari<br>Dokter</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col s4 m4 l2">
                <a class="icon-content" href="<?php echo base_url() ?>RekamMedis">
                    <div class="content fadetransition">
                        <div class="in-content">
                            <div class="in-in-content">
                                <img src="<?php echo base_url() ?>image/menutengah/medical-report.png" alt="category">
                                <h5>Rekam<br>Medis</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col s4 m4 l2">
                <a class="icon-content" href="<?php echo base_url() ?>konsultasi">
                    <div class="content fadetransition">
                        <div class="in-content">
                            <div class="in-in-content">
                                <img src="<?php echo base_url() ?>image/menutengah/stethoscope.png" alt="category">
                                <h5>Konsultasi<br>Kesehatan</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- PROMO -->
<div class="section promo">
    <div class="container">
        <div class="col s12">
            <img src="<?php echo base_url() ?>image/identitas/<?php echo $banner; ?>" alt=" ">
        </div>
    </div>
</div>
<!-- END PROMO -->



<!-- NEWS -->
<div class="section list-news">
    <div class="container">
        <div class="row row-title">
            <div class="col s12">
                <div class="section-title">
                    <span class="theme-secondary-color">BERITA</span> KESEHATAN
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
        <div>
            <?php
            // echo youtube("_JtsswlZzPg");
            ?>
        </div>
    </div>
</div>



<!-- END NEWS -->