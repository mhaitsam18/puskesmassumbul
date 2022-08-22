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
<ul id="nav-mobile-category" class="side-nav">
  <li class="profile">
    <div class="li-profile-info">
      <img src="<?php echo base_url() ?>image/identitas/<?php echo $arr_identities['logo']?>" alt="profile">
      <h2><?php echo $arr_identities['judul']?></h2>
    </div>
    <div class="bg-profile-li">
      <img alt="photo" src="<?php echo base_url() ?>image/bg-profile.jpg">
    </div>
  </li>
  <li>
    <a class="waves-effect waves-blue" href="<?php echo base_url() ?>"><i class="fas fa-home"></i>Home</a>
  </li>

  <li>
    <ul class="collapsible collapsible-accordion">
      <li>
        <div class="collapsible-header"> 
          <i class="fas fa-book"></i>Profile<span><i class="fas fa-caret-down"></i></span>
        </div>
        <div class="collapsible-body">
          <ul>
             <li>
              <a class="waves-effect waves-blue" href="<?php echo base_url() ?>profile/index/sejarah"><i class="fas fa-angle-right"></i>Sejarah</a>
            </li>
            <li>
              <a class="waves-effect waves-blue" href="<?php echo base_url() ?>profile/index/visi_misi"><i class="fas fa-angle-right"></i>Visi & Misi</a>
            </li>
            <li>
              <a class="waves-effect waves-blue" href="<?php echo base_url() ?>profile/index/contact"><i class="fas fa-angle-right"></i>Kontak</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </li>

  <li>
    <a href="<?php echo base_url() ?>dokter"><i class="fas fa-stethoscope"></i>Dokter</a>
  </li>

  <li>
    <a href="<?php echo base_url() ?>poli"><i class="fas fa-list"></i>Poli</a>
  </li>

  <li>
    <a href="<?php echo base_url() ?>news"><i class="fas fa-newspaper"></i>Berita Kesehatan</a>
  </li>
  <li>
    <a href="<?php echo base_url() ?>layanan"><i class="fas fa-plus-square"></i>Fasilitas & Layanan</a>
  </li>
  <li>
    <a href="<?php echo base_url() ?>karir"><i class="fas fa-pencil-alt"></i>Karir</a>
  </li>
  <li>
    <a href="<?php echo base_url() ?>kritiksaran"><i class="fas fa-edit"></i>Kritik & Saran</a>
  </li>
</ul>
