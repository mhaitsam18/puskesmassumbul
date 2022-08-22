<?php
$ids = array('footer');
$this->db->where_in('c_name', $ids);
$qidtt = $this->db->get('tb_identitas');
if ($qidtt->num_rows() > 0) {
  $didtt = $qidtt->result_array();
  foreach ($didtt as $r) {
    $n_name = $r['c_name'];
    $arr_identities["$n_name"] = $r['c_value'];
  }
}

$idsm = array('instagram', 'facebook', 'twitter');
$this->db->where_in('sm_desc', $idsm);
$qsosmed = $this->db->get('tb_sosmed');
if ($qsosmed->num_rows() > 0) {
  $dsosmed = $qsosmed->result_array();
  foreach ($dsosmed as $rmed) {
    $sm_desc = $rmed['sm_desc'];
    $arr_sosmed["$sm_desc"] = $rmed['sm_value'];
  }
}
?>


<!-- FOOTER  -->
<footer id="footer" style="
    bottom: 0;
    width: 100%;
">
  <div class="container">
    <div class="row copyright">
      <?php echo $arr_identities['footer'] ?>
    </div>
  </div>
</footer>
<!-- END FOOTER -->