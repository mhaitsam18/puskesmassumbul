<?php include "assets/fungsi.php"; ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<?php
$ids = array('judul', 'logo', 'footer', 'contact', 'alamat');
$this->db->where_in('c_name', $ids);
$qidtt = $this->db->get('tb_identitas');
if ($qidtt->num_rows() > 0) {
    $didtt = $qidtt->result_array();
    foreach ($didtt as $r) {
        $n_name = $r['c_name'];
        $arr_identities["$n_name"] = $r['c_value'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="RSUD Dr. (HC) Ir. SOEKARNO, Provinsi Kepulauan Bangka Belitung">
    <meta name="keywords" content="RSUD Dr. (HC) Ir. SOEKARNO, Provinsi Kepulauan Bangka Belitung">
    <meta name="author" content="RSUD Dr. (HC) Ir. SOEKARNO">
    <title><?php echo $arr_identities['judul'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">
    <link rel="icon" href="<?php echo base_url() ?>image/identitas/<?php echo $arr_identities['logo'] ?>" type="image/x-icon">
    <!-- CSS  -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/font-awesome/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link href="<?php echo base_url() ?>assets/fonts/material/material-fonts.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/lib/slick/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/lib/slick/slick/slick-theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/Magnific-Popup-master/dist/magnific-popup.css">



</head>

<body id="homepage">
    <div class="preloading">
        <div class="wrap-preload">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <header id="header">
        <div class="nav-wrapper container">
            <div class="header-menu-button">
                <a href="#" data-activates="nav-mobile-category" class="button-collapse" id="button-collapse-category">
                    <div class="cst-btn-menu">
                        <i class="fas fa-align-left"></i>
                    </div>
                </a>
            </div>
            <div class="header-logo">
                <a href="<?php echo base_url() ?>" class="nav-logo"><?php echo $arr_identities['judul'] ?></a>
            </div>
            <div class="header-icon-menu">
                <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i class="fas fa-user"></i></i></a>
            </div>
        </div>
    </header>

    <nav>
        <?php $this->load->view('sidebar_left_v'); ?>
        <?php $this->load->view('sidebar_right_v'); ?>
    </nav>
    <?php $this->load->view($content); ?>

    <?php $this->load->view('footer_v'); ?>


    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/slick/slick/slick.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>