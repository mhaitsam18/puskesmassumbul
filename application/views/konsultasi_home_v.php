
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">

<div id="page-content">
  <div class="section news">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">KONSULTASI</span>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col s12">

              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">List Dokter</h3>
                </div>
                <div class="box-header with-border">
                   <form action="<?php echo base_url()?>konsultasi" method="get">
                   		<div class="col s9">
	                    	<input type="text" name="cari" value="<?php echo strtolower($this->input->get('cari'));?>" placeholder="Cari Dokter atau Poli" class="form-control">
	                	</div>
                   		<div class="col s3">
    						<button class="btn btn-outline-secondary" type="submit" id="button-addon2">
    							<i class="fa fa-search"></i>
    						</button>
                       	</div>
	                </form>
                </div>
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  	<?php
			          if ($dokter): 
			              $out = '';
			              foreach ($dokter as $rs):
			                 $out .= '  <li>
					                      <img src="'.base_url().'image/dokter/'.$rs['d_image'].'" alt="Img-Doctor" style="height: 128;width:128px;">
					                      <span class="users-list-name">'.$rs['d_fullname'].'</span>
					                      <span class="users-list-date">'.$rs['poli_nama'].'</span>
					                      <a class="readmore-btn" href="'.base_url().'konsultasi/chat/'.$rs["permalink"].'"> <i style="color:#ffffff;" class="fa fa-comment"></i> Chat</a>
					                    </li>';
			              endforeach;
			              echo $out;
			          endif;
			      	?>
                  </ul>
                </div>
              </div>
	    </div>
      </div>
    </div>
  </div>
</div>
