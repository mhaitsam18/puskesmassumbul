<?php include "assets/fungsi.php"; ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>image/identitas/<?php echo $logo;?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/server/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/server/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/server/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/server/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/server/assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/server/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/server/assets/js/jquery.min.js"></script>
  </head>

  <body class="hold-transition skin-blue sidebar-mini fixed"> 
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo base_url(); ?>konsultasi" class="logo">
          <span class="logo-lg"><b><small>KONSULTASI</small></b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>


          <div class="navbar-custom-menu" style="float:left; ">
            <ul class="nav navbar-nav">
                <a href="<?php echo base_url(); ?>konsultasi" class="btn" style="background-color: #ffffff; color: #3c8dbc; margin:5px">
                  <span>Nama dokter</span>
                </a>
            </ul>
          </div>


          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <a href="<?php echo base_url(); ?>" class="btn" style="background-color: #ffffff; color: #3c8dbc; margin:5px">
                  <span class="fa fa-wechat"></span>
                </a>
            </ul>
          </div>
        </nav>
      </header>



  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>image/member/<?php echo $this->session->userdata('image');?>" class="img-circle" alt="img-profile">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('fullname');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><center>DAFTAR DOKTER</center></li>
        <?php
              $this->db->order_by('poli_nama', 'asc');
              $main_menu = $this->db->get('tb_poli');

              foreach ($main_menu->result() as $main) {
                  $this->db->where('d_poli', $main->poli_kode);
                  $this->db->order_by('d_fullname', 'asc');
                  $sub_menu = $this->db->get('tb_dokter');

                  if ($sub_menu->num_rows() > 0) {
                    ?>
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-edit"></i> <span><?php echo $main->poli_nama;?></span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                        <?php
                          foreach ($sub_menu->result() as $sub) {
                        ?>
                          <li><a href="<?php echo base_url()?>konsultasi/chat/<?php echo $sub->permalink;?>"><i class="fa fa-user"></i> <?php echo $sub->d_fullname;?></a></li>
                        <?php
                          }
                        ?>
                        </ul>
                      </li>
                    <?php
                  }
              }
          ?>
      </ul>
    </section>
  </aside>

  <?php $this->load->view($content); ?>
  <?php $this->load->view('server/footer_v'); ?>