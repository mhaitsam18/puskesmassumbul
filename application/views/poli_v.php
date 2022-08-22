<link href="<?php echo base_url() ?>assets/plugins/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">

<!-- CONTENT -->
<div id="page-content">
  <div class="section section_team">
    <div class="container">
      <div class="row row-title ">
        <div class="col s12">
          <div class="section-title row-title-team">
            <span class="theme-secondary-color">DAFTAR</span> POLI
          </div>
        </div>
      </div>
      <?php
          if ($poli): 
              $out = '';
              $no = 0;
              foreach ($poli as $rs):
                 $out .= '<div class="box box-success">
                            <div class="table-responsive">
                              <div class="box-header">
                                <h3 class="box-title">'.++$no.'. '.$rs['poli_nama'].'</h3>
                              </div>
                              <div class="box-body no-padding">
                                <table class="table table-bordered table-striped">
                                  <tr>
                                    <th class="text-center">HARI</th>
                                    <th class="text-center">JADWAL</th>
                                  </tr>';

                                  $did = $rs['poli_kode'];
                                  if(isset($jadwal[$did])){
                                    foreach ($jadwal[$did] as $hari => $value) {
                                      $val = explode('@@', $value);
                                      $out .= '<tr>
                                                <td nowrap>'.strtoupper(cekhari($hari)).'</td>
                                                <td class="text-center" nowrap>'.$val[0].'</td>
                                               </tr>';
                                    }
                                  }

                        $out .= '</table>
                              </div>
                            </div>
                          </div>';
              endforeach;
              echo $out;
          endif;
      ?>
    </div>
  </div>
</div>
