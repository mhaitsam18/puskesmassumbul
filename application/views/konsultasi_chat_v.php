
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">

<div class="box box-warning direct-chat direct-chat-warning">
<div class="box-header with-border">
  <h3 class="box-title"><?php echo $dokter['d_fullname']?></h3>
  <br>
  <?php echo $dokter['poli_nama']?>
  
  <div class="box-tools pull-right">
  	<a class="readmore-btn" href="javascript:void(0)" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"> <i style="color:#ffffff;" class="fa fa-comments"></i></a>
  	<a class="readmore-btn" href="<?php echo base_url()?>konsultasi/"> 
      <i style="color:#ffffff;" class="fa fa-arrow-left"></i>
    </a>
  </div>
</div>
<div class="box-body">
  <div class="direct-chat-messages" id="content-chat">
  	<?php
      if ($datachat): 
          $out = '';

          foreach ($datachat as $dc):
          	if($dc['created_by'] == 'M'){
          		$gambar 		= $this->session->userdata('image');
          		$sisi_direct   	= 'right';
          		$float			= 'style="float: none !important;"';
          		$sisi_pull   	= 'right';
          	}else{
          		$gambar 		= 'dokter/'.$dokter['d_image'];
          		$sisi_direct   	= '';
          		$float			= '';
          		$sisi_pull   	= 'left';

          	}	
                $out .= '	<div class="direct-chat-msg '.$sisi_direct.'" '.$float.'>
		                      <div class="direct-chat-info clearfix" style="text-align: '.$sisi_pull.';">
		                      	<span class="direct-chat-timestamp">
		                      		'.date('d-m-Y h:i:s', strtotime($dc['created_on'])).'
		                        </span>
		                      </div>
		                      <img class="direct-chat-img" src="'.base_url().'image/'.$gambar.'" alt="img-profile">
		                      <div class="direct-chat-text">';
                        if($dc['created_by'] == 'M'){
                          $out .= '<i class="fa fa-times" onclick="del('.$dc['c_id'].')"></i> <br>';
                        }
                    $out .= nl2br($dc['c_value']).'
		                        <br>
		                      </div>
		                    </div>';
          endforeach;
          echo $out;
      endif;
  	?>
  </div>
  <div class="direct-chat-contacts">
    <ul class="contacts-list">
	<?php
      if ($listcontact): 
          $out = '';
          foreach ($listcontact as $lc):
            
		        $out .= '
					      <li>
					        <a href="'.base_url().'konsultasi/chat/'.$lc['permalink'].'">
					          <img class="contacts-list-img" src="'.base_url().'image/dokter/'.$lc['d_image'].'" alt="Dokter">
					          <div class="contacts-list-info">
				                <span class="contacts-list-name">'.$lc['nmdokter'].'</span>
					            <span class="contacts-list-msg">'.$lc['poli_nama'].'</span>
					          </div>
					        </a>
					      </li>';
          endforeach;
          echo $out;
      endif;
  	?>
    </ul>
  </div>
</div>
	<div class="box-footer">
		<form action="#" method="post" id="frm-msg">
    	<textarea name="message" id="message" class="form-control" required></textarea>
			<span id="btn-save">
        <a class="btn" style="width: 100%;" onclick="save()">
  				<i class="fa fa-paper-plane"></i>
  			</a>
      </span>
		</form>
	</div>
</div>
<script type="text/javascript">
const messages = document.getElementById('content-chat');

function scrollToBottom() {
  messages.scrollTop = messages.scrollHeight;
}

scrollToBottom();




function save(){
  $('#btn-save').html('<a class="btn btn-outline-secondary" style="width: 100%;background-color: #cacaca;cursor: no-drop;"><i class="fa fa-spinner"></i></a>');
  $.post('<?php echo base_url()?>konsultasi/save',{d_link:"<?php echo $dokter['permalink']?>",dokter:"<?php echo $dokter['d_id']?>",image:"<?php echo $dokter['d_image']?>",message:$message = $('#message').val()},function(result){
      $('#content-chat').html(result.content);
      $('#message').val('');
      $('#btn-save').html('<a class="btn" style="width: 100%;" onclick="save()"><i class="fa fa-paper-plane"></i></a>');
      scrollToBottom();
  },'json');
}

function del($id){
  swal({
      title: "Hapus chat ini ?",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      $.post('<?php echo base_url()?>konsultasi/hapus',{id:$id},function(result){
          reload();
          scrollToBottom();
          swal("Chat sudah dihapus!", {
            icon: "success",
          });
      },'json');
    });
}

setInterval(function(){
  $.post('<?php echo base_url()?>konsultasi/reload',{d_link:"<?php echo $dokter['permalink']?>",dokter:"<?php echo $dokter['d_id']?>",image:"<?php echo $dokter['d_image']?>"},function(result){
      $('#content-chat').html(result.content);
  },'json');
  scrollToBottom();
}, 20000);

function reload(){
  $.post('<?php echo base_url()?>konsultasi/reload',{d_link:"<?php echo $dokter['permalink']?>",dokter:"<?php echo $dokter['d_id']?>",image:"<?php echo $dokter['d_image']?>"},function(result){
      $('#content-chat').html(result.content);
  },'json');
}

</script>
