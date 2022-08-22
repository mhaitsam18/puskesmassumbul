<!-- RIGHT SIDENAV-->
<ul id="nav-mobile-account" class="side-nav">
<li class="profile">
  <div class="li-profile-info" style="min-height: 100px;">
    <?php
      if ($this->session->userdata('is_login_member') == TRUE){
        echo '<img src="'.base_url().'image/'.$this->session->userdata('image').'" alt="profile-img">';
        echo '<br>';
        echo '<span>'.$this->session->userdata('fullname').'</span>';
      }
    ?>
  </div>
  <div class="bg-profile-li">
    <img alt="photo" src="<?php echo base_url() ?>image/bg-profile.jpg">
  </div>
</li>
<?php
  if ($this->session->userdata('is_login_member') == TRUE){
    
      if ($this->session->userdata('jenis') == 'D'){
        $link = 'dokter';
      }else{

      }


  echo '  <li>
            <a href="'.base_url().'myprofile'.$this->session->userdata('linkto').'"><i class="fas fa-user"></i>Profile</a>
          </li>
          <li>
            <a href="'.base_url().'konsultasi'.$this->session->userdata('linkto').'"><i class="fas fa-retweet"></i>Konsultasi</a>
          </li>
          <li>
            <a href="'.base_url().'login/close"><i class="fas fa-sign-out-alt"></i>Keluar</a>
          </li>';  
}else{
    echo '  <li>
            <a href="'.base_url().'login"><i class="fas fa-sign-in-alt"></i>Masuk</a>
          </li>
          <li>
            <a href="'.base_url().'register"><i class="fas fa-user"></i>Registrasi</a>
          </li>
          <li>
            <ul class="sidenav-search-result">
              <li class="search-result-head"><a href="#">Information</a></li>
              <li><a href="#">Silahkan Login untuk berkonsultasi dengan dokter kami.</a></li> 
            </ul>
          </li>';  
}
?>
</ul>
