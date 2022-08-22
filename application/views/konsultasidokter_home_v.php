
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">

<div class="box box-info direct-chat direct-chat-info">
<div class="box-header with-border">
  <center>
    <b>DAFTAR MEMBER</b>
  </center>
  <br>
</div>
<div class="box-body">
  <div class="direct-chat-messages" style="height: 400px;">
    <ul class="products-list product-list-in-box">
      <?php
        if ($listcontact){
            $out = '';
            foreach ($listcontact as $lc):
              
              $out .= '

                  <li class="item">
                    <a href="'.base_url().'konsultasidokter/chat/'.$lc['c_mid'].'">
                      <div class="product-img">
                        <img src="'.base_url().'image/member/'.$lc['r_image'].'" alt="Image">
                      </div>
                      <div class="product-info">
                        '.$lc['nmmember'].'
                        <span class="product-description">
                              '.date('d-m-Y', strtotime($lc['r_bday'])).'
                            </span>
                      </div>
                    </a>
                  </li>';
            endforeach;
            echo $out;
        }else{
          echo '<center><h5>tidak ada data konsultasi...</h5></center>';
        }
    ?>
    </ul>
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
<br>
<br>
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
      result.SuccessMsg
      $('#content-chat').html(result.content);
      $('#message').val('');
      $('#btn-save').html('<a class="btn" style="width: 100%;" onclick="save()"><i class="fa fa-paper-plane"></i></a>');
      scrollToBottom();
  },'json');
}



</script>